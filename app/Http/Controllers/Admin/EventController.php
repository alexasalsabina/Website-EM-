<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventFoto;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();

        return view('admin.event.index', compact('events'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $this->ensureEventPhotosTable();
        $validated = $this->validateData($request);
        $this->validatePhotos($request);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('events', 'public');
        }

        $event = Event::create($validated);
        $this->storePhotos($request, $event);

        return redirect()->route('admin.event.index')
            ->with('success', 'Event berhasil ditambahkan.');
    }

    public function edit(Event $event)
    {
        return view('admin.event.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $this->ensureEventPhotosTable();
        $validated = $this->validateData($request);
        $this->validatePhotos($request, $event);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('events', 'public');
        }

        $event->update($validated);
        $this->storePhotos($request, $event);

        return redirect()->route('admin.event.index')
            ->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy(Event $event)
    {
        foreach ($event->fotos as $foto) {
            Storage::disk('public')->delete($foto->foto);
        }
        $event->delete();

        return redirect()->route('admin.event.index')
            ->with('success', 'Event berhasil dihapus.');
    }

    public function editPhoto(Event $event, EventFoto $foto)
    {
        abort_unless($foto->event_id === $event->id, 404);

        return view('admin.event.foto-edit', compact('event', 'foto'));
    }

    public function updatePhoto(Request $request, Event $event, EventFoto $foto)
    {
        abort_unless($foto->event_id === $event->id, 404);

        $request->validate([
            'foto' => 'required|image|max:4096',
        ]);

        Storage::disk('public')->delete($foto->foto);
        $foto->update([
            'foto' => $request->file('foto')->store('events/gallery', 'public'),
        ]);

        return redirect()->route('admin.event.edit', $event)
            ->with('success', 'Foto event berhasil diperbarui.');
    }

    public function destroyPhoto(Event $event, EventFoto $foto)
    {
        abort_unless($foto->event_id === $event->id, 404);

        Storage::disk('public')->delete($foto->foto);
        $foto->delete();

        return redirect()->route('admin.event.edit', $event)
            ->with('success', 'Foto event berhasil dihapus.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'judul'     => 'required|string|max:255',
            'tanggal'   => 'required|date',
            'waktu'     => 'required|string|max:100',
            'lokasi'    => 'required|string|max:255',
            'status'    => 'required|in:publish,draft,selesai',
            'deskripsi' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048',
        ]);
    }

    private function storePhotos(Request $request, Event $event): void
    {
        if (!$request->hasFile('foto')) {
            return;
        }

        foreach (array_filter($request->file('foto', [])) as $foto) {
            if (!$foto->isValid()) {
                continue;
            }

            $event->fotos()->create([
                'foto' => $foto->store('events/gallery', 'public'),
            ]);
        }
    }

    private function ensureEventPhotosTable(): void
    {
        if (Schema::hasTable('event_fotos')) {
            return;
        }

        Schema::create('event_fotos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
            $table->string('foto');
            $table->timestamps();
        });
    }

    private function validatePhotos(Request $request, ?Event $event = null): void
    {
        $existingPhotos = $event?->fotos()->count() ?? 0;

        $request->validate([
            'foto' => 'nullable|array',
            'foto.*' => 'required|image|max:4096',
        ]);

        $newPhotos = count(array_filter($request->file('foto', []), fn ($foto) => $foto && $foto->isValid()));
        if ($existingPhotos + $newPhotos > 50) {
            throw ValidationException::withMessages([
                'foto' => 'Jumlah foto dalam satu event maksimal 50 foto.',
            ]);
        }
    }
}
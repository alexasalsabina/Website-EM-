<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

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
        $validated = $this->validateData($request);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('events', 'public');
        }

        Event::create($validated);

        return redirect()->route('admin.event.index')
            ->with('success', 'Event berhasil ditambahkan.');
    }

    public function edit(Event $event)
    {
        return view('admin.event.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $this->validateData($request);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('events', 'public');
        }

        $event->update($validated);

        return redirect()->route('admin.event.index')
            ->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.event.index')
            ->with('success', 'Event berhasil dihapus.');
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
}
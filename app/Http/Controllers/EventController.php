<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where('status', 'publish')
            ->orderBy('tanggal', 'asc')
            ->get();

        // Event terdekat = event publish dengan tanggal >= hari ini, paling awal.
        // Kalau semua sudah lewat, ambil yang paling baru saja biar tetap ada tampilan.
        $eventTerdekat = $events->firstWhere(
            fn ($event) => $event->tanggal->greaterThanOrEqualTo(Carbon::today())
        ) ?? $events->last();

        $calendarEvents = $events->map(fn ($event) => [
            'title' => $event->judul,
            'date' => $event->tanggal->format('Y-m-d'),
            'time' => $event->waktu,
            'location' => $event->lokasi,
            'description' => \Illuminate\Support\Str::limit($event->deskripsi, 150),
            'thumbnail' => $event->thumbnail ? asset('storage/' . $event->thumbnail) : asset('images/karnaval.png'),
            'url' => route('event.show', $event->slug),
        ])->values();

        return view('event.index', compact('events', 'eventTerdekat', 'calendarEvents'));
    }

    public function show(string $slug)
    {
        $event = Event::where('slug', $slug)
            ->where('status', 'publish')
            ->firstOrFail();

        return view('event.show', compact('event'));
    }
}
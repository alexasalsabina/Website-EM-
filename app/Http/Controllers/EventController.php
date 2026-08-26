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

        return view('event.index', compact('events', 'eventTerdekat'));
    }

    public function show(string $slug)
    {
        $event = Event::where('slug', $slug)
            ->where('status', 'publish')
            ->firstOrFail();

        return view('event.show', compact('event'));
    }
}
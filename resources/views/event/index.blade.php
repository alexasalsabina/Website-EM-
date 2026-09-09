@extends('layouts.app')

@section('title', 'Event Desa Jatisari')

@push('styles')
    @vite(['resources/css/event.css'])
@endpush

@section('content')
<section class="event">
    {{-- Hero Banner --}}
    <div class="event__hero-banner" style="background-image: url('{{ asset('images/lapangan.jpeg') }}');">
        <div class="event__hero-banner-content">
            <h1 class="event__hero-banner-title">Event Desa</h1>
            <p class="event__hero-banner-subtitle">Informasi lengkap mengenai kegiatan dan acara yang diselenggarakan di Desa Jatisari.</p>
            <a href="#agenda" class="btn btn--primary">Jelajahi Event</a>
        </div>
    </div>

    <div class="event__inner">
        {{-- Section 1: Agenda Kegiatan Desa --}}
        <div id="agenda" class="event__section">
            <div class="event__section-header event__section-header--center">
                <h2 class="event__section-title">Agenda Kegiatan Desa</h2>
                <span class="event__section-divider"></span>
                <p class="event__section-subtitle">Berbagai kegiatan menarik yang akan datang di Desa Jatisari</p>
            </div>

            <div class="event__cards event__cards--grid4">
                @forelse($events as $event)
                    <div class="event__item-card">
                        <div class="event__item-img-wrapper" style="position: relative;">
                            <img src="{{ $event->thumbnail ? asset('storage/' . $event->thumbnail) : asset('images/karnaval.png') }}"
                                 alt="{{ $event->judul }}">
                            
                            <div class="event__date-badge">
                                <span class="event__date-badge-day">{{ $event->tanggal->format('d') }}</span>
                                <span class="event__date-badge-month">{{ strtoupper($event->tanggal->translatedFormat('M')) }}</span>
                            </div>

                            {{-- Badge Tahun Hijau (Otomatis Dinamis Mengikuti Tahun dari Admin) --}}
                            <div class="event__year-badge" style="position: absolute; top: 12px; right: 12px; background-color: #198754; color: #ffffff; padding: 5px 12px; border-radius: 50px; font-size: 0.85rem; font-weight: 600; display: inline-flex; align-items: center; gap: 6px; box-shadow: 0 2px 4px rgba(0,0,0,0.2);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                    <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                </svg>
                                Tahun {{ $event->tanggal->format('Y') }}
                            </div>
                        </div>
                        <div class="event__item-content">
                            <h3 class="event__item-title">{{ $event->judul }}</h3>
                            <ul class="event__meta-list">
                                <li>📅 {{ $event->tanggal->translatedFormat('d F Y') }}</li>
                                <li>⏰ {{ $event->waktu }}</li>
                                <li>📍 {{ $event->lokasi }}</li>
                            </ul>
                            <p class="event__item-excerpt">{{ \Illuminate\Support\Str::limit($event->deskripsi, 100) }}</p>
                            <a href="{{ route('event.show', $event->slug) }}" class="btn btn--outline">Lihat Detail</a>
                        </div>
                    </div>
                @empty
                    <p class="event__empty">Belum ada event yang tersedia saat ini.</p>
                @endforelse
            </div>
        </div>

        {{-- Section 2: Kalender & Event Terdekat --}}
        <div class="event__top">
            <aside class="event__sidebar">
                <div class="event__sidebar-card">
                    <p class="event__sidebar-title">Kalender Event</p>
                    <div class="event__calendar-widget">
                        <div class="event__calendar-header">
                            <button type="button" id="calendarPrev" aria-label="Bulan sebelumnya">&lt;</button>
                            <strong id="calendarMonth"></strong>
                            <button type="button" id="calendarNext" aria-label="Bulan berikutnya">&gt;</button>
                        </div>
                        <div id="calendarGrid" class="event__calendar-grid"></div>
                    </div>
                </div>
            </aside>

            <div id="calendarEvents" class="event__hero"></div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const events = @json($calendarEvents);
        const calendarGrid = document.getElementById('calendarGrid');
        const calendarMonth = document.getElementById('calendarMonth');
        const calendarEvents = document.getElementById('calendarEvents');
        let selectedDate = null;
        let currentMonth = new Date();

        const formatDate = (date) => `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}`;
        const monthFormatter = new Intl.DateTimeFormat('id-ID', { month: 'long', year: 'numeric' });
        const longDateFormatter = new Intl.DateTimeFormat('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });

        function renderEvents() {
            const monthKey = `${currentMonth.getFullYear()}-${String(currentMonth.getMonth() + 1).padStart(2, '0')}`;
            const filteredEvents = events.filter((event) => {
                return selectedDate ? event.date === selectedDate : event.date.startsWith(monthKey);
            });

            calendarEvents.innerHTML = `<div class="event__sidebar-card event__nearest-card">
                <p class="event__sidebar-title">${selectedDate ? `Event ${longDateFormatter.format(new Date(`${selectedDate}T00:00:00`))}` : 'Event Bulan Ini'}</p>
                ${filteredEvents.length ? filteredEvents.map((event) => `<a class="event__calendar-event" href="${event.url}">
                    <img src="${event.thumbnail}" alt="${event.title}" class="event__nearest-img">
                    <div class="event__nearest-info">
                        <h3 class="event__nearest-title">${event.title}</h3>
                        <ul class="event__meta-list"><li>📅 ${longDateFormatter.format(new Date(`${event.date}T00:00:00`))}</li><li>⏰ ${event.time}</li><li>📍 ${event.location}</li></ul>
                        <p class="event__calendar-event-description">${event.description}</p>
                    </div>
                </a>`).join('') : '<p class="event__calendar-empty">Tidak ada event pada pilihan ini.</p>'}
            </div>`;
        }

        function renderCalendar() {
            calendarMonth.textContent = monthFormatter.format(currentMonth);
            const year = currentMonth.getFullYear();
            const month = currentMonth.getMonth();
            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            const eventDates = new Set(events.map((event) => event.date));
            calendarGrid.innerHTML = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'].map((day) => `<span class="event__calendar-weekday">${day}</span>`).join('');
            for (let index = 0; index < firstDay; index += 1) calendarGrid.insertAdjacentHTML('beforeend', '<span></span>');
            for (let day = 1; day <= daysInMonth; day += 1) {
                const date = new Date(year, month, day);
                const dateKey = formatDate(date);
                const button = document.createElement('button');
                button.type = 'button';
                button.textContent = day;
                button.className = `${dateKey === selectedDate ? 'active ' : ''}${eventDates.has(dateKey) ? 'has-event' : ''}`;
                button.addEventListener('click', () => { selectedDate = selectedDate === dateKey ? null : dateKey; renderCalendar(); renderEvents(); });
                calendarGrid.appendChild(button);
            }
        }

        document.getElementById('calendarPrev').addEventListener('click', () => { currentMonth.setMonth(currentMonth.getMonth() - 1); selectedDate = null; renderCalendar(); renderEvents(); });
        document.getElementById('calendarNext').addEventListener('click', () => { currentMonth.setMonth(currentMonth.getMonth() + 1); selectedDate = null; renderCalendar(); renderEvents(); });
        renderCalendar();
        renderEvents();
    });
</script>
@endsection
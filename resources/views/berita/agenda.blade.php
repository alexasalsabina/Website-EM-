@extends('layouts.app')

@section('title', 'Agenda')

@section('styles')

    @forelse($agendas as $agenda)
            <div class="card agenda-card mb-3">
                <div class="card-body">

                    {{-- Judul --}}
                    <h5 class="card-title mb-2">
                        <a href="{{ route('berita.agenda.show', $agenda->slug) }}" class="agenda-title">
                            {{ $agenda->judul }}
                        </a>
                    </h5>

                    {{-- Tanggal publish & penulis --}}
                    <div class="agenda-meta mb-2">
                        <span class="me-3">
                            <i class="bi bi-calendar3 me-1"></i>
                            {{ \Carbon\Carbon::parse($agenda->created_at)->translatedFormat('M d, Y') }}
                        </span>
                        <span>
                            <i class="bi bi-person-fill me-1"></i> {{ $agenda->penulis }}
                        </span>
                    </div>

                    {{-- Lokasi & rentang tanggal kegiatan --}}
                    <div class="agenda-meta mb-3">
                        <span class="me-3">
                            <i class="bi bi-geo-alt-fill me-1"></i> {{ $agenda->lokasi }}
                        </span>
                        <span>
                            <i class="bi bi-calendar-range me-1"></i>
                            {{ \Carbon\Carbon::parse($agenda->tanggal_mulai)->translatedFormat('M d, Y') }}
                            s/d
                            {{ \Carbon\Carbon::parse($agenda->tanggal_selesai)->translatedFormat('M d, Y') }}
                        </span>
                    </div>

                    {{-- Deskripsi singkat --}}
                    <p class="card-text agenda-desc mb-3">
                        {{ \Illuminate\Support\Str::limit($agenda->deskripsi, 180) }}
                    </p>

                    {{-- Tombol selengkapnya --}}
                    <a href="{{ route('berita.agenda.show', $agenda->slug) }}"
                    class="btn btn-primary btn-sm agenda-btn"
                    data-slug="{{ $agenda->slug }}">
                        selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                    </a>

                </div>
            </div>
        @empty
            <p class="text-muted">Belum ada agenda yang tersedia.</p>
    @endforelse

@endsection

@section('scripts')
<script src="{{ asset('js/agenda.js') }}"></script>
@endsection
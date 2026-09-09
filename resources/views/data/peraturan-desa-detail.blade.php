@extends('layouts.app')

@section('title', $peraturan->judul)

@section('content')
<style>
    .peraturan-detail-page { min-height: 100vh; padding: 8rem 1.5rem 5rem; background: #12395a; color: #f4f8fb; }
    .peraturan-detail { max-width: 1180px; margin: 0 auto; padding: 3rem clamp(1.5rem, 5vw, 4rem); border: 1px solid rgba(255,255,255,.14); border-radius: 28px; background: rgba(255,255,255,.08); }
    .peraturan-detail-back { color: #dce8f2; font-weight: 700; text-decoration: none; }
    .peraturan-detail-year { display: inline-block; margin-top: 3rem; padding: .4rem .9rem; border-radius: 999px; background: #55738b; font-size: .8rem; font-weight: 700; }
    .peraturan-detail h1 { margin: 1rem 0 1.5rem; font-size: clamp(2rem, 5vw, 4rem); line-height: 1.08; }
    .peraturan-detail-content { max-width: 850px; color: #e3edf4; font-size: 1.05rem; line-height: 1.9; white-space: pre-line; }
</style>

<div class="peraturan-detail-page">
    <article class="peraturan-detail">
        <a class="peraturan-detail-back" href="{{ route('data.peraturan-desa') }}">&larr; Kembali ke Peraturan Desa</a>
        <span class="peraturan-detail-year">Tahun {{ $peraturan->tahun }}</span>
        <h1>{{ $peraturan->judul }}</h1>
        <div class="peraturan-detail-content">{{ $peraturan->isi }}</div>
    </article>
</div>
@endsection
@extends('layouts.app')

@push('styles')
    @vite([
        'resources/css/hero.css',
        'resources/css/quick-menu.css',
        'resources/css/sambutan.css',
        'resources/css/statistik.css',
    ])
@endpush

@section('content')
    @include('partials.hero')
    @include('partials.quick-menu')
    @include('partials.sambutan')
    @include('data.statistik')
@endsection

@push('scripts')
    @vite(['resources/js/hero.js'])
@endpush
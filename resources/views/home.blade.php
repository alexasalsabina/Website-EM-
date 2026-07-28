@extends('layouts.app')

@section('content')
    @include('partials.hero')
    @include('partials.quick-menu')
    @include('partials.sambutan')
    @include('data.statistik')
@endsection

@push('scripts')
    @vite(['resources/js/hero.js'])
@endpush
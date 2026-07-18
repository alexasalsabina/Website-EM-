@extends('layouts.app')

@section('title', 'Beranda')

@vite([
    'resources/css/home.css',
    'resources/js/home.js'
])

@section('content')

@include('components.header')

@include('homepage')

@include('components.footer')

@endsection
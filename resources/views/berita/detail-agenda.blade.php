@extends('layouts.app')

@section('title', 'Detail Agenda')

@section('content')

<div class="container py-5">

    <h2>Detail Agenda</h2>

    <p>Slug Agenda :</p>

    <h5>{{ $slug }}</h5>

    <a href="{{ route('berita.agenda') }}" class="btn btn-primary mt-3">
        ← Kembali
    </a>

</div>

@endsection
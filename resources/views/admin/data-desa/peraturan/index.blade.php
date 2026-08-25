@extends('admin.layouts.app')

@section('title','Peraturan Desa')

@section('content')

<div class="container py-4">

    <h2>Kelola Peraturan Desa</h2>

    <a href="{{ route('admin.data-desa.index') }}" class="btn btn-success mt-3">
        Kembali ke Data Desa
    </a>

</div>

@endsection
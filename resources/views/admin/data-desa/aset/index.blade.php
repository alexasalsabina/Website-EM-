@extends('admin.layouts.app')

@section('title','Aset Desa')

@section('content')

<div class="container py-4">

    <h2>Kelola Aset Desa</h2>

    <a href="{{ route('admin.data-desa.index') }}" class="btn btn-success mt-3">
        Kembali ke Data Desa
    </a>

</div>

@endsection
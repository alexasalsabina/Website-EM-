@extends('admin.layouts.app')

@section('title', 'Edit Perangkat Desa')
@section('page-title', 'Edit Perangkat Desa')

@section('content')
<div class="p-8">

    {{-- HEADER --}}
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-blue-800">
                Edit Perangkat Desa
            </h1>

            <p class="text-gray-500 mt-1">
                Ubah data perangkat desa sesuai posisi dan status saat ini.
            </p>
        </div>

        {{-- KEMBALI --}}
        <a href="{{ route('admin.profil.struktur.index') }}"
           class="bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold
                  hover:bg-blue-800 transition">
            ← Kembali
        </a>
    </div>


    {{-- ERROR --}}
    @if($errors->any())
        <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4 text-red-700">
            <ul class="list-disc pl-5 space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- FORM --}}
    <form action="{{ route('admin.profil.struktur.update', $struktur->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white rounded-xl shadow-md p-6">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- NAMA --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Lengkap
                </label>

                <input type="text"
                       name="nama"
                       value="{{ old('nama', $struktur->nama) }}"
                       class="w-full rounded-lg border border-gray-300 px-4 py-2.5
                              focus:outline-none focus:ring-2 focus:ring-blue-600
                              focus:border-blue-600"
                       required>
            </div>


            {{-- JABATAN --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Jabatan
                </label>

                <input type="text"
                       name="jabatan"
                       value="{{ old('jabatan', $struktur->jabatan) }}"
                       class="w-full rounded-lg border border-gray-300 px-4 py-2.5
                              focus:outline-none focus:ring-2 focus:ring-blue-600
                              focus:border-blue-600"
                       required>
            </div>


            {{-- URUTAN --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Urutan Tampil
                </label>

                <input type="number"
                       name="urutan"
                       value="{{ old('urutan', $struktur->urutan) }}"
                       min="1"
                       class="w-full rounded-lg border border-gray-300 px-4 py-2.5
                              focus:outline-none focus:ring-2 focus:ring-blue-600
                              focus:border-blue-600"
                       required>
            </div>


            {{-- STATUS --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Status
                </label>

                <select name="status"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5
                               focus:outline-none focus:ring-2 focus:ring-blue-600
                               focus:border-blue-600">

                    <option value="aktif"
                        {{ old('status', $struktur->status) === 'aktif' ? 'selected' : '' }}>
                        Aktif
                    </option>

                    <option value="tidak_aktif"
                        {{ old('status', $struktur->status) === 'tidak_aktif' ? 'selected' : '' }}>
                        Tidak Aktif
                    </option>

                </select>
            </div>


            {{-- FOTO --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Foto
                </label>

                @if($struktur->foto)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $struktur->foto) }}"
                             alt="{{ $struktur->nama }}"
                             class="h-32 w-32 rounded-lg object-cover border border-gray-200">
                    </div>
                @endif

                <input type="file"
                       name="foto"
                       accept="image/*"
                       class="w-full rounded-lg border border-gray-300 px-4 py-2.5
                              file:mr-3 file:rounded-lg file:border-0
                              file:bg-blue-700 file:px-4 file:py-2
                              file:text-white file:font-semibold
                              hover:file:bg-blue-800">

                <p class="mt-2 text-sm text-gray-500">
                    Kosongkan jika tidak ingin mengganti foto.
                </p>
            </div>


            {{-- KETERANGAN --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Keterangan
                </label>

                <textarea name="keterangan"
                          rows="5"
                          class="w-full rounded-lg border border-gray-300 px-4 py-2.5
                                 focus:outline-none focus:ring-2 focus:ring-blue-600
                                 focus:border-blue-600">{{ old('keterangan', $struktur->keterangan) }}</textarea>
            </div>

        </div>


        {{-- BUTTON --}}
        <div class="mt-8 flex items-center gap-3">

            {{-- UPDATE --}}
            <button type="submit"
                    class="bg-blue-700 text-white px-5 py-2.5 rounded-lg
                           font-semibold hover:bg-blue-800 transition">
                Update
            </button>

            {{-- BATAL --}}
            <a href="{{ route('admin.profil.struktur.index') }}"
               class="bg-gray-200 text-gray-800 px-5 py-2.5 rounded-lg
                      font-semibold hover:bg-gray-300 transition">
                Batal
            </a>

        </div>

    </form>

</div>
@endsection
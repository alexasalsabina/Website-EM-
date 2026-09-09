<div class="mb-5">
    <label class="mb-2 block text-sm font-semibold text-gray-700">Foto</label>
    <input type="file" name="foto" accept="image/*" class="w-full rounded-xl border border-gray-300 px-4 py-3 file:mr-3 file:rounded file:border-0 file:bg-blue-800 file:px-4 file:py-2 file:text-white">
    @if(isset($konten) && $konten->foto)
        <img src="{{ asset('storage/' . $konten->foto) }}" alt="{{ $konten->judul }}" class="mt-3 h-40 w-full rounded-xl object-cover">
    @endif
</div>
<div class="mb-5">
    <label class="mb-2 block text-sm font-semibold text-gray-700">Judul</label>
    <input type="text" name="judul" value="{{ old('judul', $konten->judul ?? '') }}" required class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-blue-700 focus:ring-2 focus:ring-blue-100">
</div>
<div class="mb-6">
    <label class="mb-2 block text-sm font-semibold text-gray-700">Isi / Keterangan</label>
    <textarea name="isi" rows="9" required class="w-full rounded-xl border border-gray-300 px-4 py-3 leading-7 focus:border-blue-700 focus:ring-2 focus:ring-blue-100">{{ old('isi', $konten->isi ?? '') }}</textarea>
</div>

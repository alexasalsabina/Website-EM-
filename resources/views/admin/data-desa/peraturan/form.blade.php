<div class="mb-5">
    <label for="judul" class="mb-2 block text-sm font-semibold text-gray-700">Judul Peraturan</label>
    <input type="text" id="judul" name="judul" value="{{ old('judul', $peraturan->judul ?? '') }}" placeholder="Contoh: Peraturan Desa tentang Pelayanan Publik" required class="w-full rounded-xl border border-gray-300 px-4 py-3 outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-100">
</div>

<div class="mb-5">
    <label for="tahun" class="mb-2 block text-sm font-semibold text-gray-700">Tahun</label>
    <input type="number" id="tahun" name="tahun" value="{{ old('tahun', $peraturan->tahun ?? date('Y')) }}" min="1900" max="2200" required class="w-full rounded-xl border border-gray-300 px-4 py-3 outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-100">
</div>

<div class="mb-6">
    <label for="isi" class="mb-2 block text-sm font-semibold text-gray-700">Isi Peraturan</label>
    <textarea id="isi" name="isi" rows="12" placeholder="Tuliskan isi peraturan desa..." required class="w-full rounded-xl border border-gray-300 px-4 py-3 leading-7 outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-100">{{ old('isi', $peraturan->isi ?? '') }}</textarea>
</div>

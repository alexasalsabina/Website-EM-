<footer class="bg-white border-t border-gray-200 text-gray-800 pt-8 pb-6 mt-auto w-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        <!-- BARIS ATAS: Kiri, Tengah, Kanan Sejajar -->
        <div class="flex flex-col md:flex-row justify-between items-start gap-8">

            <!-- 1. POJOK KIRI: Logo rapat kiri & Teks pas di tengah vertikal -->
            <div class="flex-1 flex items-center gap-2.5 min-w-[200px]">
                <img src="{{ asset('images/logo-malang.png') }}" alt="Logo Kabupaten Malang" class="h-14 w-auto flex-shrink-0 object-contain">
                <div class="flex flex-col justify-center">
                    <h3 class="text-base font-bold text-gray-900 leading-tight">Desa Jatisari</h3>
                    <p class="text-xs text-gray-600 mt-0.5">Kecamatan Tajinan, Kabupaten Malang, Jawa Timur</p>
                </div>
            </div>

            <!-- 2. TENGAH: Kantor Desa, Alamat, Email & Telp -->
            <div class="flex-1 text-xs text-gray-700 space-y-2.5 min-w-[280px]">
                <h4 class="font-bold text-gray-900 text-sm">Kantor Desa Jatisari :</h4>
                
                <!-- Alamat -->
                <div class="flex items-start gap-2.5">
                    <svg class="w-4 h-4 text-gray-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <p class="leading-relaxed">
                        Jl. K.H.Salim No. 1, Krajan, Jatisari, Kec. Tajinan, Kabupaten Malang, Jawa Timur 65100, Indonesia
                    </p>
                </div>

                <!-- Email -->
                <div class="flex items-center gap-2.5">
                    <svg class="w-4 h-4 text-gray-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 002-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <a href="mailto:desa.jatisari@malangkab.go.id" class="text-blue-600 hover:underline">
                        desa.jatisari@malangkab.go.id
                    </a>
                </div>

                <!-- Telepon -->
                <div class="flex items-center gap-2.5">
                    <svg class="w-4 h-4 text-gray-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <span>0341xxxxxx</span>
                </div>
            </div>

            <!-- 3. POJOK KANAN: Media Sosial & Kebijakan Privasi -->
            <div class="flex-1 text-xs text-gray-700 space-y-2 min-w-[200px] md:text-right">
                <h4 class="font-bold text-gray-900 text-sm">Ikuti Kami di Media Sosial :</h4>

                <!-- Icon Medsos -->
                <div class="flex items-center gap-3 pt-1 md:justify-end">
                    <!-- Instagram -->
                    <a href="#" class="text-gray-600 hover:text-pink-600 transition-colors" title="Instagram" aria-label="Instagram">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <!-- Facebook -->
                    <a href="#" class="text-gray-600 hover:text-blue-600 transition-colors" title="Facebook" aria-label="Facebook">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M9 8H6v4h3v12h5V12h3.642L18 8h-4V6.333C14 5.374 14.5 5 15.5 5H18V0h-3.808C10.592 0 9 1.592 9 4.815V8z"/></svg>
                    </a>
                    <!-- Youtube -->
                    <a href="#" class="text-gray-600 hover:text-red-600 transition-colors" title="Youtube" aria-label="Youtube">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                    </a>
                </div>

                <div class="pt-1">
                    <a href="#" class="text-xs text-gray-600 hover:underline">Kebijakan Privasi</a>
                </div>
            </div>

        </div>

        <!-- BARIS BAWAH: Watermark Copyright (Rata Tengah) -->
        <div class="border-t border-gray-200 pt-4 text-xs text-gray-600 text-center">
            <p>© {{ date('Y') }} Jatisari - Website ini dibangun oleh <strong class="font-bold text-gray-900">Himpunan Departemen Teknik Elektro dan Informatika</strong> dan dikelola oleh <strong class="font-bold text-gray-900">PSID Jatisari</strong></p>
        </div>

    </div>
</footer>
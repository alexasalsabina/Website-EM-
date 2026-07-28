<footer class="bg-white border-t border-gray-200 text-gray-800 py-8 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
        
        <!-- Logo -->
        <div class="flex items-center">
            {{-- Ganti path gambar logo sesuai penyimpanan logo Anda (misal: public/images/logo-malang.png) --}}
            <img src="{{ asset('images/logo-malang.png') }}" alt="Logo Kabupaten Malang" class="h-16 w-auto">
        </div>

        <!-- Nama Desa & Kabupaten -->
        <div class="leading-snug">
            <h2 class="text-lg font-bold text-gray-900">Desa Jatisari</h2>
            <p class="text-sm text-gray-700">Kecamatan Tajinan, Kabupaten Malang, Jawa Timur</p>
        </div>

        <!-- Alamat & Kontak -->
        <div class="text-sm text-gray-700 space-y-1">
            <p class="font-bold text-gray-900">Kantor Desa Jatisari :</p>
            <p>Jl. K.H.Salim No. 1, Krajan, Jatisari, Kec. Contoh, Kabupaten Malang, Jawa Timur 65100, Indonesia</p>
            <p>
                Email : <a href="mailto:desa.jatisari@malangkab.go.id" class="text-blue-600 hover:underline">desa.jatisari@malangkab.go.id</a> 
                | No. Telp : 0341xxxxxx
            </p>
        </div>

        <!-- Menu Tambahan -->
        <div class="text-sm space-y-1 pt-1">
            <p class="font-semibold text-gray-800 hover:underline cursor-pointer">
                Ikuti Kami di Media Sosial Lainnya
                Instagram : 
                Facebook  :
                Youtube   :
            </p>
            <p>
                <a href="#" class="text-gray-700 hover:underline">Kebijakan Privasi</a>
            </p>
        </div>

        <!-- Copyright -->
        <div class="pt-2 text-sm text-gray-700">
            <p>© {{ date('Y') }} Jatisari - Website ini dibangun oleh dan dikelola oleh <strong class="font-bold text-gray-900">Himpunan Departemen Teknik Elektro dan Informatika PSID Jatisari</strong></p>
        </div>
    </div>
</footer>
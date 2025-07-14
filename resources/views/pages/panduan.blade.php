<x-app-layout>
    <div class="min-h-screen bg-[#E0F7FE] py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

            <!-- Header -->
            <h1 class="text-4xl md:text-5xl font-extrabold text-[#016DAE] mb-4">Panduan Penggunaan ITSA</h1>
            <p class="text-lg text-gray-700 mb-10 max-w-2xl mx-auto">
                Ikuti langkah-langkah berikut untuk menggunakan layanan ITSA dengan benar dan mudah.
            </p>

            <!-- Gambar Panduan -->
            <div class="overflow-hidden rounded-xl shadow-xl border border-[#00ADE5] bg-white">
                <img src="{{ asset('image/panduan_penggunaan.png') }}" 
                     alt="Panduan Penggunaan ITSA" 
                     class="w-full h-auto object-cover">
            </div>

            <!-- Tombol Kembali -->
            <div class="mt-12">
                <a href="{{ route('dashboard') }}"
                   class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-[#016DAE] to-[#00ADE5] text-white font-semibold rounded-xl shadow hover:shadow-lg transition duration-300 transform hover:scale-105">
                    Kembali ke Dashboard
                </a>
            </div>

        </div>
    </div>
</x-app-layout>

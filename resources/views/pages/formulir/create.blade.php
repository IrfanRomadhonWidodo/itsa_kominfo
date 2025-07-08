<x-app-layout>
    {{-- Header Judul Halaman --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">📝 Isi Formulir ITSA</h2>
    </x-slot>

    <div class="py-12">
        <form method="POST" action="{{ route('formulir.store') }}" class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow space-y-6">
            @csrf

            {{-- Bagian 1: Data Sistem --}}
            <div>
                <h3 class="text-lg font-semibold mb-2 text-gray-800">1. Data Sistem</h3>
                <div class="mb-4">
                    <label for="nama_aplikasi" class="block text-sm font-medium text-gray-700">Nama Aplikasi</label>
                    <input type="text" name="nama_aplikasi" id="nama_aplikasi" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div class="mb-4">
                    <label for="domain_aplikasi" class="block text-sm font-medium text-gray-700">Domain Aplikasi</label>
                    <input type="text" name="domain_aplikasi" id="domain_aplikasi" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Jenis IP Server</label>
                    <div class="mt-1 flex space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="ip_jenis" value="lokal" class="form-radio text-blue-600" required>
                            <span class="ml-2">Lokal</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="ip_jenis" value="public" class="form-radio text-blue-600">
                            <span class="ml-2">Publik</span>
                        </label>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="ip_address" class="block text-sm font-medium text-gray-700">Alamat IP Server</label>
                    <input type="text" name="ip_address" id="ip_address" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Contoh: 192.168.1.100">
                </div>
            </div>

            {{-- Tambahkan bagian lainnya sesuai kebutuhan --}}

            {{-- Tombol Submit --}}
            <div class="pt-6 border-t mt-8">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Kirim Formulir
                </button>
            </div>
        </form>
    </div>

    {{-- Optional Footer Khusus --}}
    <footer class="text-center text-sm text-gray-500 mt-12 mb-4">
        &copy; {{ date('Y') }} Dinas Kominfo Kabupaten Banyumas. All rights reserved.
    </footer>
</x-app-layout>

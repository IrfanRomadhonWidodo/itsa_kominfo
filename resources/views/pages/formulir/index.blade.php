<x-app-layout>
    {{-- Header --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">📄 Daftar Formulir Anda</h2>
    </x-slot>

    <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{-- Tombol tambah formulir --}}
        <div class="mb-6 text-right">
            <a href="{{ route('formulir.create') }}"
               class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
               + Isi Formulir Baru
            </a>
        </div>

        {{-- Tabel daftar formulir --}}
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">No</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Nama Aplikasi</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Domain</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">IP Address</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($formulir as $key => $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $key + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->nama_aplikasi }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->domain_aplikasi }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->ip_address }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <a href="{{ route('formulir.show', $item->id) }}" class="text-blue-600 hover:underline">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-500">Belum ada formulir yang diisi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
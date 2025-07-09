<x-app-layout>


    {{-- ==== MAIN CONTENT ==== --}}
    <div class="py-12 bg-gradient-to-br from-blue-50 to-white min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if($items->isEmpty())
                <div class="text-center py-20 text-gray-500">
                    Belum ada riwayat layanan.
                </div>
            @else
                <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
                    <table class="min-w-full text-sm divide-y divide-gray-200">
                        <thead class="bg-[#00ADE5]/10 text-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left font-semibold">Nomor</th>
                                <th class="px-6 py-3 text-left font-semibold">Jenis</th>
                                <th class="px-6 py-3 text-left font-semibold">Tanggal</th>
                                <th class="px-6 py-3 text-left font-semibold">Status</th>
                                <th class="px-6 py-3 text-left font-semibold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($items as $row)
                                <tr>
                                    <td class="px-6 py-4">{{ $row->nomor_permohonan }}</td>
                                    <td class="px-6 py-4">{{ $row->jenis_layanan }}</td>
                                    <td class="px-6 py-4">
                                        {{ \Carbon\Carbon::parse($row->tanggal_permohonan)->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-block px-3 py-1 rounded-full
                                            @class([
                                                'bg-yellow-100 text-yellow-700' => $row->status == 'proses',
                                                'bg-green-100 text-green-700'   => $row->status == 'selesai',
                                                'bg-red-100 text-red-700'       => $row->status == 'ditolak',
                                            ])">
                                            {{ ucfirst($row->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($row->file_dokumen)
                                            <a href="{{ Storage::url($row->file_dokumen) }}" target="_blank"
                                               class="text-[#016DAE] hover:underline">
                                                Unduh
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    {{ $items->links() }}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>

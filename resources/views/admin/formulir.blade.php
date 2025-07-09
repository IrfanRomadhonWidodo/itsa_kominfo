<x-app-admin>
    <div id="modalBackdrop" class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm z-40 hidden"></div>

    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-3xl font-bold text-gray-900">Manajemen Formulir</h2>
            <p class="text-gray-600 mt-1">Kelola formulir yang dikirim pengguna dan upload hasil ITSA</p>
        </div>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-gray-100">
            <form action="{{ route('admin.formulir.index') }}" method="GET" class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0">
                <div class="text-sm font-medium text-gray-700">
                    Total: <span class="text-orange-500">{{ $formulirs->total() }}</span> formulir
                </div>
                <div class="flex space-x-3">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari aplikasi..."
                        class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg w-64 focus:ring-blue-500 focus:border-blue-500">
                    <select name="status" class="py-2 px-3 border border-gray-300 rounded-lg">
                        <option value="">Semua Status</option>
                        <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="revisi" {{ request('status') == 'revisi' ? 'selected' : '' }}>Revisi</option>
                        <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Cari</button>
                    @if(request('search') || request('status'))
                    <a href="{{ route('admin.formulir.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Reset</a>
                    @endif
                </div>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-[#EDBC19] to-[#8F181A]">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Nama Aplikasi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">User</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Domain</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($formulirs as $formulir)
                    <tr>
                        <td class="px-6 py-4">{{ $formulir->nama_aplikasi }}</td>
                        <td class="px-6 py-4">{{ $formulir->user->name }} <br><small class="text-gray-500">{{ $formulir->user->email }}</small></td>
                        <td class="px-6 py-4">{{ $formulir->domain_aplikasi }}</td>
                        <td class="px-6 py-4">
                            @php
                                $colors = [
                                    'diproses' => 'bg-blue-100 text-blue-800',
                                    'revisi' => 'bg-yellow-100 text-yellow-800',
                                    'selesai' => 'bg-green-100 text-green-800',
                                ];
                            @endphp
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $colors[$formulir->status] ?? 'bg-gray-100 text-gray-800' }}">
                                {{ ucfirst($formulir->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">{{ $formulir->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                <!-- Detail Modal -->
                                <button onclick="openModal('detailModal{{ $formulir->id }}')" class="text-blue-600 hover:text-blue-900">
                                    <i class="fas fa-eye"></i>
                                </button>

                                <!-- Balas Modal -->
                                <button onclick="openModal('replyModal{{ $formulir->id }}')" class="text-green-600 hover:text-green-900">
                                    <i class="fas fa-reply"></i>
                                </button>

                                <!-- Upload File Modal -->
                                <button onclick="openModal('uploadModal{{ $formulir->id }}')" class="text-indigo-600 hover:text-indigo-900">
                                    <i class="fas fa-upload"></i>
                                </button>

                                <!-- Download File -->
                                @if($formulir->file_hasil_itsa)
                                <a href="{{ route('admin.formulir.download', $formulir) }}" class="text-gray-700 hover:text-black">
                                    <i class="fas fa-download"></i>
                                </a>
                                @endif

                                <!-- Hapus -->
                                <form id="delete-form-{{ $formulir->id }}" action="{{ route('admin.formulir.destroy', $formulir) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="button" onclick="deleteFormulir({{ $formulir->id }})" class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>



<!-- Modal Detail -->
<div id="detailModal{{ $formulir->id }}" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900">Detail Formulir</h3>
            <button onclick="closeModal('detailModal{{ $formulir->id }}')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div class="px-6 py-4 space-y-4">
            <div>
                <label class="text-sm font-medium text-gray-700">Nama Aplikasi</label>
                <p class="text-sm text-gray-900">{{ $formulir->nama_aplikasi }}</p>
            </div>
            <div>
                <label class="text-sm font-medium text-gray-700">Domain Aplikasi</label>
                <p class="text-sm text-gray-900">{{ $formulir->domain_aplikasi }}</p>
            </div>
            <div>
                <label class="text-sm font-medium text-gray-700">Deskripsi Aplikasi</label>
                <p class="text-sm text-gray-900 whitespace-pre-wrap">{{ $formulir->deskripsi_aplikasi }}</p>
            </div>
            <div>
                <label class="text-sm font-medium text-gray-700">Status</label>
                <p class="text-sm text-gray-900">{{ ucfirst($formulir->status) }}</p>
            </div>
            <div>
                <label class="text-sm font-medium text-gray-700">Tanggal Pengajuan</label>
                <p class="text-sm text-gray-900">{{ $formulir->created_at->format('d M Y H:i') }}</p>
            </div>
        </div>
        <div class="px-6 py-4 border-t border-gray-200">
            <button onclick="closeModal('detailModal{{ $formulir->id }}')" class="w-full px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                Tutup
            </button>
        </div>
    </div>
</div>

<!-- Modal Balas -->
<div id="replyModal{{ $formulir->id }}" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <div class="sticky top-0 bg-white px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900">Balas Permohonan</h3>
            <button onclick="closeModal('replyModal{{ $formulir->id }}')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form method="POST" action="{{ route('admin.formulir.reply', $formulir) }}">
            @csrf
            @method('PUT')
            <div class="px-6 py-4 space-y-4">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h4 class="font-medium text-gray-900 mb-2">Permohonan dari {{ $formulir->user->name }}</h4>
                    <p class="text-sm text-gray-600"><strong>Nama Aplikasi:</strong> {{ $formulir->nama_aplikasi }}</p>
                    <p class="text-sm text-gray-600 whitespace-pre-wrap">{{ $formulir->deskripsi_aplikasi }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-700">Balasan</label>
                    <textarea name="balasan_admin" rows="4" required
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-blue-500"
                        placeholder="Tulis balasan untuk pemohon...">{{ $formulir->balasan_admin }}</textarea>
                    <p class="text-sm text-gray-500 mt-2">Status akan berubah otomatis menjadi <strong>"Selesai"</strong> setelah dibalas.</p>
                </div>
            </div>
            <div class="sticky bottom-0 px-6 py-4 border-t border-gray-200 flex space-x-3 bg-white">
                <button type="submit" class="flex-1 px-4 py-2 bg-gradient-to-r from-[#EDBC19] to-[#8F181A] text-white rounded-md hover:opacity-90">
                    Kirim Balasan
                </button>
                <button type="button" onclick="closeModal('replyModal{{ $formulir->id }}')" class="flex-1 px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                    Batal
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Upload File -->
<div id="uploadModal{{ $formulir->id }}" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-xl max-w-xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900">Upload File Hasil ITSA</h3>
            <button onclick="closeModal('uploadModal{{ $formulir->id }}')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form method="POST" action="{{ route('admin.formulir.upload', $formulir) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="px-6 py-4 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">File (PDF)</label>
                    <input type="file" name="file_hasil_itsa" accept="application/pdf" required
                        class="mt-1 block w-full text-sm text-gray-700 border border-gray-300 rounded-md file:bg-[#EDBC19] file:text-white file:py-2 file:px-4 file:rounded-md file:border-0 hover:file:opacity-90"/>
                    <p class="text-sm text-gray-500 mt-2">Unggah file hasil pemeriksaan dalam format .pdf</p>
                </div>
            </div>
            <div class="px-6 py-4 border-t border-gray-200 flex justify-end space-x-3">
                <button type="submit" class="px-4 py-2 bg-gradient-to-r from-[#EDBC19] to-[#8F181A] text-white rounded-md hover:opacity-90">
                    Upload
                </button>
                <button type="button" onclick="closeModal('uploadModal{{ $formulir->id }}')" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                    Batal
                </button>
            </div>
        </form>
    </div>
</div>

                    @empty
                    <tr>
                        <td colspan="6" class="text-center px-6 py-4 text-sm text-gray-500">Tidak ada data formulir.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="bg-white px-4 py-3 border-t border-gray-200">
            {{ $formulirs->links() }}
        </div>
    </div>

    @push('scripts')
    <script>
        function openModal(id) {
            document.getElementById('modalBackdrop').classList.remove('hidden');
            document.getElementById(id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById('modalBackdrop').classList.add('hidden');
            document.getElementById(id).classList.add('hidden');
        }

        document.getElementById('modalBackdrop').addEventListener('click', function () {
            document.querySelectorAll('[id$="Modal"]').forEach(modal => modal.classList.add('hidden'));
            this.classList.add('hidden');
        });

        function deleteFormulir(id) {
            document.getElementById('modalBackdrop').classList.remove('hidden');
            Swal.fire({
                title: 'Hapus Formulir?',
                text: 'Formulir yang dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                backdrop: false,
                confirmButtonColor: '#8F181A',
                cancelButtonColor: '#9ca3af',
            }).then((result) => {
                document.getElementById('modalBackdrop').classList.add('hidden');
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }

        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000
        });
        @endif
    </script>
    @endpush
</x-app-admin>

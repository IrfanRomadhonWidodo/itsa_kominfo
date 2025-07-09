<x-app-admin>
    <div id="modalBackdrop" class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm z-40 hidden"></div>

    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-3xl font-bold text-gray-900">Manajemen Formulir</h2>
            <p class="text-gray-600 mt-1">Kelola formulir aplikasi dari pengguna</p>
        </div>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-gray-100">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2">
                        <span class="text-sm font-medium text-gray-700">Total: <span class="text-orange-400">{{ $formulirs->total() }}</span> formulir</span>
                    </div>
                </div>
                <form action="{{ route('admin.formulir.index') }}" method="GET" class="flex items-center space-x-3">
                    <div class="relative">
                        <input type="text" name="search" placeholder="Cari formulir..."
                            class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-64"
                            value="{{ request('search') }}">
                        <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <select name="status" class="pl-3 pr-8 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Semua Status</option>
                        <option value="menunggu" {{ request('status') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="revisi" {{ request('status') == 'revisi' ? 'selected' : '' }}>Revisi</option>
                        <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Cari
                    </button>
                    @if(request('search') || request('status'))
                    <a href="{{ route('admin.formulir.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
                        Reset
                    </a>
                    @endif
                </form>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-[#EDBC19] to-[#8F181A]">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Pengguna</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Aplikasi</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Domain</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Balasan</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">File ITSA</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Tanggal</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($formulirs as $formulir)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $formulir->user->name }}</div>
                            <div class="text-sm text-gray-500">{{ $formulir->user->email }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $formulir->nama_aplikasi }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $formulir->domain_aplikasi }}</div>
                        </td>
                        <td class="px-6 py-4">
                            @if($formulir->balasan_admin)
                                <div class="text-sm text-gray-900">{{ Str::limit($formulir->balasan_admin, 50) }}</div>
                            @else
                                <span class="text-sm text-gray-400 italic">Belum ada balasan</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($formulir->file_hasil_itsa)
                                <a href="{{ Storage::url($formulir->file_hasil_itsa) }}" target="_blank" class="text-blue-600 hover:text-blue-900 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Lihat File
                                </a>
                            @else
                                <span class="text-sm text-gray-400 italic">Belum ada file</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $statusColors = [
                                    'menunggu' => 'bg-yellow-100 text-yellow-800',
                                    'diproses' => 'bg-blue-100 text-blue-800',
                                    'revisi' => 'bg-orange-100 text-orange-800',
                                    'selesai' => 'bg-green-100 text-green-800'
                                ];
                            @endphp
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusColors[$formulir->status] }}">
                                {{ ucfirst($formulir->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $formulir->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center space-x-2">
                                <button onclick="openModal('viewFormulirModal{{ $formulir->id }}')" class="text-blue-600 hover:text-blue-900" title="Lihat Detail">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                                <button onclick="openModal('replyFormulirModal{{ $formulir->id }}')" class="text-green-600 hover:text-green-900" title="Balas">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                                    </svg>
                                </button>
                                <button onclick="openModal('uploadFileModal{{ $formulir->id }}')" class="text-purple-600 hover:text-purple-900" title="Upload File">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                </button>
                                <form id="delete-form-{{ $formulir->id }}" action="{{ route('admin.formulir.destroy', $formulir->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="deleteFormulir({{ $formulir->id }})" class="text-red-600 hover:text-red-900" title="Hapus">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal View Formulir -->
                    <div id="viewFormulirModal{{ $formulir->id }}" class="fixed inset-0 flex items-center justify-center z-50 hidden">
                        <div class="bg-white rounded-lg shadow-xl max-w-4xl w-full mx-4 max-h-[90vh] overflow-y-auto">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-lg font-semibold text-gray-900">Detail Formulir</h3>
                                    <button onclick="closeModal('viewFormulirModal{{ $formulir->id }}')" class="text-gray-400 hover:text-gray-600">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="px-6 py-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <h4 class="font-medium text-gray-900 mb-3">Informasi Pengguna</h4>
                                        <div class="space-y-2">
                                            <div><span class="font-medium">Nama:</span> {{ $formulir->user->name }}</div>
                                            <div><span class="font-medium">Email:</span> {{ $formulir->user->email }}</div>
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900 mb-3">Informasi Aplikasi</h4>
                                        <div class="space-y-2">
                                            <div><span class="font-medium">Nama Aplikasi:</span> {{ $formulir->nama_aplikasi }}</div>
                                            <div><span class="font-medium">Domain:</span> {{ $formulir->domain_aplikasi }}</div>
                                            <div><span class="font-medium">IP Jenis:</span> {{ $formulir->ip_jenis }}</div>
                                            <div><span class="font-medium">IP Address:</span> {{ $formulir->ip_address }}</div>
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900 mb-3">Informasi Pejabat</h4>
                                        <div class="space-y-2">
                                            <div><span class="font-medium">Nama:</span> {{ $formulir->pejabat_nama }}</div>
                                            <div><span class="font-medium">NIP:</span> {{ $formulir->pejabat_nip }}</div>
                                            <div><span class="font-medium">Pangkat:</span> {{ $formulir->pejabat_pangkat }}</div>
                                            <div><span class="font-medium">Jabatan:</span> {{ $formulir->pejabat_jabatan }}</div>
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900 mb-3">Detail Sistem</h4>
                                        <div class="space-y-2">
                                            <div><span class="font-medium">Tujuan Sistem:</span> {{ $formulir->tujuan_sistem }}</div>
                                            <div><span class="font-medium">Pengguna Sistem:</span> {{ $formulir->pengguna_sistem }}</div>
                                            <div><span class="font-medium">Hosting:</span> {{ $formulir->hosting }}</div>
                                            <div><span class="font-medium">Framework:</span> {{ $formulir->framework }}</div>
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900 mb-3">Pengelolaan</h4>
                                        <div class="space-y-2">
                                            <div><span class="font-medium">Pengelola Sistem:</span> {{ $formulir->pengelola_sistem }}</div>
                                            <div><span class="font-medium">Jumlah Roles:</span> {{ $formulir->jumlah_roles }}</div>
                                            <div><span class="font-medium">Nama Roles:</span> {{ $formulir->nama_roles }}</div>
                                            <div><span class="font-medium">PIC Pengelola:</span> {{ $formulir->pic_pengelola }}</div>
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900 mb-3">Keamanan</h4>
                                        <div class="space-y-2">
                                            <div><span class="font-medium">Mekanisme Account:</span> {{ $formulir->mekanisme_account }}</div>
                                            <div><span class="font-medium">Mekanisme Kredensial:</span> {{ $formulir->mekanisme_kredensial }}</div>
                                            <div><span class="font-medium">Fitur Reset Password:</span> {{ $formulir->fitur_reset_password }}</div>
                                        </div>
                                    </div>
                                </div>
                                @if($formulir->keterangan_tambahan)
                                <div class="mt-6">
                                    <h4 class="font-medium text-gray-900 mb-3">Keterangan Tambahan</h4>
                                    <p class="text-gray-700 whitespace-pre-wrap">{{ $formulir->keterangan_tambahan }}</p>
                                </div>
                                @endif
                                @if($formulir->balasan_admin)
                                <div class="mt-6">
                                    <h4 class="font-medium text-gray-900 mb-3">Balasan Admin</h4>
                                    <p class="text-gray-700 whitespace-pre-wrap">{{ $formulir->balasan_admin }}</p>
                                </div>
                                @endif
                                <div class="mt-6">
                                    <h4 class="font-medium text-gray-900 mb-3">Informasi Status</h4>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div><span class="font-medium">Status:</span> {{ ucfirst($formulir->status) }}</div>
                                        <div><span class="font-medium">Tanggal Dibuat:</span> {{ $formulir->created_at->format('d M Y H:i') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-6 py-4 border-t border-gray-200">
                                <button onclick="closeModal('viewFormulirModal{{ $formulir->id }}')" class="w-full px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                                    Tutup
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Reply Formulir -->
                    <div id="replyFormulirModal{{ $formulir->id }}" class="fixed inset-0 flex items-center justify-center z-50 hidden">
                        <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
                            <div class="sticky top-0 bg-white px-6 py-4 border-b border-gray-200 rounded-t-lg">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-lg font-semibold text-gray-900">Balas Formulir</h3>
                                    <button onclick="closeModal('replyFormulirModal{{ $formulir->id }}')" class="text-gray-400 hover:text-gray-600">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <form action="{{ route('admin.formulir.update', $formulir->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="px-6 py-4">
                                    <div class="space-y-4">
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <h4 class="font-medium text-gray-900 mb-2">Formulir dari {{ $formulir->user->name }}</h4>
                                            <p class="text-sm text-gray-600 mb-2"><strong>Aplikasi:</strong> {{ $formulir->nama_aplikasi }}</p>
                                            <p class="text-sm text-gray-600"><strong>Domain:</strong> {{ $formulir->domain_aplikasi }}</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">File Hasil ITSA (PDF)</label>
                                            <input type="file" name="file_hasil_itsa" accept=".pdf" required
                                                class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <p class="mt-2 text-sm text-gray-500">Format: PDF, Maksimal 10MB. Setelah upload, status akan otomatis berubah menjadi "Selesai"</p>
                                        </div>
                                        @if($formulir->file_hasil_itsa)
                                        <div class="bg-blue-50 p-4 rounded-lg">
                                            <p class="text-sm text-blue-800">File saat ini: 
                                                <a href="{{ Storage::url($formulir->file_hasil_itsa) }}" target="_blank" class="underline">Lihat File</a>
                                            </p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="px-6 py-4 border-t border-gray-200 flex space-x-3">
                                    <button type="submit" class="flex-1 px-4 py-2 bg-gradient-to-r from-[#EDBC19] to-[#8F181A] text-white rounded-md hover:opacity-90 transition">
                                        Upload File
                                    </button>
                                    <button type="button" onclick="closeModal('uploadFileModal{{ $formulir->id }}')" class="flex-1 px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                                        Batal
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                            Tidak ada formulir yang ditemukan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
            {{ $formulirs->links() }}
        </div>
    </div>

    @push('scripts')
    <script>
        // Modal handling functions
        function openModal(modalId) {
            document.getElementById('modalBackdrop').classList.remove('hidden');
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById('modalBackdrop').classList.add('hidden');
            document.getElementById(modalId).classList.add('hidden');
        }

        // Close all modals when backdrop is clicked
        document.getElementById('modalBackdrop').addEventListener('click', function() {
            document.querySelectorAll('[id$="Modal"]').forEach(modal => {
                modal.classList.add('hidden');
            });
            this.classList.add('hidden');
        });

        // SweetAlert for success messages
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        @endif

        // SweetAlert for delete confirmation with backdrop blur
        function deleteFormulir(id) {
            // Show backdrop with blur
            document.getElementById('modalBackdrop').classList.remove('hidden');
            
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Formulir yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#8F181A',
                cancelButtonColor: '#9ca3af',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                backdrop: false // Don't use SweetAlert's backdrop since we're using our own
            }).then((result) => {
                // Hide backdrop
                document.getElementById('modalBackdrop').classList.add('hidden');
                
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
    @endpush
</x-app-admin>
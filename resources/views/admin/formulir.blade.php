<x-app-admin>
    <x-slot name="title">Kelola Formulir</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Header -->
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-900">Kelola Formulir</h2>
                        <button onclick="openCreateModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-medium">
                            Tambah Formulir
                        </button>
                    </div>

                    <!-- Filter dan Search -->
                    <div class="mb-6 flex flex-col sm:flex-row gap-4">
                        <div class="flex-1">
                            <form method="GET" action="{{ route('admin.formulir.index') }}" class="flex gap-4">
                                <div class="flex-1">
                                    <input type="text" name="search" value="{{ request('search') }}" 
                                           placeholder="Cari berdasarkan nama aplikasi atau nama user..." 
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div class="w-48">
                                    <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <option value="">Semua Status</option>
                                        <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                        <option value="revisi" {{ request('status') == 'revisi' ? 'selected' : '' }}>Revisi</option>
                                        <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                                </div>
                                <button type="submit" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-md">
                                    Filter
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Tabel Formulir -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Aplikasi</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Domain</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($formulirs as $formulir)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $formulir->user->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $formulir->user->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $formulir->nama_aplikasi }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $formulir->domain_aplikasi }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($formulir->status == 'diproses')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                Diproses
                                            </span>
                                        @elseif($formulir->status == 'revisi')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                Revisi
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                Selesai
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $formulir->created_at->format('d/m/Y H:i') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <button onclick="showDetail({{ $formulir->id }})" class="text-blue-600 hover:text-blue-900">Detail</button>
                                            <button onclick="openEditModal({{ $formulir->id }})" class="text-indigo-600 hover:text-indigo-900">Edit</button>
                                            <button onclick="openBalasanModal({{ $formulir->id }})" class="text-green-600 hover:text-green-900">Balasan</button>
                                            <button onclick="openUploadModal({{ $formulir->id }})" class="text-purple-600 hover:text-purple-900">Upload</button>
                                            @if($formulir->file_hasil_itsa)
                                                <a href="{{ route('admin.formulir.downloadFile', $formulir->id) }}" class="text-cyan-600 hover:text-cyan-900">Download</a>
                                            @endif
                                            <button onclick="deleteFormulir({{ $formulir->id }})" class="text-red-600 hover:text-red-900">Hapus</button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                        Tidak ada data formulir
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $formulirs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Create/Edit -->
    <div id="formulirModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 max-w-6xl shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4" id="modalTitle">Tambah Formulir</h3>
                <form id="formulirForm">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- User -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">User</label>
                            <select name="user_id" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Pilih User</option>
                            </select>
                        </div>

                        <!-- Nama Aplikasi -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Aplikasi</label>
                            <input type="text" name="nama_aplikasi" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Domain Aplikasi -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Domain Aplikasi</label>
                            <input type="text" name="domain_aplikasi" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- IP Jenis -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">IP Jenis</label>
                            <input type="text" name="ip_jenis" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- IP Address -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">IP Address</label>
                            <input type="text" name="ip_address" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Pejabat Nama -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pejabat</label>
                            <input type="text" name="pejabat_nama" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Pejabat NIP -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">NIP Pejabat</label>
                            <input type="text" name="pejabat_nip" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Pejabat Pangkat -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pangkat Pejabat</label>
                            <input type="text" name="pejabat_pangkat" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Pejabat Jabatan -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan Pejabat</label>
                            <input type="text" name="pejabat_jabatan" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Hosting -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Hosting</label>
                            <input type="text" name="hosting" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Framework -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Framework</label>
                            <input type="text" name="framework" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Pengelola Sistem -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pengelola Sistem</label>
                            <input type="text" name="pengelola_sistem" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Jumlah Roles -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Roles</label>
                            <input type="number" name="jumlah_roles" required min="1" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- PIC Pengelola -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">PIC Pengelola</label>
                            <input type="text" name="pic_pengelola" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select name="status" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="diproses">Diproses</option>
                                <option value="revisi">Revisi</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>

                        <!-- Tujuan Sistem -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tujuan Sistem</label>
                            <textarea name="tujuan_sistem" required rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>

                        <!-- Pengguna Sistem -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pengguna Sistem</label>
                            <textarea name="pengguna_sistem" required rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>

                        <!-- Nama Roles -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Roles</label>
                            <textarea name="nama_roles" required rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>

                        <!-- Mekanisme Account -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Mekanisme Account</label>
                            <textarea name="mekanisme_account" required rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>

                        <!-- Mekanisme Kredensial -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Mekanisme Kredensial</label>
                            <textarea name="mekanisme_kredensial" required rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>

                        <!-- Fitur Reset Password -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Fitur Reset Password</label>
                            <textarea name="fitur_reset_password" required rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>

                        <!-- Keterangan Tambahan -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Keterangan Tambahan</label>
                            <textarea name="keterangan_tambahan" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>

                        <!-- Balasan Admin -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Balasan Admin</label>
                            <textarea name="balasan_admin" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 mt-6">
                        <button type="button" onclick="closeFormulirModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Detail -->
    <div id="detailModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 max-w-6xl shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Detail Formulir</h3>
                <div id="detailContent" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Content will be loaded here -->
                </div>
                <div class="flex justify-end mt-6">
                    <button onclick="closeDetailModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Balasan Admin -->
    <div id="balasanModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 max-w-2xl shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Balasan Admin</h3>
                <form id="balasanForm">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Balasan Admin</label>
                        <textarea name="balasan_admin" required rows="5" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan balasan admin..."></textarea>
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeBalasanModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Upload File -->
    <div id="uploadModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 max-w-2xl shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Upload File Hasil ITSA</h3>
                <form id="uploadForm" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">File PDF</label>
                        <input type="file" name="file_hasil_itsa" accept=".pdf" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <p class="text-sm text-gray-500 mt-1">Maksimal 10MB, format PDF</p>
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeUploadModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Upload
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let currentFormulirId = null;
        let isEdit = false;

        // Open Create Modal
        function openCreateModal() {
            isEdit = false;
            currentFormulirId = null;
            document.getElementById('modalTitle').textContent = 'Tambah Formulir';
            document.getElementById('formulirForm').reset();
            
            // Load users
            fetch('/admin/formulir/create')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const userSelect = document.querySelector('select[name="user_id"]');
                        userSelect.innerHTML = '<option value="">Pilih User</option>';
                        data.users.forEach(user => {
                            userSelect.innerHTML += `<option value="${user.id}">${user.name} - ${user.email}</option>`;
                        });
                    }
                });
            
            document.getElementById('formulirModal').classList.remove('hidden');
        }

        // Open Edit Modal
        function openEditModal(id) {
            isEdit = true;
            currentFormulirId = id;
            document.getElementById('modalTitle').textContent = 'Edit Formulir';
            
            fetch(`/admin/formulir/${id}/edit`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Fill users
                        const userSelect = document.querySelector('select[name="user_id"]');
                        userSelect.innerHTML = '<option value="">Pilih User</option>';
                        data.users.forEach(user => {
                            userSelect.innerHTML += `<option value="${user.id}" ${user.id == data.formulir.user_id ? 'selected' : ''}>${user.name} - ${user.email}</option>`;
                        });
                        
                        // Fill form with data
                        const form = document.getElementById('formulirForm');
                        Object.keys(data.formulir).forEach(key => {
                            const element = form.querySelector(`[name="${key}"]`);
                            if (element) {
                                element.value = data.formulir[key] || '';
                            }
                        });
                    }
                });
            
            document.getElementById('formulirModal').classList.remove('hidden');
        }

        // Close Formulir Modal
        function closeFormulirModal() {
            document.getElementById('formulirModal').classList.add('hidden');
            document.getElementById('formulirForm').reset();
        }

        // Handle Form Submit
        document.getElementById('formulirForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const url = isEdit ? `/admin/formulir/${currentFormulirId}` : '/admin/formulir';
            const method = isEdit ? 'PUT' : 'POST';
            
            if (isEdit) {
                formData.append('_method', 'PUT');
            }
            
            fetch(url, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    closeFormulirModal();
                    location.reload();
                } else {
                    alert('Error: ' + (data.message || 'Something went wrong'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error: Something went wrong');
            });
        });

        // Show Detail
        function showDetail(id) {
            fetch(`/admin/formulir/${id}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const formulir = data.formulir;
                        const detailContent = document.getElementById('detailContent');
                        
                        detailContent.innerHTML = `
                            <div><strong>User:</strong> ${formulir.user.name} (${formulir.user.email})</div>
                            <div><strong>Nama Aplikasi:</strong> ${formulir.nama_aplikasi}</div>
                            <div><strong>Domain Aplikasi:</strong> ${formulir.domain_aplikasi}</div>
                            <div><strong>IP Jenis:</strong> ${formulir.ip_jenis}</div>
                            <div><strong>IP Address:</strong> ${formulir.ip_address}</div>
                            <div><strong>Nama Pejabat:</strong> ${formulir.pejabat_nama}</div>
                            <div><strong>NIP Pejabat:</strong> ${formulir.pejabat_nip}</div>
                            <div><strong>Pangkat Pejabat:</strong> ${formulir.pejabat_pangkat}</div>
                            <div><strong>Jabatan Pejabat:</strong> ${formulir.pejabat_jabatan}</div>
                            <div><strong>Hosting:</strong> ${formulir.hosting}</div>
                            <div><strong>Framework:</strong> ${formulir.framework}</div>
                            <div><strong>Pengelola Sistem:</strong> ${formulir.pengelola_sistem}</div>
                            <div><strong>Jumlah Roles:</strong> ${formulir.jumlah_roles}</div>
                            <div><strong>PIC Pengelola:</strong> ${formulir.pic_pengelola}</div>
                            <div><strong>Status:</strong> ${formulir.status}</div>
                            <div class="md:col-span-2"><strong>Tujuan Sistem:</strong> ${formulir.tujuan_sistem}</div>
                            <div class="md:col-span-2"><strong>Pengguna Sistem:</strong> ${formulir.pengguna_sistem}</div>
                            <div class="md:col-span-2"><strong>Nama Roles:</strong> ${formulir.nama_roles}</div>
                            <div class="md:col-span-2"><strong>Mekanisme Account:</strong> ${formulir.mekanisme_account}</div>
                            <div class="md:col-span-2"><strong>Mekanisme Kredensial:</strong> ${formulir.mekanisme_kredensial}</div>
                            <div class="md:col-span-2"><strong>Fitur Reset Password:</strong> ${formulir.fitur_reset_password}</div>
                            ${formulir.keterangan_tambahan ? `<div class="md:col-span-2"><strong>Keterangan Tambahan:</strong> ${formulir.keterangan_tambahan}</div>` : ''}
                            ${formulir.balasan_admin ? `<div class="md:col-span-2"><strong>Balasan Admin:</strong> ${formulir.balasan_admin}</div>` : ''}
                            ${formulir.file_hasil_itsa ? `<div class="md:col-span-2"><strong>File Hasil ITSA:</strong> <a href="/admin/formulir/${formulir.id}/download" class="text-blue-600 hover:text-blue-800">Download</a></div>` : ''}
                        `;
                        
                        document.getElementById('detailModal').classList.remove('hidden');
                    }
                });
        }

        // Close Detail Modal
        function closeDetailModal() {
            document.getElementById('detailModal').classList.add('hidden');
        }

        // Open Balasan Modal
        function openBalasanModal(id) {
            currentFormulirId = id;
            document.getElementById('balasanForm').reset();
            document.getElementById('balasanModal').classList.remove('hidden');
        }

        // Close Balasan Modal
        function closeBalasanModal() {
            document.getElementById('balasanModal').classList.add('hidden');
        }

        // Handle Balasan Form Submit
        document.getElementById('balasanForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            fetch(`/admin/formulir/${currentFormulirId}/balasan`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    closeBalasanModal();
                    location.reload();
                } else {
                    alert('Error: ' + (data.message || 'Something went wrong'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error: Something went wrong');
            });
        });

        // Open Upload Modal
        function openUploadModal(id) {
            currentFormulirId = id;
            document.getElementById('uploadForm').reset();
            document.getElementById('uploadModal').classList.remove('hidden');
        }

        // Close Upload Modal
        function closeUploadModal() {
            document.getElementById('uploadModal').classList.add('hidden');
        }

        // Handle Upload Form Submit
        document.getElementById('uploadForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            fetch(`/admin/formulir/${currentFormulirId}/upload`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    closeUploadModal();
                    location.reload();
                } else {
                    alert('Error: ' + (data.message || 'Something went wrong'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error: Something went wrong');
            });
        });

        // Delete Formulir
        function deleteFormulir(id) {
            if (confirm('Apakah Anda yakin ingin menghapus formulir ini?')) {
                fetch(`/admin/formulir/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        location.reload();
                    } else {
                        alert('Error: ' + (data.message || 'Something went wrong'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error: Something went wrong');
                });
            }
        }
    </script>
</x-app-admin>
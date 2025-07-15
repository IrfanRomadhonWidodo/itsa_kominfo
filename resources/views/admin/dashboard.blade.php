<x-app-admin>
    <div class="p-6 space-y-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Dashboard Admin</h1>
            <p class="mt-2 text-gray-600">Selamat datang! Berikut adalah ringkasan aktivitas aplikasi Anda.</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Users Card -->
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Total Pengguna</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $totalUsers }}</p>
                        <p class="text-xs text-gray-500 mt-1">Semua pengguna terdaftar</p>
                    </div>
                    <div class="bg-gradient-to-r from-blue-100 to-blue-200 p-3 rounded-full">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Pending Approvals Card -->
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Menunggu Persetujuan</p>
                        <p class="text-2xl font-bold text-yellow-600">{{ $usersDiproses }}</p>
                        <p class="text-xs text-gray-500 mt-1">Pengguna yang perlu diproses</p>
                    </div>
                    <div class="bg-gradient-to-r from-yellow-100 to-yellow-200 p-3 rounded-full">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Feedback Pending Card -->
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Feedback Tertunda</p>
                        <p class="text-2xl font-bold text-orange-600">{{ $feedbackDiproses }}</p>
                        <p class="text-xs text-gray-500 mt-1">Feedback yang belum dibalas</p>
                    </div>
                    <div class="bg-gradient-to-r from-orange-100 to-orange-200 p-3 rounded-full">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-4l-4 4z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Forms Revision Card -->
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Formulir Revisi</p>
                        <p class="text-2xl font-bold text-purple-600">{{ $formulirRevisi }}</p>
                        <p class="text-xs text-gray-500 mt-1">Formulir yang perlu revisi</p>
                    </div>
                    <div class="bg-gradient-to-r from-purple-100 to-purple-200 p-3 rounded-full">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left Column - Status Overview -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900">Ringkasan Status</h2>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <!-- User Status Chart -->
                            <div class="space-y-4">
                                <h3 class="text-sm font-medium text-gray-700 mb-4">Status Pengguna</h3>
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                        <div class="flex items-center">
                                            <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                                            <span class="text-sm text-gray-600">Disetujui</span>
                                        </div>
                                        <span class="text-sm font-semibold text-green-600">{{ $usersDisetujui }}</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                        <div class="flex items-center">
                                            <div class="w-3 h-3 bg-yellow-500 rounded-full mr-3"></div>
                                            <span class="text-sm text-gray-600">Diproses</span>
                                        </div>
                                        <span class="text-sm font-semibold text-yellow-600">{{ $usersDiproses }}</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                        <div class="flex items-center">
                                            <div class="w-3 h-3 bg-red-500 rounded-full mr-3"></div>
                                            <span class="text-sm text-gray-600">Ditolak</span>
                                        </div>
                                        <span class="text-sm font-semibold text-red-600">{{ $usersDitolak }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Formulir Status Chart -->
                            <div class="space-y-4">
                                <h3 class="text-sm font-medium text-gray-700 mb-4">Status Formulir</h3>
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                        <div class="flex items-center">
                                            <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                                            <span class="text-sm text-gray-600">Selesai</span>
                                        </div>
                                        <span class="text-sm font-semibold text-green-600">{{ $formulirSelesai }}</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                        <div class="flex items-center">
                                            <div class="w-3 h-3 bg-orange-500 rounded-full mr-3"></div>
                                            <span class="text-sm text-gray-600">Revisi</span>
                                        </div>
                                        <span class="text-sm font-semibold text-orange-600">{{ $formulirRevisi }}</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                        <div class="flex items-center">
                                            <div class="w-3 h-3 bg-yellow-500 rounded-full mr-3"></div>
                                            <span class="text-sm text-gray-600">Diproses</span>
                                        </div>
                                        <span class="text-sm font-semibold text-yellow-600">{{ $formulirDiproses }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Feedback Status Chart -->
                            <div class="space-y-4">
                                <h3 class="text-sm font-medium text-gray-700 mb-4">Status Feedback</h3>
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                        <div class="flex items-center">
                                            <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                                            <span class="text-sm text-gray-600">Selesai</span>
                                        </div>
                                        <span class="text-sm font-semibold text-green-600">{{ $feedbackSelesai ?? 0 }}</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                        <div class="flex items-center">
                                            <div class="w-3 h-3 bg-orange-500 rounded-full mr-3"></div>
                                            <span class="text-sm text-gray-600">Diproses</span>
                                        </div>
                                        <span class="text-sm font-semibold text-orange-600">{{ $feedbackDiproses }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Tasks Alert -->
            <div class="space-y-6">
                <!-- Tasks Alert -->
                @if($usersDiproses > 0 || $feedbackDiproses > 0 || $formulirRevisi > 0)
                <div class="bg-yellow-50 rounded-lg border border-yellow-200">
                    <div class="p-6">
                        <div class="flex items-center mb-3">
                            <svg class="w-5 h-5 text-yellow-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                            <h3 class="text-sm font-medium text-yellow-800">Perhatian!</h3>
                        </div>
                        <p class="text-sm text-yellow-700 mb-3">Ada beberapa item yang memerlukan perhatian Anda:</p>
                        <div class="space-y-1 text-sm text-yellow-700">
                            @if($usersDiproses > 0)
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-yellow-500 rounded-full mr-2"></div>
                                    {{ $usersDiproses }} pengguna menunggu persetujuan
                                </div>
                            @endif
                            @if($feedbackDiproses > 0)
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-yellow-500 rounded-full mr-2"></div>
                                    {{ $feedbackDiproses }} feedback belum dibalas
                                </div>
                            @endif
                            @if($formulirRevisi > 0)
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-yellow-500 rounded-full mr-2"></div>
                                    {{ $formulirRevisi }} formulir perlu revisi
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endif

                <!-- Recent Activity -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="p-4 border-b border-gray-200">
                        <h3 class="text-sm font-semibold text-gray-900">Aktivitas Terbaru</h3>
                    </div>
                    <div class="p-4">
                        <div class="space-y-3">
                            <div class="flex items-center text-sm">
                                <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                                <span class="text-gray-600">User baru disetujui</span>
                                <span class="ml-auto text-gray-400">2 jam lalu</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <div class="w-2 h-2 bg-orange-500 rounded-full mr-3"></div>
                                <span class="text-gray-600">Feedback baru masuk</span>
                                <span class="ml-auto text-gray-400">4 jam lalu</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <div class="w-2 h-2 bg-purple-500 rounded-full mr-3"></div>
                                <span class="text-gray-600">Formulir butuh revisi</span>
                                <span class="ml-auto text-gray-400">6 jam lalu</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Activity Chart -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900">Aktivitas Mingguan</h2>
                </div>
                <div class="p-6">
                    <div class="h-64 flex items-end justify-between space-x-2">
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-blue-500 rounded-t" style="height: 80px;"></div>
                            <span class="text-xs text-gray-500 mt-2">Sen</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-blue-500 rounded-t" style="height: 120px;"></div>
                            <span class="text-xs text-gray-500 mt-2">Sel</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-blue-500 rounded-t" style="height: 60px;"></div>
                            <span class="text-xs text-gray-500 mt-2">Rab</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-blue-500 rounded-t" style="height: 100px;"></div>
                            <span class="text-xs text-gray-500 mt-2">Kam</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-blue-500 rounded-t" style="height: 140px;"></div>
                            <span class="text-xs text-gray-500 mt-2">Jum</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-blue-500 rounded-t" style="height: 90px;"></div>
                            <span class="text-xs text-gray-500 mt-2">Sab</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-blue-500 rounded-t" style="height: 50px;"></div>
                            <span class="text-xs text-gray-500 mt-2">Min</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Performance Metrics -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900">Metrik Performa</h2>
                </div>
                <div class="p-6">
                    <div class="space-y-6">
                        <!-- Response Time -->
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm font-medium text-gray-700">Waktu Respons</span>
                                <span class="text-sm text-gray-500">85%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: 85%"></div>
                            </div>
                        </div>

                        <!-- User Satisfaction -->
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm font-medium text-gray-700">Kepuasan Pengguna</span>
                                <span class="text-sm text-gray-500">92%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-blue-500 h-2 rounded-full" style="width: 92%"></div>
                            </div>
                        </div>

                        <!-- System Uptime -->
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm font-medium text-gray-700">System Uptime</span>
                                <span class="text-sm text-gray-500">99.8%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-purple-500 h-2 rounded-full" style="width: 99.8%"></div>
                            </div>
                        </div>

                        <!-- Task Completion -->
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm font-medium text-gray-700">Penyelesaian Tugas</span>
                                <span class="text-sm text-gray-500">78%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-yellow-500 h-2 rounded-full" style="width: 78%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-admin>
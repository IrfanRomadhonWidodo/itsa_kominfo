<div class="min-h-screen bg-gradient-to-br from-orange-100 via-pink-50 to-purple-100 relative overflow-hidden">
    <!-- Soft Background Decorations -->
    <div class="fixed inset-0 pointer-events-none">
        <div class="absolute top-20 left-20 w-96 h-96 bg-gradient-to-br from-pink-200/30 to-purple-200/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-20 w-80 h-80 bg-gradient-to-br from-orange-200/30 to-pink-200/20 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-72 h-72 bg-gradient-to-br from-purple-200/20 to-blue-200/10 rounded-full blur-3xl"></div>
    </div>

    <x-app-layout>
        <!-- Header Background -->
        <div class="relative bg-gradient-to-r from-[#016DAE]/80 to-[#00ADE5]/80 backdrop-blur-sm h-32 shadow-lg -mt-4 border-b border-white/20">
            <div class="absolute inset-0 bg-gradient-to-r from-white/10 to-transparent"></div>
        </div>

        <!-- Profile Photo - Centered -->
        <div class="flex justify-center -mt-16 mb-8">
            <div class="relative group">
                <div class="w-32 h-32 rounded-full border-4 border-white/80 shadow-xl bg-white/90 overflow-hidden backdrop-blur-sm">
                    <img src="https://www.gravatar.com/avatar/{{ md5(auth()->user()->email) }}?s=256&d=mp" 
                         alt="Profile Photo"
                         class="w-full h-full object-cover">
                </div>
                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 bg-black/20 rounded-full backdrop-blur-sm">
                    <button class="text-white text-xs bg-white/20 backdrop-blur-sm px-3 py-1.5 rounded-full flex items-center border border-white/30 hover:bg-white/30 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                        </svg>
                        Ubah
                    </button>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
            <!-- User Info - Centered -->
            <div class="text-center mb-8">
                <h1 class="text-2xl font-medium text-gray-700">{{ auth()->user()->name }}</h1>
                <div class="flex items-center justify-center mt-2 space-x-4 text-gray-500 text-sm">
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-[#00ADE5]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        {{ auth()->user()->email }}
                    </span>
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-[#016DAE]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        Bergabung {{ auth()->user()->created_at->format('d M Y') }}
                    </span>
                </div>
                <div class="mt-3 flex justify-center">
                    <span class="bg-green-50/80 backdrop-blur-sm text-green-700 px-3 py-1 rounded-full text-xs font-medium flex items-center border border-green-200/50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Akun Terverifikasi
                    </span>
                </div>
            </div>

            <!-- Profile Sections - Full Width & Seamless -->
            <div class="space-y-8">
                <!-- Profile Information -->
                <div class="bg-white/40 backdrop-blur-sm rounded-2xl shadow-sm border border-white/30 overflow-hidden">
                    <div class="px-8 py-6 border-b border-white/30 bg-gradient-to-r from-white/20 to-transparent">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="mr-4 text-[#016DAE]/80">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-medium text-gray-700">Informasi Profil</h3>
                                    <p class="text-sm text-gray-500 mt-1">Kelola informasi profil Anda</p>
                                </div>
                            </div>
                            <span class="text-xs text-gray-400 bg-white/50 backdrop-blur-sm px-3 py-1 rounded-full">Terakhir diperbarui: 3 hari lalu</span>
                        </div>
                    </div>
                    <div class="p-8">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <!-- Account Security -->
                <div class="bg-white/40 backdrop-blur-sm rounded-2xl shadow-sm border border-white/30 overflow-hidden">
                    <div class="px-8 py-6 border-b border-white/30 bg-gradient-to-r from-white/20 to-transparent">
                        <div class="flex items-center">
                            <div class="mr-4 text-[#00ADE5]/80">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-medium text-gray-700">Keamanan Akun</h3>
                                <p class="text-sm text-gray-500 mt-1">Perbarui kata sandi Anda</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-8">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <!-- Delete Account -->
                <div class="bg-white/40 backdrop-blur-sm rounded-2xl shadow-sm border border-red-200/30 overflow-hidden">
                    <div class="px-8 py-6 border-b border-red-100/50 bg-gradient-to-r from-red-50/40 to-transparent">
                        <div class="flex items-center">
                            <div class="mr-4 text-red-500/80">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-medium text-red-600">Hapus Akun</h3>
                                <p class="text-sm text-red-500 mt-1">Tindakan ini tidak dapat dibatalkan</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-8 bg-red-50/20">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</div>
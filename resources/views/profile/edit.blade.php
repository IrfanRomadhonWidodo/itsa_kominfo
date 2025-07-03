<x-app-layout>
    <!-- Profile Header -->
    <div class="relative bg-gradient-to-r from-[#016DAE] to-[#00ADE5] h-52 shadow-sm">
        <div class="absolute -bottom-16 left-8">
            <div class="relative group">
                <div class="w-32 h-32 rounded-full border-4 border-white shadow-md bg-gray-100 overflow-hidden">
                    <img src="https://www.gravatar.com/avatar/{{ md5(auth()->user()->email) }}?s=256&d=mp" 
                         alt="Profile Photo"
                         class="w-full h-full object-cover">
                </div>
                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity bg-black bg-opacity-30 rounded-full">
                    <button class="text-white text-xs bg-black bg-opacity-50 px-2 py-1 rounded-full flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                        </svg>
                        Ubah
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mt-20 mb-12">
        <!-- User Info -->
        <div class="flex justify-between items-end mb-8">
            <div>
                <h1 class="text-2xl font-semibold text-gray-800">{{ auth()->user()->name }}</h1>
                <div class="flex items-center mt-2 space-x-4 text-gray-600 text-sm">
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
            </div>
            <span class="bg-[#EDBC19] bg-opacity-10 text-[#8F181A] px-3 py-1 rounded-full text-xs font-medium flex items-center border border-[#EDBC19]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Akun Terverifikasi
            </span>
        </div>

        <!-- Navigation Tabs -->
        <div class="border-b border-gray-200 mb-8">
            <nav class="-mb-px flex space-x-8">
                <a href="#" class="border-[#016DAE] text-[#016DAE] whitespace-nowrap py-3 px-1 border-b-2 font-medium text-sm">
                    Profil Saya
                </a>
                <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-3 px-1 border-b-2 font-medium text-sm">
                    Aktivitas
                </a>
                <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-3 px-1 border-b-2 font-medium text-sm">
                    Notifikasi
                </a>
            </nav>
        </div>

        <!-- Profile Sections -->
        <div class="space-y-6">
            <!-- Profile Information -->
            <div class="bg-white rounded-lg shadow-xs border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                    <div class="flex items-center">
                        <div class="mr-3 text-[#016DAE]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-base font-medium text-gray-800">Informasi Profil</h3>
                            <p class="text-xs text-gray-500 mt-1">Kelola informasi profil Anda</p>
                        </div>
                    </div>
                    <span class="text-xs text-gray-400">Terakhir diperbarui: 3 hari lalu</span>
                </div>
                <div class="p-6 pt-4">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Account Security -->
            <div class="bg-white rounded-lg shadow-xs border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                    <div class="flex items-center">
                        <div class="mr-3 text-[#00ADE5]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-base font-medium text-gray-800">Keamanan Akun</h3>
                            <p class="text-xs text-gray-500 mt-1">Perbarui kata sandi Anda</p>
                        </div>
                    </div>
                </div>
                <div class="p-6 pt-4">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account -->
            <div class="bg-white rounded-lg shadow-xs border border-red-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-red-100 bg-red-50 flex justify-between items-center">
                    <div class="flex items-center">
                        <div class="mr-3 text-[#8F181A]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-base font-medium text-[#8F181A]">Hapus Akun</h3>
                            <p class="text-xs text-red-500 mt-1">Tindakan ini tidak dapat dibatalkan</p>
                        </div>
                    </div>
                </div>
                <div class="p-6 pt-4 bg-red-50/50">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-blue-100 py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $document['title'] }}</h1>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Unduh dokumen resmi yang berisi informasi lengkap mengenai syarat dan ketentuan yang berlaku.
                </p>
            </div>

            <!-- Main Content Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <!-- Document Preview Section -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-8 py-12 text-white">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 bg-white/20 rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold mb-2">{{ $document['filename'] }}</h2>
                                <p class="text-blue-100 text-sm">Format: PDF • Ukuran: {{ $document['size'] }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-blue-100 text-sm">Terakhir diperbarui</p>
                            <p class="text-white font-semibold">{{ $document['updated_at'] }}</p>
                        </div>
                    </div>
                </div>

                <!-- Document Information -->
                <div class="px-8 py-8">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">Tentang Dokumen</h3>
                            <p class="text-gray-600 leading-relaxed mb-6">
                                {{ $document['description'] }}
                            </p>
                            
                            <div class="bg-blue-50 rounded-lg p-6 mb-6">
                                <h4 class="text-lg font-semibold text-blue-900 mb-3">Informasi Penting</h4>
                                <ul class="space-y-2 text-blue-800">
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-blue-600 mt-0.5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Dokumen ini bersifat resmi dan mengikat
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-blue-600 mt-0.5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Harap dibaca dengan seksama sebelum menggunakan
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-blue-600 mt-0.5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Untuk keperluan resmi ITSA
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">Detail Dokumen</h3>
                            <div class="space-y-4">
                                <div class="flex justify-between items-center py-3 border-b border-gray-200">
                                    <span class="text-gray-600">Nama File:</span>
                                    <span class="font-semibold text-gray-900">{{ $document['filename'] }}</span>
                                </div>
                                <div class="flex justify-between items-center py-3 border-b border-gray-200">
                                    <span class="text-gray-600">Ukuran File:</span>
                                    <span class="font-semibold text-gray-900">{{ $document['size'] }}</span>
                                </div>
                                <div class="flex justify-between items-center py-3 border-b border-gray-200">
                                    <span class="text-gray-600">Format:</span>
                                    <span class="font-semibold text-gray-900">PDF</span>
                                </div>
                                <div class="flex justify-between items-center py-3 border-b border-gray-200">
                                    <span class="text-gray-600">Terakhir Diperbarui:</span>
                                    <span class="font-semibold text-gray-900">{{ $document['updated_at'] }}</span>
                                </div>
                            </div>

                            <!-- Download Button -->
                            <div class="mt-8">
                                <a href="{{ route('download.file') }}" 
                                   class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold py-4 px-8 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center space-x-3">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <span>Unduh Dokumen</span>
                                </a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="mt-12 bg-white rounded-xl shadow-lg p-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Panduan Penggunaan</h3>
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-blue-600 font-bold text-xl">1</span>
                        </div>
                        <h4 class="font-semibold text-gray-900 mb-2">Unduh Dokumen</h4>
                        <p class="text-gray-600 text-sm">Klik tombol "Unduh Dokumen" untuk mengunduh file PDF</p>
                    </div>
                    <div class="text-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-blue-600 font-bold text-xl">2</span>
                        </div>
                        <h4 class="font-semibold text-gray-900 mb-2">Baca Dokumen</h4>
                        <p class="text-gray-600 text-sm">Buka file PDF yang telah diunduh dan baca dengan seksama</p>
                    </div>
                    <div class="text-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-blue-600 font-bold text-xl">3</span>
                        </div>
                        <h4 class="font-semibold text-gray-900 mb-2">Patuhi Ketentuan</h4>
                        <p class="text-gray-600 text-sm">Pastikan untuk mematuhi semua syarat dan ketentuan yang berlaku</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
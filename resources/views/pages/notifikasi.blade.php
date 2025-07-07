<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notifikasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Notifikasi Anda</h3>
                            <p class="text-sm text-gray-600">
                                {{ $unreadCount }} notifikasi belum dibaca
                            </p>
                        </div>
                        @if($unreadCount > 0)
                        <button onclick="markAllAsRead()" 
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                            Tandai Semua Dibaca
                        </button>
                        @endif
                    </div>

                    <div class="space-y-4">
                        @forelse($notifikasi as $item)
                        <div class="border rounded-lg p-4 {{ $item->is_read ? 'bg-gray-50' : 'bg-blue-50 border-blue-200' }}">
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <div class="flex items-center space-x-2">
                                        <h4 class="font-medium text-gray-900">
                                            {{ $item->judul }}
                                        </h4>
                                        @if(!$item->is_read)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            Baru
                                        </span>
                                        @endif
                                    </div>
                                    <p class="text-sm text-gray-600 mt-1">
                                        {{ $item->pesan }}
                                    </p>
                                    <div class="flex items-center space-x-4 mt-2">
                                        <span class="text-xs text-gray-500">
                                            {{ $item->created_at->diffForHumans() }}
                                        </span>
                                        @if($item->feedback)
                                        <a href="{{ route('notifikasi.show', $item->id) }}" 
                                           class="text-xs text-blue-600 hover:text-blue-800">
                                            Lihat Detail
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    @if($item->feedback)
                                    <div class="text-xs text-gray-500">
                                        <svg class="w-4 h-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                        </svg>
                                    </div>
                                    @endif
                                    @if(!$item->is_read)
                                    <button onclick="markAsRead({{ $item->id }})" 
                                            class="text-xs text-blue-600 hover:text-blue-800">
                                        Tandai Dibaca
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-8">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5-5-5h5v-12"></path>
                            </svg>
                            <p class="text-gray-500">Tidak ada notifikasi</p>
                        </div>
                        @endforelse
                    </div>

                    @if($notifikasi->hasPages())
                    <div class="mt-6">
                        {{ $notifikasi->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function markAsRead(id) {
            fetch(`/notifikasi/${id}/mark-read`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            });
        }

        function markAllAsRead() {
            fetch('/notifikasi/mark-all-read', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            });
        }
    </script>
    @endpush
</x-app-layout>
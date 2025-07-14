<x-app-layout>
<div class="py-12 bg-[#E0F7FE]">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-xl p-6">
                
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold text-gray-800">
                        Notifikasi
                    </h2>
                    @if($unreadCount > 0)
                        <button onclick="markAllAsRead()"
                            class="flex items-center gap-2 bg-gradient-to-r from-[#00ADE5] to-[#016DAE] text-white px-4 py-2 rounded-lg hover:opacity-90 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
                                 d="M5 13l4 4L19 7"/></svg>
                            Tandai Semua Dibaca
                        </button>
                    @endif
                </div>

                <p class="text-sm text-gray-500 mb-4">{{ $unreadCount }} notifikasi belum dibaca</p>

                <div class="space-y-4">
                    @forelse($notifikasi as $item)
                        <a href="{{ route('notifikasi.show', $item->id) }}"
                           class="block p-4 rounded-xl border transition-all duration-200
                                  {{ $item->is_read ? 'bg-white border-gray-200' : 'bg-blue-50 border-blue-200' }}
                                  hover:shadow hover:bg-blue-100">
                            <div class="flex justify-between items-start">
                                <div>
                                    <div class="flex items-center gap-2 mb-1">
                                        <h3 class="font-semibold text-gray-900 text-base">
                                            {{ $item->judul }}
                                        </h3>
                                        @if(!$item->is_read)
                                            <span class="text-xs bg-blue-100 text-blue-800 font-medium px-2 py-0.5 rounded-full">
                                                Baru
                                            </span>
                                        @endif
                                    </div>
                                    <p class="text-sm text-gray-700">
                                        {{ Str::limit($item->pesan, 100) }}
                                    </p>
                                </div>
                                <span class="text-xs text-gray-400 mt-1 whitespace-nowrap">
                                    {{ $item->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </a>
                    @empty
                        <div class="text-center py-10 text-gray-500">
<svg class="w-14 h-14 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
  <style>
    .bell-animation {
      animation: ring 2s ease-in-out infinite;
      transform-origin: 50% 4px;
    }
    @keyframes ring {
      0%, 50%, 100% { transform: rotate(0deg); }
      10%, 30% { transform: rotate(-10deg); }
      20%, 40% { transform: rotate(10deg); }
    }
  </style>
  <g class="bell-animation">
    <!-- Bell body -->
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
          d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
    <!-- Bell top -->
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
          d="M13.73 21a2 2 0 0 1-3.46 0"/>
  </g>
</svg>
                            Tidak ada notifikasi untuk ditampilkan.
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

    @push('scripts')
    <script>
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

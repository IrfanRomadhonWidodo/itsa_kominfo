<x-app-layout>
    <div class="container py-10">
        <h1 class="text-2xl font-bold text-center mb-6">{{ $title }}</h1>

        <div class="bg-white shadow rounded-lg p-6">
            <p class="text-gray-700 leading-relaxed">{{ $content }}</p>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('download.word') }}"
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                Download sebagai Word
            </a>
        </div>
    </div>
</x-app-layout>
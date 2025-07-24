<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: $persist(false) }">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <!-- ICON -->
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('logo_baru.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('logo_baru.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Sweet Alert 2 CDN -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
    </head>
    <body class="bg-[#E0F7FE] ">
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            <a href="https://wa.me/6285747055354" target="_blank"
            class="fixed bottom-8 right-8 z-50 bg-green-500 text-white w-14 h-14 flex items-center justify-center rounded-full shadow-lg transition duration-300"
            aria-label="Chat via WhatsApp">
                <i class="fab fa-whatsapp text-2xl"></i>
            </a>

            @include('layouts.footer')
        </div>
        @stack('scripts')
    </body>
</html>
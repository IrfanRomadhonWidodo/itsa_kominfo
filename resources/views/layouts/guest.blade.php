<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'ITSA') }}</title>
        
        <!-- Icon -->
        <link rel="icon" href="{{ asset('image/LOGO_BARU.png') }}" type="image/png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Tambahkan ini sebelum tag penutup </body> atau di bagian head -->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div>
            {{-- <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div> --}}

            <div>
                {{ $slot }}
            </div>
        </div>
    </body>
</html>

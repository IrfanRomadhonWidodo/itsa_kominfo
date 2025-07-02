<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: $persist(false) }">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Theme Script - Load immediately to prevent flash -->
        <script>
            (function() {
                const savedTheme = localStorage.getItem('theme') || 'system';
                const isDark = savedTheme === 'dark' || 
                              (savedTheme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches);
                
                if (isDark) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            })();
        </script>
    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
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
            <main class="py-12">
                {{ $slot }}
            </main>
        </div>

        <!-- Theme Switcher Script -->
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('themeSwitcher', () => ({
                    theme: localStorage.getItem('theme') || 'system',
                    
                    init() {
                        this.applyTheme();
                        
                        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
                            if (this.theme === 'system') {
                                this.applyTheme();
                            }
                        });
                    },
                    
                    setTheme(newTheme) {
                        this.theme = newTheme;
                        localStorage.setItem('theme', newTheme);
                        this.applyTheme();
                    },
                    
                    applyTheme() {
                        const isDark = this.theme === 'dark' || 
                                      (this.theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches);
                        
                        if (isDark) {
                            document.documentElement.classList.add('dark');
                        } else {
                            document.documentElement.classList.remove('dark');
                        }
                    }
                }));
            });
        </script>
    </body>
</html>
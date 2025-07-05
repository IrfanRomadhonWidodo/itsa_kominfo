<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}- Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .sidebar-collapsed {
            width: 80px;
        }
        .sidebar-expanded {
            width: 250px;
        }
        
        .sidebar-bg {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(248, 250, 252, 0.95) 100%);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #8F181A 0%, #B91C1C 50%, #EDBC19 100%);
            position: relative;
            overflow: hidden;
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #8F181A 0%, #EDBC19 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .nav-item {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            z-index: 10;
        }
        
        .nav-item:hover {
            transform: translateX(4px);
        }
        
        .nav-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: linear-gradient(135deg, #8F181A, #EDBC19);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }
        
        .nav-item:hover::before {
            transform: scaleY(1);
        }
        
        .tooltip {
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .sidebar-collapsed .nav-item:hover .tooltip {
            opacity: 1;
            visibility: visible;
        }
        
        .pulse-animation {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        .nav-container {
            height: calc(100vh - 120px);
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }
        
        .nav-scroll {
            flex: 1;
            overflow-y: auto;
            overflow-x: hidden;
        }
        
        .nav-footer {
            margin-top: auto;
            padding-top: 1rem;
            border-top: 1px solid rgba(143, 24, 26, 0.1);
        }
        
        .collapse-btn {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #8F181A 0%, #EDBC19 100%);
            border: none;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(143, 24, 26, 0.2);
        }
        
        .collapse-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 16px rgba(143, 24, 26, 0.3);
        }
        
        .collapse-btn svg {
            width: 14px;
            height: 14px;
            color: white;
            transition: transform 0.3s ease;
        }
        
        .collapse-btn.collapsed svg {
            transform: rotate(180deg);
        }
        
        .footer-item {
            background: linear-gradient(135deg, #8F181A 0%, #B91C1C 50%, #EDBC19 100%);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            box-shadow: 0 2px 8px rgba(143, 24, 26, 0.2);
        }
        
        .footer-item:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 16px rgba(143, 24, 26, 0.3);
        }
        
        .user-profile {
            background: linear-gradient(135deg, rgba(143, 24, 26, 0.1) 0%, rgba(237, 188, 25, 0.1) 100%);
            border: 1px solid rgba(143, 24, 26, 0.2);
            border-radius: 0.75rem;
            padding: 0.75rem;
            margin-bottom: 0.75rem;
            font-size: 0.875rem;
        }
        
        .user-avatar {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #8F181A 0%, #EDBC19 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.875rem;
            font-weight: 600;
            color: white;
        }
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        /* Hide scrollbars */
        .nav-container::-webkit-scrollbar,
        .nav-scroll::-webkit-scrollbar,
        main::-webkit-scrollbar {
            display: none;
        }
        
        .nav-container,
        .nav-scroll,
        main {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        
        /* Smaller navigation items */
        .nav-item {
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
        }
        
        .nav-item svg {
            width: 18px;
            height: 18px;
        }
        
        .nav-item.footer-nav {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
        }
        
        .nav-item.footer-nav svg {
            width: 16px;
            height: 16px;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gradient-to-br from-gray-50 via-red-50 to-yellow-50 min-h-screen">
    <div class="min-h-screen flex" x-data="{ sidebarCollapsed: false, mobileSidebarOpen: false }">
        <!-- Sidebar -->
        <div class="fixed inset-y-0 left-0 z-50 transition-all duration-300 ease-in-out" 
             :class="sidebarCollapsed ? 'sidebar-collapsed' : 'sidebar-expanded'">
            <div class="h-full sidebar-bg">
                <!-- Header -->
                <div class="relative flex items-center justify-between h-20 px-6 bg-gradient-to-r from-[#8F181A] to-[#EDBC19] rounded-bl-3xl overflow-hidden shadow-md">

                    <!-- Ornamen Latar -->
                    <div class="absolute inset-0 z-0">
                        <!-- Lingkaran besar kiri atas -->
                        <div class="absolute -top-10 -left-10 w-40 h-40 bg-white/10 rounded-full"></div>
                        <!-- Lingkaran sedang kanan tengah -->
                        <div class="absolute top-6 right-16 w-24 h-24 bg-white/10 rounded-full"></div>
                    </div>

                    <!-- Logo & Text ketika sidebar tidak collapsed -->
                    <div class="flex items-center space-x-3 relative z-10" x-show="!sidebarCollapsed" x-transition>
                        <img src="{{ asset('image/logo_banyumas.png') }}" alt="Logo Banyumas" class="w-12 h-12 rounded-xl shadow-lg ring-2 ring-white/20">
                        <div>
                            <h1 class="text-white text-xl font-bold drop-shadow">Admin Panel</h1>
                            <p class="text-white/80 text-sm">ITSA Dinkominfo</p>
                        </div>
                    </div>

                    <!-- Logo mini ketika sidebar collapsed -->
                    <div class="flex items-center justify-center relative z-10" x-show="sidebarCollapsed" x-transition>
                        <img src="{{ asset('image/logo_banyumas.png') }}" alt="Logo Banyumas" class="w-10 h-10 rounded-lg shadow-lg ring-2 ring-white/20">
                    </div>
                </div>

                <!-- Collapse Toggle Button -->
                <button @click="sidebarCollapsed = !sidebarCollapsed" 
                        class="collapse-btn absolute top-24 -right-2 z-20"
                        :class="sidebarCollapsed ? 'collapsed' : ''">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                
                <!-- Navigation Container -->
                <div class="nav-container px-4 mt-8">
                    <!-- Scrollable Navigation -->
                    <div class="nav-scroll">
                        <div class="space-y-2">
                        <!-- Dashboard -->
                        <a href="{{ route('admin.dashboard') }}" 
                        class="nav-item footer-nav flex items-center text-gray-700 rounded-lg transition-all duration-300 group relative
                                hover:bg-gradient-to-r hover:from-red-50 hover:to-yellow-50 hover:text-red-800
                                {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-red-50 to-yellow-50 text-red-800' : '' }}">
                            <div class="flex items-center justify-center w-4 h-4 mr-2">
                                <svg class="w-5 h-5 opacity-70 group-hover:opacity-100 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 9.75L12 3l9 6.75M4.5 10.5V20a1.5 1.5 0 001.5 1.5H9V15a1.5 1.5 0 011.5-1.5h3A1.5 1.5 0 0115 15v6.5h3a1.5 1.5 0 001.5-1.5v-9.5" />
                                </svg>
                            </div>
                            <span class="font-medium" x-show="!sidebarCollapsed" x-transition>{{ __('Dashboard') }}</span>
                            <div class="tooltip absolute left-16 bg-gray-900 text-white px-2 py-1 rounded-md text-sm whitespace-nowrap z-50">
                                {{ __('Dashboard') }}
                            </div>
                        </a>
                            <!-- Users Management -->
                            <a href="{{ route('admin.users.index') }}" 
                            class="nav-item footer-nav flex items-center text-gray-700 rounded-lg transition-all duration-300 group relative
                                    hover:bg-gradient-to-r hover:from-red-50 hover:to-yellow-50 hover:text-red-800
                                    {{ request()->routeIs('admin.users.*') ? 'bg-gradient-to-r from-red-50 to-yellow-50 text-red-800' : '' }}">
                                <div class="flex items-center justify-center w-4 h-4 mr-2">
                                    <svg class="w-5 h-5 opacity-70 group-hover:opacity-100 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                            d="M5.121 17.804A4 4 0 018 17h8a4 4 0 012.879 1.197
                                            M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <span class="font-medium" x-show="!sidebarCollapsed" x-transition>{{ __('Users') }}</span>
                                <div class="tooltip absolute left-16 bg-gray-900 text-white px-2 py-1 rounded-md text-sm whitespace-nowrap z-50">
                                    {{ __('Users Management') }}
                                </div>
                            </a>
                            <!-- Content Management -->
                            <a href="#" 
                               class="nav-item flex items-center text-gray-700 rounded-xl hover:bg-gradient-to-r hover:from-red-50 hover:to-yellow-50 hover:text-red-800 transition-all duration-300 group relative">
                                <div class="flex items-center justify-center w-5 h-5 mr-3">
                                    <svg class="opacity-70 group-hover:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <span class="font-medium" x-show="!sidebarCollapsed" x-transition>{{ __('Content') }}</span>
                                <div class="tooltip absolute left-16 bg-gray-900 text-white px-2 py-1 rounded-md text-sm whitespace-nowrap z-50">
                                    {{ __('Content Management') }}
                                </div>
                            </a>

                            <!-- Analytics -->
                            <a href="#" 
                               class="nav-item flex items-center text-gray-700 rounded-xl hover:bg-gradient-to-r hover:from-red-50 hover:to-yellow-50 hover:text-red-800 transition-all duration-300 group relative">
                                <div class="flex items-center justify-center w-5 h-5 mr-3">
                                    <svg class="opacity-70 group-hover:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                </div>
                                <span class="font-medium" x-show="!sidebarCollapsed" x-transition>{{ __('Analytics') }}</span>
                                <div class="tooltip absolute left-16 bg-gray-900 text-white px-2 py-1 rounded-md text-sm whitespace-nowrap z-50">
                                    {{ __('Analytics & Reports') }}
                                </div>
                            </a>

                            <!-- Settings -->
                            <a href="#" 
                               class="nav-item flex items-center text-gray-700 rounded-xl hover:bg-gradient-to-r hover:from-red-50 hover:to-yellow-50 hover:text-red-800 transition-all duration-300 group relative">
                                <div class="flex items-center justify-center w-5 h-5 mr-3">
                                    <svg class="opacity-70 group-hover:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <span class="font-medium" x-show="!sidebarCollapsed" x-transition>{{ __('Settings') }}</span>
                                <div class="tooltip absolute left-16 bg-gray-900 text-white px-2 py-1 rounded-md text-sm whitespace-nowrap z-50">
                                    {{ __('Settings') }}
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Navigation Footer -->
                    <div class="nav-footer">


                        <!-- Footer Navigation Items -->
                        <div class="space-y-1">

                            <!-- Back to Main Dashboard -->
                            <a href="{{ route('dashboard') }}" class="footer-item w-full justify-center px-3 py-2 text-sm" x-show="!sidebarCollapsed" x-transition>
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m0 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10M9 21h6"></path>
                                </svg>
                                <span class="font-medium">Back to Main</span>
                            </a>

                            <!-- Collapsed version -->
                            <a href="{{ route('dashboard') }}" 
                            class="nav-item footer-nav flex items-center justify-center text-white bg-gradient-to-r from-red-800 to-yellow-600 rounded-md hover:from-red-900 hover:to-yellow-700 transition-all duration-300 group relative px-2 py-2"
                            x-show="sidebarCollapsed" x-transition>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m0 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10M9 21h6"></path>
                                </svg>
                                <div class="tooltip absolute left-16 bg-gray-900 text-white px-2 py-1 rounded-md text-xs whitespace-nowrap z-50">
                                    Back to Main Dashboard
                                </div>
                            </a>

                            <!-- Logout -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="footer-item w-full justify-center px-3 py-2 text-sm">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    <span class="font-medium" x-show="!sidebarCollapsed" x-transition>{{ __('Logout') }}</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col transition-all duration-300 ease-in-out" 
             :class="sidebarCollapsed ? 'ml-10' : 'ml-[250px]'">
            <!-- Top Header -->
            <header class="bg-white/90 backdrop-blur border-b border-gray-200 sticky top-0 z-30 shadow-sm">
                <div class="flex items-center justify-end px-8 py-4 space-x-6">
                    
                    <!-- Notifikasi (Lonceng sempurna) -->
                    <a href="#" class="relative text-gray-600 hover:text-red-700 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-5-5.917V5a1 1 0 10-2 0v.083A6.002 6.002 0 006 11v3.159c0 .538-.214 1.055-.595 1.437L4 17h5m6 0v1a3 3 0 11-6 0v-1h6z" />
                        </svg>
                    </a>



                    <div class="flex items-center space-x-3 transition-all duration-300">
                        <div class="w-9 h-9 bg-gradient-to-r from-[#8F181A] to-[#EDBC19] rounded-full flex items-center justify-center text-white font-semibold text-sm shadow-md">
                            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-800 truncate text-left">{{ auth()->user()->name ?? 'Admin' }}</p>
                            <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email ?? 'admin@example.com' }}</p>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto bg-transparent">
                <div class="p-8">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</body>
</html>
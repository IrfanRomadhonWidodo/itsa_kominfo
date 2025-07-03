<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow-sm">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
                        <img src="{{ asset('image/logo_banyumas.png') }}" alt="Logo Banyumas" class="h-12 w-12 object-contain">
                        <div class="flex flex-col leading-tight">
                            <span class="text-base font-bold text-[#016DAE] tracking-wide">DINKOMINFO</span>
                            <span class="text-xs text-[#00ADE5] font-semibold -mt-1">KAB. BANYUMAS</span>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links - Only show when authenticated -->
                {{-- @auth
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                                class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out focus:outline-none
                                       {{ request()->routeIs('dashboard') 
                                          ? 'border-[#00ADE5] text-[#016DAE] focus:border-[#016DAE]' 
                                          : 'border-transparent text-gray-500 hover:text-[#016DAE] hover:border-[#00ADE5] focus:text-[#016DAE] focus:border-[#00ADE5]' }}">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                @endauth --}}
            </div>

            <!-- Right Side Of Navbar -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                <!-- Authenticated User Menu -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-[#016DAE] focus:outline-none transition ease-in-out duration-150">
                            <div class="flex items-center space-x-3">
                                <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim(Auth::user()->email))) }}?s=40&d=mp&r=g" 
                                     alt="{{ Auth::user()->name }}" 
                                     class="h-8 w-8 rounded-full border border-[#00ADE5]/30">
                                <div class="font-medium">{{ Auth::user()->name }}</div>
                            </div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="hover:bg-[#00ADE5]/10 hover:text-[#016DAE]">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="hover:bg-red-50 hover:text-red-600">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @else
                <!-- Guest Links -->
                <div class="flex space-x-3">
                    <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md border border-[#00ADE5] text-[#016DAE] hover:bg-[#00ADE5] hover:text-white transition ease-in-out duration-150">
                        Login
                    </a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md bg-[#00ADE5] text-white hover:bg-[#016DAE] transition ease-in-out duration-150">
                        Register
                    </a>
                    @endif
                </div>
                @endauth
            </div>

            <!-- Hamburger Menu -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-[#016DAE] hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-[#016DAE] transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        @auth
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                                   class="{{ request()->routeIs('dashboard') 
                                      ? 'bg-[#00ADE5]/10 border-[#00ADE5] text-[#016DAE] border-l-4 bg-indigo-50 text-indigo-700' 
                                      : 'border-transparent text-gray-600 hover:text-[#016DAE] hover:bg-[#00ADE5]/10 hover:border-[#00ADE5]' }} block w-full ps-3 pe-4 py-2 border-l-4 text-start text-base font-medium transition duration-150 ease-in-out">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4 flex items-center space-x-3">
                <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim(Auth::user()->email))) }}?s=48&d=mp&r=g" 
                     alt="{{ Auth::user()->name }}" 
                     class="h-12 w-12 rounded-full border-2 border-[#00ADE5]">
                <div>
                    <div class="font-semibold text-base text-[#016DAE]">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="hover:bg-[#00ADE5]/10 hover:text-[#016DAE]">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="hover:bg-red-50 hover:text-red-600">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @else
        <!-- Guest Mobile Links -->
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('login') }}" class="block w-full ps-3 pe-4 py-3 border-l-4 border-transparent text-start text-base font-medium text-gray-600 hover:text-[#016DAE] hover:bg-[#00ADE5]/10 hover:border-[#00ADE5] transition duration-150 ease-in-out">
                Login
            </a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="block w-full ps-3 pe-4 py-3 border-l-4 border-transparent text-start text-base font-medium text-gray-600 hover:text-[#016DAE] hover:bg-[#00ADE5]/10 hover:border-[#00ADE5] transition duration-150 ease-in-out">
                Register
            </a>
            @endif
        </div>
        @endauth
    </div>
</nav>
<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-slate-800 to-[#016DAE] relative overflow-hidden">
        <!-- Decorative background elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-20 -left-20 w-40 h-40 bg-[#00ADE5] rounded-full opacity-20"></div>
            <div class="absolute -bottom-32 -right-32 w-64 h-64 bg-gray-300 rounded-full opacity-10"></div>
            <div class="absolute top-1/2 -left-16 w-32 h-32 bg-[#016DAE] rounded-full opacity-15"></div>
        </div>

        <div class="relative z-10 flex bg-white/95 backdrop-blur-sm overflow-hidden min-h-screen">
            <!-- Left Panel - Logo & Branding -->
            <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-[#016DAE] to-[#00ADE5] p-12 flex-col justify-center items-center text-white relative">
                <!-- Floating elements -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute top-1/4 left-1/4 w-16 h-16 bg-white/10 rounded-full animate-float"></div>
                <div class="absolute bottom-1/3 right-1/4 w-12 h-12 bg-white/5 rounded-full animate-float-slow"></div>
                <div class="absolute top-2/3 left-1/6 w-20 h-20 bg-white/5 rounded-full animate-float delay-1000"></div>
            </div>


        <div class="text-center z-10 animate-fadeInUp">
                    <!-- Logo -->
                    <div class="mb-8">
                        <div class="w-32 h-32 bg-white/20 rounded-full mx-auto mb-6 flex items-center justify-center shadow-xl backdrop-blur-sm">
                            <img src="{{ asset('image/logo_banyumas.png') }}" alt="Logo Banyumas" class="w-24 h-24 object-contain" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div class="hidden w-24 h-24 bg-[#EDBC19] rounded-full items-center justify-center text-white text-2xl font-bold">
                                🏛️
                            </div>
                        </div>
                    </div>

                    <!-- Brand Text -->
                    <h1 class="text-4xl font-bold mb-4 drop-shadow-lg">
                        Dinkominfo
                    </h1>
                    <p class="text-2xl font-light opacity-90">
                        Kab. Banyumas
                    </p>
                    
                    <!-- Subtitle -->
                    <div class="mt-8 p-4 bg-white/10 rounded-lg backdrop-blur-sm">
                        <p class="text-sm opacity-80">
                            Information Technology Security Assessment
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right Panel - Login Form -->
            <div class="w-full lg:w-1/2 p-8 lg:p-12 flex flex-col justify-center">
                <!-- Mobile Logo -->
                <div class="lg:hidden text-center mb-8">
                    <div class="w-20 h-20 bg-gray-300 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <img src="{{ asset('image/logo_banyumas.png') }}" alt="Logo Banyumas" class="w-16 h-16 object-contain" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="hidden w-16 h-16 bg-[#016DAE] rounded-full items-center justify-center text-white text-lg">
                            🏛️
                        </div>
                    </div>
                    <h2 class="text-2xl font-bold text-slate-800">Dinkominfo Kab. Banyumas</h2>
                </div>

                <!-- Login Header -->
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-slate-800 mb-2">Login</h2>
                    <p class="text-gray-600">Log in to access all of our content</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-800 mb-2">
                            E-mail
                        </label>
                        <input 
                            id="email" 
                            name="email" 
                            type="email" 
                            value="{{ old('email') }}" 
                            required 
                            autofocus 
                            autocomplete="username"
                            placeholder="example@gmail.com"
                            class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-300 rounded-lg text-slate-800 placeholder-gray-500 focus:outline-none focus:border-[#016DAE] focus:bg-white focus:ring-4 focus:ring-[#016DAE]/10 transition-all duration-300"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600 text-sm" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-800 mb-2">
                            Password
                        </label>
                        <input 
                            id="password" 
                            name="password" 
                            type="password" 
                            required 
                            autocomplete="current-password"
                            placeholder="••••••"
                            class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-300 rounded-lg text-slate-800 placeholder-gray-500 focus:outline-none focus:border-[#016DAE] focus:bg-white focus:ring-4 focus:ring-[#016DAE]/10 transition-all duration-300"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 text-sm" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input 
                            id="remember_me" 
                            name="remember" 
                            type="checkbox" 
                            class="w-4 h-4 text-[#016DAE] bg-gray-100 border-gray-300 rounded focus:ring-[#016DAE] focus:ring-2"
                        >
                        <label for="remember_me" class="ml-3 text-sm text-gray-600">
                            {{ __('Remember me') }}
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button 
                            type="submit" 
                            class="w-full bg-gradient-to-r from-[#016DAE] to-[#00ADE5] hover:from-[#00ADE5] hover:to-[#016DAE] text-white font-semibold py-3 px-6 rounded-lg transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-[#016DAE]/30"
                        >
                            Sign In.
                        </button>
                    </div>

                    <!-- Forgot Password -->
                    <div class="text-center">
                        @if (Route::has('password.request'))
                            <a 
                                href="{{ route('password.request') }}" 
                                class="text-sm text-gray-600 hover:text-[#016DAE] transition-colors duration-300"
                            >
                                Forgot password?
                            </a>
                        @endif
                    </div>

                    <!-- Register Link -->
                    <div class="text-center">
                        @if (Route::has('register'))
                            <p class="text-sm text-gray-600">
                                Don't have an account? 
                                <a 
                                    href="{{ route('register') }}" 
                                    class="text-[#016DAE] hover:text-[#00ADE5] font-medium transition-colors duration-300"
                                >
                                    Sign up here
                                </a>
                            </p>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

<style>
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }

    @keyframes fadeInUp {
        0% { opacity: 0; transform: translateY(30px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .animate-float {
        animation: float 6s ease-in-out infinite;
    }

    .animate-float-slow {
        animation: float 10s ease-in-out infinite;
    }

    .animate-fadeInUp {
        animation: fadeInUp 1s ease-out forwards;
    }

    .delay-1000 {
        animation-delay: 1s;
    }
</style>

</x-guest-layout>
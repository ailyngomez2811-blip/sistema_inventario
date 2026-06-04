<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-8 text-center">
            <h2 class="text-2xl md:text-3xl font-extrabold text-slate-800 font-heading tracking-tight">Bienvenido de nuevo</h2>
            <p class="text-slate-500 text-sm md:text-base mt-2">Ingresa tus credenciales para acceder a tu cuenta</p>
        </div>

        <!-- Email Address -->
        <div class="mb-5">
            <label for="email" class="block text-sm font-semibold text-slate-700 mb-1.5">Correo Electrónico</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="pl-10 block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:bg-white focus:border-agro-500 focus:ring focus:ring-agro-500/20 transition-all text-slate-800 py-2.5" placeholder="tu@correo.com">
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
        </div>

        <!-- Password -->
        <div class="mb-5">
            <label for="password" class="block text-sm font-semibold text-slate-700 mb-1.5">Contraseña</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
                <input id="password" type="password" name="password" required autocomplete="current-password" class="pl-10 block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:bg-white focus:border-agro-500 focus:ring focus:ring-agro-500/20 transition-all text-slate-800 py-2.5" placeholder="••••••••">
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between mb-8">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <div class="relative flex items-center justify-center">
                    <input id="remember_me" type="checkbox" class="peer appearance-none w-5 h-5 rounded border-slate-300 text-agro-600 bg-slate-50 checked:bg-agro-600 checked:border-agro-600 shadow-sm focus:ring-agro-500/50 focus:ring-offset-0 transition-all cursor-pointer" name="remember">
                    <svg class="absolute w-3.5 h-3.5 text-white pointer-events-none opacity-0 peer-checked:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <span class="ms-2 text-sm font-medium text-slate-600 group-hover:text-slate-800 transition-colors">Recordarme</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm font-semibold text-agro-600 hover:text-agro-500 transition-colors" href="{{ route('password.request') }}">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif
        </div>

        <div class="mt-6">
            <button type="submit" class="w-full flex justify-center items-center gap-2 py-3 px-4 border border-transparent rounded-xl shadow-lg text-lg font-bold text-white bg-agro-500 hover:bg-agro-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-agro-500 transition-all shadow-[0_0_15px_rgba(59,163,118,0.3)] hover:shadow-[0_0_20px_rgba(59,163,118,0.5)] hover:-translate-y-0.5">
                Ingresar al Sistema
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </button>
        </div>
        
        @if (Route::has('register'))
        <div class="mt-6 text-center">
            <p class="text-slate-500 text-sm">¿No tienes una cuenta? <a href="{{ route('register') }}" class="font-semibold text-agro-600 hover:text-agro-500 transition-colors">Regístrate aquí</a></p>
        </div>
        @endif
    </form>
</x-guest-layout>
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-8 text-center">
            <h2 class="text-2xl md:text-3xl font-extrabold text-slate-800 font-heading tracking-tight">Crea tu cuenta</h2>
            <p class="text-slate-500 text-sm md:text-base mt-2">Únete a AgroGestión y optimiza tu negocio agrícola</p>
        </div>

        <!-- Name -->
        <div class="mb-5">
            <label for="name" class="block text-sm font-semibold text-slate-700 mb-1.5">Nombre Completo</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="pl-10 block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:bg-white focus:border-agro-500 focus:ring focus:ring-agro-500/20 transition-all text-slate-800 py-2.5" placeholder="Juan Pérez">
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-sm" />
        </div>

        <!-- Email Address -->
        <div class="mb-5">
            <label for="email" class="block text-sm font-semibold text-slate-700 mb-1.5">Correo Electrónico</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" class="pl-10 block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:bg-white focus:border-agro-500 focus:ring focus:ring-agro-500/20 transition-all text-slate-800 py-2.5" placeholder="tu@correo.com">
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
                <input id="password" type="password" name="password" required autocomplete="new-password" class="pl-10 block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:bg-white focus:border-agro-500 focus:ring focus:ring-agro-500/20 transition-all text-slate-800 py-2.5" placeholder="••••••••">
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-8">
            <label for="password_confirmation" class="block text-sm font-semibold text-slate-700 mb-1.5">Confirmar Contraseña</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="pl-10 block w-full rounded-xl border-slate-200 bg-slate-50 shadow-sm focus:bg-white focus:border-agro-500 focus:ring focus:ring-agro-500/20 transition-all text-slate-800 py-2.5" placeholder="••••••••">
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />
        </div>

        <div class="mt-6">
            <button type="submit" class="w-full flex justify-center items-center gap-2 py-3 px-4 border border-transparent rounded-xl shadow-lg text-lg font-bold text-white bg-agro-500 hover:bg-agro-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-agro-500 transition-all shadow-[0_0_15px_rgba(59,163,118,0.3)] hover:shadow-[0_0_20px_rgba(59,163,118,0.5)] hover:-translate-y-0.5">
                Crear Cuenta
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </button>
        </div>
        
        <div class="mt-6 text-center">
            <p class="text-slate-500 text-sm">¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="font-semibold text-agro-600 hover:text-agro-500 transition-colors">Ingresa aquí</a></p>
        </div>
    </form>
</x-guest-layout>

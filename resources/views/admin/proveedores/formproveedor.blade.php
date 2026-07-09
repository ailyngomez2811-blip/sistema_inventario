@extends('layouts.sidebaradmin')

@section('tituloPagina', 'Registrar Proveedor')

@section('content')
<!-- Tailwind CDN & Configuration -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    sans: ['Inter', 'sans-serif'],
                    heading: ['Outfit', 'sans-serif'],
                },
                colors: {
                    agro: {
                        50:  '#f2fbf5',
                        100: '#e1f6e8',
                        200: '#c4ebd4',
                        300: '#96d8b6',
                        400: '#60bc90',
                        500: '#3ba376',
                        600: '#2b825d',
                        700: '#25684d',
                        800: '#20533f',
                        900: '#1b4435',
                        950: '#0e261d',
                    }
                }
            }
        }
    }
</script>
<link href="https://fonts.googleapis.com/css?family=inter:400,500,600,700|outfit:500,600,700,800" rel="stylesheet" />

<div class="p-6 md:p-8 bg-slate-50 min-h-[calc(100vh-57px)] font-sans antialiased">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight font-heading">Gestión de Proveedores</h1>
            <p class="text-slate-500 mt-1">Registra y administra los proveedores de la plataforma.</p>
        </div>
        <div>
            <button onclick="openModal()" class="inline-flex items-center justify-center gap-2 bg-agro-500 hover:bg-agro-600 text-white font-bold px-5 py-3 rounded-xl shadow-[0_4px_14px_rgba(59,163,118,0.3)] hover:shadow-[0_6px_20px_rgba(59,163,118,0.5)] transition-all transform hover:-translate-y-0.5 active:translate-y-0 duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                </svg>
                Registrar Proveedor
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div id="proveedorModal" class="fixed inset-0 z-[9999] hidden items-center justify-center transition-all duration-300">
        <!-- Backdrop -->
        <div onclick="closeModal()" class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity duration-300"></div>

        <!-- Card -->
        <div class="relative bg-white w-full max-w-lg mx-4 rounded-2xl border border-slate-100 shadow-2xl overflow-hidden transform scale-95 opacity-0 transition-all duration-300" id="modalCard">
            <!-- Header -->
            <div class="flex items-center justify-between p-6 border-b border-slate-100">
                <div>
                    <h3 class="text-xl font-extrabold text-slate-900 font-heading tracking-tight">Registrar Proveedor</h3>
                    <p class="text-slate-500 text-xs mt-1">Completa el formulario para registrar un nuevo proveedor.</p>
                </div>
                <button onclick="closeModal()" class="p-2 text-slate-400 hover:text-slate-600 hover:bg-slate-50 rounded-xl transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('proveedores.store') }}" class="p-6 max-h-[75vh] overflow-y-auto">
                @csrf

                <!-- Nombre -->
                <div class="mb-4">
                    <label for="nombre" class="block text-sm font-semibold text-slate-700 mb-1.5">Nombre del Proveedor</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <input id="nombre" type="text" name="nombre" value="{{ old('nombre') }}" required
                               class="pl-10 block w-full rounded-xl border border-slate-200 bg-slate-50 shadow-sm focus:bg-white focus:border-agro-500 focus:ring focus:ring-agro-500/20 transition-all text-slate-800 py-2.5 text-sm"
                               placeholder="Empresa S.A.S">
                    </div>
                    <x-input-error :messages="$errors->get('nombre')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- NIT / Documento -->
                <div class="mb-4">
                    <label for="nit_documento" class="block text-sm font-semibold text-slate-700 mb-1.5">NIT / Documento</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <input id="nit_documento" type="text" name="nit_documento" value="{{ old('nit_documento') }}"
                               class="pl-10 block w-full rounded-xl border border-slate-200 bg-slate-50 shadow-sm focus:bg-white focus:border-agro-500 focus:ring focus:ring-agro-500/20 transition-all text-slate-800 py-2.5 text-sm"
                               placeholder="900123456-7">
                    </div>
                    <x-input-error :messages="$errors->get('nit_documento')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Teléfono -->
                <div class="mb-4">
                    <label for="telefono" class="block text-sm font-semibold text-slate-700 mb-1.5">Teléfono</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <input id="telefono" type="text" name="telefono" value="{{ old('telefono') }}"
                               class="pl-10 block w-full rounded-xl border border-slate-200 bg-slate-50 shadow-sm focus:bg-white focus:border-agro-500 focus:ring focus:ring-agro-500/20 transition-all text-slate-800 py-2.5 text-sm"
                               placeholder="310 000 0000">
                    </div>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email_prov" class="block text-sm font-semibold text-slate-700 mb-1.5">Correo Electrónico</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <input id="email_prov" type="email" name="email" value="{{ old('email') }}"
                               class="pl-10 block w-full rounded-xl border border-slate-200 bg-slate-50 shadow-sm focus:bg-white focus:border-agro-500 focus:ring focus:ring-agro-500/20 transition-all text-slate-800 py-2.5 text-sm"
                               placeholder="proveedor@empresa.com">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Dirección -->
                <div class="mb-4">
                    <label for="direccion" class="block text-sm font-semibold text-slate-700 mb-1.5">Dirección</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <input id="direccion" type="text" name="direccion" value="{{ old('direccion') }}"
                               class="pl-10 block w-full rounded-xl border border-slate-200 bg-slate-50 shadow-sm focus:bg-white focus:border-agro-500 focus:ring focus:ring-agro-500/20 transition-all text-slate-800 py-2.5 text-sm"
                               placeholder="Calle 123 # 45-67">
                    </div>
                </div>

                <!-- Contacto -->
                <div class="mb-6">
                    <label for="contacto" class="block text-sm font-semibold text-slate-700 mb-1.5">Persona de Contacto</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <input id="contacto" type="text" name="contacto" value="{{ old('contacto') }}"
                               class="pl-10 block w-full rounded-xl border border-slate-200 bg-slate-50 shadow-sm focus:bg-white focus:border-agro-500 focus:ring focus:ring-agro-500/20 transition-all text-slate-800 py-2.5 text-sm"
                               placeholder="Juan Pérez">
                    </div>
                </div>

                <!-- Botones -->
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                    <button type="button" onclick="closeModal()"
                            class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 font-semibold text-sm transition-all">
                        Cancelar
                    </button>
                    <button type="submit"
                            class="flex items-center gap-2 px-5 py-2.5 rounded-xl bg-agro-500 hover:bg-agro-600 text-white font-semibold text-sm transition-all shadow-[0_4px_12px_rgba(59,163,118,0.25)] hover:shadow-[0_6px_16px_rgba(59,163,118,0.4)]">
                        Guardar Proveedor
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script Modal -->
    <script>
        function openModal() {
            const modal = document.getElementById('proveedorModal');
            const card  = document.getElementById('modalCard');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => {
                card.classList.remove('scale-95', 'opacity-0');
                card.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function closeModal() {
            const modal = document.getElementById('proveedorModal');
            const card  = document.getElementById('modalCard');
            card.classList.remove('scale-100', 'opacity-100');
            card.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }, 300);
        }
    </script>

    <!-- Abrir modal si hay errores de validación -->
    @if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', () => openModal());
    </script>
    @endif

</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: '¡Éxito!',
        text: '{{ session('success') }}',
        confirmButtonColor: '#3ba376',
        confirmButtonText: 'Aceptar',
        timer: 3000,
        timerProgressBar: true,
    });
</script>
@endif

@endsection

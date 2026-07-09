@extends('layouts.sidebaradmin')

@section('tituloPagina', 'Listado de Proveedores')

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
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight font-heading">Listado de Proveedores</h1>
            <p class="text-slate-500 mt-1">Consulta y administra todos los proveedores registrados.</p>
        </div>
        <div class="flex items-center gap-2 text-sm text-slate-500 bg-white border border-slate-200 rounded-xl px-4 py-2 shadow-sm">
            <svg class="w-4 h-4 text-agro-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
            </svg>
            <span class="font-semibold text-slate-700">{{ $proveedores->count() }}</span> proveedores en total
        </div>
    </div>

    {{-- SweetAlert mensajes de sesión --}}

    <!-- Tabla -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">

        <!-- Cabecera card -->
        <div class="px-6 py-4 border-b border-slate-100 flex items-center gap-2">
            <svg class="w-5 h-5 text-agro-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
            </svg>
            <h2 class="font-bold text-slate-800 font-heading tracking-tight">Proveedores registrados</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100 text-left">
                        <th class="px-6 py-3.5 font-semibold text-slate-500 uppercase tracking-wider text-xs">#</th>
                        <th class="px-6 py-3.5 font-semibold text-slate-500 uppercase tracking-wider text-xs">Proveedor</th>
                        <th class="px-6 py-3.5 font-semibold text-slate-500 uppercase tracking-wider text-xs">NIT / Doc.</th>
                        <th class="px-6 py-3.5 font-semibold text-slate-500 uppercase tracking-wider text-xs">Email</th>
                        <th class="px-6 py-3.5 font-semibold text-slate-500 uppercase tracking-wider text-xs">Contacto</th>
                        <th class="px-6 py-3.5 font-semibold text-slate-500 uppercase tracking-wider text-xs">Estado</th>
                        <th class="px-6 py-3.5 font-semibold text-slate-500 uppercase tracking-wider text-xs text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse ($proveedores as $proveedor)
                        <tr class="hover:bg-slate-50/70 transition-colors duration-150">

                            <!-- ID -->
                            <td class="px-6 py-4 text-slate-400 font-mono text-xs">
                                #{{ $proveedor->id }}
                            </td>

                            <!-- Nombre con avatar -->
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-full bg-agro-100 flex items-center justify-center flex-shrink-0 shadow-sm">
                                        <span class="text-agro-700 font-bold text-sm">
                                            {{ strtoupper(substr($proveedor->nombre, 0, 1)) }}
                                        </span>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-slate-800">{{ $proveedor->nombre }}</p>
                                        <p class="text-xs text-slate-400">{{ $proveedor->telefono ?? '—' }}</p>
                                    </div>
                                </div>
                            </td>

                            <!-- NIT -->
                            <td class="px-6 py-4 text-slate-600 font-mono text-xs">
                                {{ $proveedor->nit_documento ?? '—' }}
                            </td>

                            <!-- Email -->
                            <td class="px-6 py-4 text-slate-600">
                                {{ $proveedor->email ?? '—' }}
                            </td>

                            <!-- Contacto -->
                            <td class="px-6 py-4 text-slate-600">
                                {{ $proveedor->contacto ?? '—' }}
                            </td>

                            <!-- Estado Toggle -->
                            <td class="px-6 py-4">
                                <form action="{{ route('proveedores.toggle', $proveedor->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                            title="{{ $proveedor->estado === 'activo' ? 'Desactivar proveedor' : 'Activar proveedor' }}"
                                            class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors duration-300 focus:outline-none
                                                   {{ $proveedor->estado === 'activo' ? 'bg-agro-500' : 'bg-slate-300' }}">
                                        <span class="inline-block h-4 w-4 transform rounded-full bg-white shadow transition-transform duration-300
                                                     {{ $proveedor->estado === 'activo' ? 'translate-x-6' : 'translate-x-1' }}">
                                        </span>
                                    </button>
                                </form>
                            </td>

                            <!-- Acciones -->
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <!-- Editar -->
                                    <a href="{{ route('proveedores.edit', $proveedor->id) }}"
                                       title="Editar"
                                       class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-amber-50 hover:bg-amber-100 text-amber-600 border border-amber-100 transition-all duration-150">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>

                                    <!-- Eliminar -->
                                    <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST"
                                          onsubmit="return confirm('¿Estás seguro de eliminar a {{ $proveedor->nombre }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                title="Eliminar"
                                                class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-red-50 hover:bg-red-100 text-red-500 border border-red-100 transition-all duration-150">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <div class="w-14 h-14 rounded-full bg-slate-100 flex items-center justify-center">
                                        <svg class="w-7 h-7 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                        </svg>
                                    </div>
                                    <p class="text-slate-500 font-medium">No hay proveedores registrados.</p>
                                    <a href="{{ route('proveedores.create') }}"
                                       class="text-agro-600 hover:text-agro-700 text-sm font-semibold underline underline-offset-2">
                                        Registrar el primero
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- SweetAlert2 CDN -->
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

@if (session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: '¡Error!',
        text: '{{ session('error') }}',
        confirmButtonColor: '#ef4444',
        confirmButtonText: 'Cerrar'
    });
</script>
@endif

@endsection

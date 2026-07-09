@extends('layouts.sidebaradmin')

@section('tituloPagina', 'Listado de Usuarios')

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
                        50: '#f2fbf5',
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
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight font-heading">Listado de Usuarios</h1>
            <p class="text-slate-500 mt-1">Consulta y administra todos los usuarios registrados en la plataforma.</p>
        </div>
        <div class="flex items-center gap-2 text-sm text-slate-500 bg-white border border-slate-200 rounded-xl px-4 py-2 shadow-sm">
            <svg class="w-4 h-4 text-agro-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span class="font-semibold text-slate-700">{{ $usuarios->count() }}</span> usuarios en total
        </div>
    </div>

    {{-- SweetAlert mensajes de sesión --}}

    <!-- Tabla -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">

        <!-- Cabecera de la card -->
        <div class="px-6 py-4 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-agro-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                </svg>
                <h2 class="font-bold text-slate-800 font-heading tracking-tight">Usuarios registrados</h2>
            </div>
            <!-- Contenedor para reubicar el buscador -->
            <div id="contenedorBuscadorUsuarios" class="flex-shrink-0"></div>
        </div>

        <div class="overflow-x-auto p-4">
            <table id="tablaUsuarios" class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100 text-left">
                        <th class="px-6 py-3.5 font-semibold text-slate-500 uppercase tracking-wider text-xs">#</th>
                        <th class="px-6 py-3.5 font-semibold text-slate-500 uppercase tracking-wider text-xs">Usuario</th>
                        <th class="px-6 py-3.5 font-semibold text-slate-500 uppercase tracking-wider text-xs">Email</th>
                        <th class="px-6 py-3.5 font-semibold text-slate-500 uppercase tracking-wider text-xs">Rol</th>
                        <th class="px-6 py-3.5 font-semibold text-slate-500 uppercase tracking-wider text-xs">Estado</th>
                        <th class="px-6 py-3.5 font-semibold text-slate-500 uppercase tracking-wider text-xs text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse ($usuarios as $usuario)
                    <tr class="hover:bg-slate-50/70 transition-colors duration-150 group">
                        <!-- ID -->
                        <td class="px-6 py-4 text-slate-400 font-mono text-xs">
                            #{{ $usuario->id }}
                        </td>

                        <!-- Nombre con avatar -->
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-agro-100 flex items-center justify-center flex-shrink-0 shadow-sm">
                                    <span class="text-agro-700 font-bold text-sm">
                                        {{ strtoupper(substr($usuario->name, 0, 1)) }}
                                    </span>
                                </div>
                                <div>
                                    <p class="font-semibold text-slate-800">{{ $usuario->name }}</p>
                                    <p class="text-xs text-slate-400">ID {{ $usuario->id }}</p>
                                </div>
                            </div>
                        </td>

                        <!-- Email -->
                        <td class="px-6 py-4 text-slate-600">
                            {{ $usuario->email }}
                        </td>

                        <!-- Rol -->
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-agro-50 text-agro-700 text-xs font-semibold border border-agro-100">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                {{ $usuario->role->nombre ?? 'Sin rol' }}
                            </span>
                        </td>

                        <!-- Estado Toggle -->
                        <td class="px-6 py-4">
                            <form action="{{ route('usuarios.toggle', $usuario->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                    title="{{ ($usuario->estado ?? '') === 'activo' ? 'Desactivar usuario' : 'Activar usuario' }}"
                                    class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors duration-300 focus:outline-none
                                                   {{ ($usuario->estado ?? '') === 'activo' ? 'bg-agro-500' : 'bg-slate-300' }}">
                                    <span class="inline-block h-4 w-4 transform rounded-full bg-white shadow transition-transform duration-300
                                                     {{ ($usuario->estado ?? '') === 'activo' ? 'translate-x-6' : 'translate-x-1' }}">
                                    </span>
                                </button>
                            </form>
                        </td>

                        <!-- Acciones -->
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                <!-- Editar -->
                                <button onclick="editarUsuario({{ $usuario->id }})"
                                    title="Editar"
                                    class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-amber-50 hover:bg-amber-100 text-amber-600 border border-amber-100 transition-all duration-150">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>

                                <!-- Eliminar -->
                                <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST"
                                    class="formulario-eliminar" data-name="{{ $usuario->name }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        title="Eliminar"
                                        class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-red-50 hover:bg-red-100 text-red-500 border border-red-100 transition-all duration-150">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
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
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <p class="text-slate-500 font-medium">No hay usuarios registrados.</p>
                                <a href="{{ route('usuarios.create') }}"
                                    class="text-agro-600 hover:text-agro-700 text-sm font-semibold underline underline-offset-2">
                                    Crear el primero
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

<!-- Modal de Edición de Usuario -->
<div id="editUserModal" class="fixed inset-0 z-[9999] hidden items-center justify-center transition-all duration-300">
    <!-- Backdrop Blur Overlay -->
    <div onclick="closeEditModal()" class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity duration-300"></div>

    <!-- Modal Card Content -->
    <div class="relative bg-white w-full max-w-lg mx-4 rounded-2xl border border-slate-100 shadow-2xl overflow-hidden transform scale-95 opacity-0 transition-all duration-300" id="editModalCard">
        <!-- Modal Header -->
        <div class="flex items-center justify-between p-6 border-b border-slate-100">
            <div>
                <h3 class="text-xl font-extrabold text-slate-900 font-heading tracking-tight">Editar Usuario</h3>
                <p class="text-slate-500 text-xs mt-1">Modifica los detalles del usuario seleccionado.</p>
            </div>
            <button onclick="closeEditModal()" class="p-2 text-slate-400 hover:text-slate-600 hover:bg-slate-50 rounded-xl transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Modal Body (Form) -->
        <form id="editUserForm" method="POST" action="" class="p-6 max-h-[75vh] overflow-y-auto">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mb-4">
                <label for="edit_name" class="block text-sm font-semibold text-slate-700 mb-1.5">Nombre Completo</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <input id="edit_name" type="text" name="name" required class="pl-10 block w-full rounded-xl border border-slate-200 bg-slate-50 shadow-sm focus:bg-white focus:border-agro-500 focus:ring focus:ring-agro-500/20 transition-all text-slate-800 py-2.5 text-sm" placeholder="Juan Pérez">
                </div>
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <label for="edit_email" class="block text-sm font-semibold text-slate-700 mb-1.5">Correo Electrónico</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <input id="edit_email" type="email" name="email" required class="pl-10 block w-full rounded-xl border border-slate-200 bg-slate-50 shadow-sm focus:bg-white focus:border-agro-500 focus:ring focus:ring-agro-500/20 transition-all text-slate-800 py-2.5 text-sm" placeholder="tu@correo.com">
                </div>
            </div>

            <!-- Teléfono -->
            <div class="mb-4">
                <label for="edit_telefono" class="block text-sm font-semibold text-slate-700 mb-1.5">Teléfono</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <input id="edit_telefono" type="text" name="telefono" class="pl-10 block w-full rounded-xl border border-slate-200 bg-slate-50 shadow-sm focus:bg-white focus:border-agro-500 focus:ring focus:ring-agro-500/20 transition-all text-slate-800 py-2.5 text-sm" placeholder="300 000 0000">
                </div>
            </div>

            <!-- Dirección -->
            <div class="mb-4">
                <label for="edit_direccion" class="block text-sm font-semibold text-slate-700 mb-1.5">Dirección</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <input id="edit_direccion" type="text" name="direccion" class="pl-10 block w-full rounded-xl border border-slate-200 bg-slate-50 shadow-sm focus:bg-white focus:border-agro-500 focus:ring focus:ring-agro-500/20 transition-all text-slate-800 py-2.5 text-sm" placeholder="Calle 123 # 45-67">
                </div>
            </div>

            <!-- Password (Opcional en edición) -->
            <div class="mb-4">
                <label for="edit_password" class="block text-sm font-semibold text-slate-700 mb-1.5">Nueva Contraseña (Opcional)</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <input id="edit_password" type="password" name="password" autocomplete="new-password" class="pl-10 block w-full rounded-xl border border-slate-200 bg-slate-50 shadow-sm focus:bg-white focus:border-agro-500 focus:ring focus:ring-agro-500/20 transition-all text-slate-800 py-2.5 text-sm" placeholder="Dejar en blanco para no cambiar">
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="edit_password_confirmation" class="block text-sm font-semibold text-slate-700 mb-1.5">Confirmar Nueva Contraseña</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <input id="edit_password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" class="pl-10 block w-full rounded-xl border border-slate-200 bg-slate-50 shadow-sm focus:bg-white focus:border-agro-500 focus:ring focus:ring-agro-500/20 transition-all text-slate-800 py-2.5 text-sm" placeholder="Confirmar contraseña">
                </div>
            </div>

            <!-- Role Selection -->
            <div class="mb-6">
                <label for="edit_role_id" class="block text-sm font-semibold text-slate-700 mb-1.5">Rol de Usuario</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <select id="edit_role_id" name="role_id" required class="pl-10 block w-full rounded-xl border border-slate-200 bg-slate-50 shadow-sm focus:bg-white focus:border-agro-500 focus:ring focus:ring-agro-500/20 transition-all text-slate-800 py-2.5 text-sm appearance-none cursor-pointer">
                        <option value="" disabled>Selecciona un rol</option>
                        <option value="1">Administrador</option>
                        <option value="2">Vendedor</option>
                        <option value="3">Cliente</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                <button type="button" onclick="closeEditModal()" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 font-semibold text-sm transition-all">
                    Cancelar
                </button>
                <button type="submit" class="flex items-center gap-2 px-5 py-2.5 rounded-xl bg-agro-500 hover:bg-agro-600 text-white font-semibold text-sm transition-all shadow-[0_4px_12px_rgba(59,163,118,0.25)] hover:shadow-[0_6px_16px_rgba(59,163,118,0.4)]">
                    Guardar Cambios
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: '¡Éxito!',
        text: '{{ session('
        success ') }}',
        confirmButtonColor: '#3ba376',
        confirmButtonText: 'Aceptar',
        timer: 3000,
        timerProgressBar: true,
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
    });
</script>
@endif

@section('css')
<!-- Estilos de DataTables de AdminLTE -->
<link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<style>
    /* Ocultar el buscador nativo superior */
    .dataTables_wrapper .dataTables_filter {
        display: none !important;
    }

    /* Ocultar texto informativo Mostrando X a Y... */
    .dataTables_wrapper .dataTables_info {
        display: none !important;
    }

    /* Alinear la paginación a la izquierda y el selector de cantidad de páginas al lado (derecha) */
    .dataTables_wrapper .row:last-child {
        display: flex !important;
        align-items: center !important;
        justify-content: flex-end !important;
        margin-top: 1.25rem !important;
        padding-top: 1rem !important;
        border-top: 1px solid #f1f5f9 !important;
        width: 100% !important;
        flex-wrap: wrap !important;
        gap: 1.5rem !important;
    }

    /* Estilos del selector */
    .dataTables_length {
        margin: 0 !important;
        padding: 0 !important;
    }

    .dataTables_length select {
        border-radius: 0.75rem !important;
        border: 1px solid #cbd5e1 !important;
        background-color: #fff !important;
        padding: 0.25rem 1.5rem 0.25rem 0.5rem !important;
        outline: none !important;
        font-size: 0.875rem !important;
        color: #334155 !important;
    }

    .dataTables_length label {
        color: #475569 !important;
        font-weight: 500 !important;
        font-size: 0.875rem !important;
        margin: 0 !important;
    }

    /* Estilos del buscador custom */
    #contenedorBuscadorUsuarios .dataTables_filter input {
        border-radius: 0.75rem !important;
        border: 1px solid #cbd5e1 !important;
        padding: 0.5rem 1rem !important;
        background-color: #fff !important;
        outline: none !important;
        font-size: 0.875rem !important;
        color: #334155 !important;
        width: 250px !important;
        transition: all 0.2s ease !important;
    }

    #contenedorBuscadorUsuarios .dataTables_filter input:focus {
        border-color: #3ba376 !important;
        box-shadow: 0 0 0 3px rgba(59, 163, 118, 0.15) !important;
    }

    #contenedorBuscadorUsuarios .dataTables_filter label {
        color: #475569 !important;
        font-weight: 600 !important;
        margin: 0 !important;
        font-size: 0.875rem !important;
    }

    /* Paginación botones */
    .page-item.active .page-link {
        background-color: #3ba376 !important;
        border-color: #3ba376 !important;
        color: #fff !important;
        font-weight: 600 !important;
    }

    .page-link {
        color: #475569 !important;
        border: 1px solid #e2e8f0 !important;
        border-radius: 0.5rem !important;
        margin: 0 2px !important;
        padding: 0.45rem 0.85rem !important;
        font-size: 0.875rem !important;
        transition: all 0.15s ease !important;
    }

    .page-link:hover {
        background-color: #e1f6e8 !important;
        color: #2b825d !important;
        border-color: #c4ebd4 !important;
    }

    .page-item.disabled .page-link {
        color: #94a3b8 !important;
        background-color: #f8fafc !important;
        border-color: #e2e8f0 !important;
    }

    .dataTables_wrapper .col-md-6 {
        flex: none !important;
        max-width: none !important;
        padding: 0 !important;
    }
</style>
@endsection

@section('js')
<!-- Scripts de DataTables de AdminLTE -->
<script src="{{ asset('AdminLTE-3.2.0/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>

<script>
    $(function() {
        var table = $('#tablaUsuarios').DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "pageLength": 15,
            "lengthMenu": [5, 10, 15, 25, 50],
            "dom": "<'row'<'col-12'tr>><'row'<'col-12 d-flex align-items-center justify-content-end gap-3'l p>>",
            "columnDefs": [{
                "orderable": false,
                "targets": [4, 5]
            }],
            "language": {
                "decimal": "",
                "emptyTable": "No hay datos disponibles en la tabla",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ usuarios",
                "infoEmpty": "Mostrando 0 a 0 de 0 usuarios",
                "infoFiltered": "(filtrado de _MAX_ usuarios totales)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar de 1 a _MENU_ registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron usuarios coincidentes",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });

        // Mover buscador nativo
        $('#tablaUsuarios_wrapper .dataTables_filter').appendTo('#contenedorBuscadorUsuarios');

        // Confirmación elegante de eliminación con SweetAlert2
        $('.formulario-eliminar').on('submit', function(e) {
            e.preventDefault();
            const form = this;
            const name = $(form).data('name');

            Swal.fire({
                title: '¿Estás seguro?',
                text: `Vas a eliminar permanentemente al usuario "${name}". Esta acción no se puede deshacer.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    // Funciones de control del modal de edición
    function editarUsuario(id) {
        const url = `{{ url('usuarios') }}/${id}/edit`;
        const formAction = `{{ url('usuarios') }}/${id}`;

        // Petición AJAX para obtener datos del usuario
        fetch(url)
            .then(response => response.json())
            .then(data => {
                // Cargar valores en los campos del modal
                document.getElementById('edit_name').value = data.name;
                document.getElementById('edit_email').value = data.email;
                document.getElementById('edit_telefono').value = data.telefono || '';
                document.getElementById('edit_direccion').value = data.direccion || '';
                document.getElementById('edit_role_id').value = data.role_id;

                // Asignar el action dinámico al formulario
                document.getElementById('editUserForm').action = formAction;

                // Abrir modal con animaciones
                openEditModal();
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudieron recuperar los datos del usuario.'
                });
            });
    }

    function openEditModal() {
        const modal = document.getElementById('editUserModal');
        const card = document.getElementById('editModalCard');

        modal.classList.remove('hidden');
        modal.classList.add('flex');

        setTimeout(() => {
            card.classList.remove('scale-95', 'opacity-0');
            card.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeEditModal() {
        const modal = document.getElementById('editUserModal');
        const card = document.getElementById('editModalCard');

        card.classList.remove('scale-100', 'opacity-100');
        card.classList.add('scale-95', 'opacity-0');

        setTimeout(() => {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }, 300);
    }
</script>
@endsection

@endsection
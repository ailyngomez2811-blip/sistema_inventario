<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AgroGestión - Sistema de Inventario y Ventas</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|outfit:500,600,700,800" rel="stylesheet" />

    <!-- Scripts/Styles -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <!-- Fallback/Additional Tailwind Config -->
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
    <style type="text/tailwindcss">
        @layer utilities {
            .hero-pattern {
                background-color: #1b4435;
                background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%232b825d' fill-opacity='0.2'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            }
        }
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Outfit', sans-serif; }
    </style>
</head>

<body class="antialiased bg-slate-50 text-slate-800 selection:bg-agro-500 selection:text-white">

    <!-- Navigation -->
    <nav class="absolute top-0 w-full z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-24">
                <div class="flex items-center gap-2">
                    <svg class="w-8 h-8 text-agro-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                    </svg>
                    <span class="font-heading font-bold text-2xl text-white tracking-tight">Agro<span class="text-agro-400">Gestión</span></span>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="#caracteristicas" class="text-slate-200 hover:text-white font-medium transition-colors">Características</a>
                    <a href="#solucion" class="text-slate-200 hover:text-white font-medium transition-colors">Solución</a>
                </div>
                <div class="flex items-center space-x-4">
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}" class="text-white bg-agro-600 hover:bg-agro-500 px-5 py-2.5 rounded-lg font-medium transition-all shadow-lg shadow-agro-900/20">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="text-slate-200 hover:text-white font-medium transition-colors">Ingresar</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-white bg-agro-500 hover:bg-agro-400 px-5 py-2.5 rounded-lg font-medium transition-all shadow-lg shadow-agro-900/20">Registrarse</a>
                    @endif
                    @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative bg-agro-900 hero-pattern min-h-[85vh] flex items-center overflow-hidden">
        <!-- Background Gradients -->
        <div class="absolute inset-0 bg-gradient-to-b from-agro-950/90 via-agro-900/80 to-agro-900/95"></div>
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-agro-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-agro-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-16 text-center lg:text-left flex flex-col lg:flex-row items-center gap-12">
            <div class="flex-1 space-y-8 z-10">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-agro-800/50 border border-agro-500/30 text-agro-300 text-sm font-medium backdrop-blur-sm">
                    <span class="relative flex h-2.5 w-2.5">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-agro-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-agro-500"></span>
                    </span>
                    Sistema Especializado para el Sector Agrícola
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white leading-[1.1] font-heading">
                    El control total de tus <span class="text-transparent bg-clip-text bg-gradient-to-r from-agro-300 to-agro-500">insumos y ventas</span>
                </h1>
                <p class="text-lg md:text-xl text-slate-300 max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                    Optimiza tu inventario de agroquímicos, semillas y fertilizantes. Gestiona tus ventas y analiza el rendimiento de tu negocio con la plataforma más intuitiva.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="inline-flex justify-center items-center gap-2 px-8 py-4 bg-agro-500 hover:bg-agro-400 text-white rounded-xl font-semibold text-lg transition-all shadow-[0_0_20px_rgba(59,163,118,0.4)] hover:shadow-[0_0_25px_rgba(59,163,118,0.6)] hover:-translate-y-1">
                        Comenzar Ahora
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                    @else
                    <a href="{{ route('login') }}" class="inline-flex justify-center items-center gap-2 px-8 py-4 bg-agro-500 hover:bg-agro-400 text-white rounded-xl font-semibold text-lg transition-all shadow-[0_0_20px_rgba(59,163,118,0.4)] hover:shadow-[0_0_25px_rgba(59,163,118,0.6)] hover:-translate-y-1">
                        Ingresar al Sistema
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                    @endif
                    <a href="#caracteristicas" class="inline-flex justify-center items-center gap-2 px-8 py-4 bg-white/5 hover:bg-white/10 text-white rounded-xl font-semibold text-lg transition-all backdrop-blur-md border border-white/10">
                        Descubrir más
                    </a>
                </div>
            </div>

            <div class="flex-1 w-full max-w-lg lg:max-w-none relative z-10 hidden md:block">
                <div class="absolute inset-0 bg-gradient-to-tr from-agro-500 to-agro-300 rounded-2xl blur-2xl opacity-20 animate-pulse"></div>
                <img src="https://images.unsplash.com/photo-1625246333195-78d9c38ad449?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Gestión Agrícola" class="relative rounded-2xl shadow-2xl border border-white/10 object-cover h-[450px] w-full" />

                <!-- Floating Elements -->
                <div class="absolute -bottom-6 -left-6 bg-white p-5 rounded-xl shadow-2xl border border-slate-100 flex items-center gap-4 animate-bounce" style="animation-duration: 3s;">
                    <div class="bg-agro-100 p-3 rounded-lg text-agro-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-medium">Ventas del Día</p>
                        <p class="text-xl font-bold text-slate-800 font-heading">+24%</p>
                    </div>
                </div>

                <div class="absolute -top-6 -right-6 bg-white p-4 rounded-xl shadow-2xl border border-slate-100 flex items-center gap-4 animate-bounce" style="animation-duration: 4s; animation-delay: 1s;">
                    <div class="bg-blue-100 p-2.5 rounded-lg text-blue-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-medium">Stock Seguro</p>
                        <p class="text-sm font-bold text-slate-800 font-heading">Actualizado</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Wave -->
        <div class="absolute bottom-0 w-full leading-none z-0">
            <svg class="relative block w-full h-[60px] md:h-[100px]" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V95.8C59.71,118.08,130.83,120.22,192.4,107.56,236.4,98.63,279.79,78.27,321.39,56.44Z" class="fill-slate-50"></path>
            </svg>
        </div>
    </div>

    <!-- Features Section -->
    <section id="caracteristicas" class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-20">
                <h2 class="text-agro-600 font-bold tracking-widest uppercase text-sm mb-3">Características Principales</h2>
                <h3 class="text-3xl md:text-5xl font-extrabold text-slate-900 font-heading tracking-tight">Diseñado para tu negocio agrícola</h3>
                <p class="mt-6 text-lg md:text-xl text-slate-600">Herramientas especializadas para el control y venta de insumos, semillas, fertilizantes y maquinaria ligera.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 md:gap-10">
                <!-- Feature 1 -->
                <div class="bg-white rounded-[2rem] p-8 md:p-10 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] transition-all group hover:-translate-y-1">
                    <div class="w-16 h-16 bg-agro-50 rounded-2xl flex items-center justify-center text-agro-600 mb-8 group-hover:bg-agro-600 group-hover:text-white transition-colors duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h4 class="text-2xl font-bold text-slate-900 font-heading mb-4">Inventario Preciso</h4>
                    <p class="text-slate-600 leading-relaxed text-lg">Monitorea existencias en tiempo real. Gestiona lotes, fechas de caducidad y recibe alertas automáticas de stock bajo.</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white rounded-[2rem] p-8 md:p-10 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] transition-all group hover:-translate-y-1">
                    <div class="w-16 h-16 bg-agro-50 rounded-2xl flex items-center justify-center text-agro-600 mb-8 group-hover:bg-agro-600 group-hover:text-white transition-colors duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-2xl font-bold text-slate-900 font-heading mb-4">Punto de Venta</h4>
                    <p class="text-slate-600 leading-relaxed text-lg">Agiliza tus ventas en mostrador. Emite tickets, realiza cotizaciones y maneja múltiples métodos de pago fácilmente.</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white rounded-[2rem] p-8 md:p-10 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] transition-all group hover:-translate-y-1">
                    <div class="w-16 h-16 bg-agro-50 rounded-2xl flex items-center justify-center text-agro-600 mb-8 group-hover:bg-agro-600 group-hover:text-white transition-colors duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h4 class="text-2xl font-bold text-slate-900 font-heading mb-4">Reportes y Finanzas</h4>
                    <p class="text-slate-600 leading-relaxed text-lg">Analiza tus ganancias diarias, semanales o mensuales. Identifica tus productos estrella y toma decisiones informadas.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="bg-agro-950 py-20 text-white relative overflow-hidden">
        <!-- Decoration -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute -top-24 -left-24 w-96 h-96 rounded-full border-[40px] border-white"></div>
            <div class="absolute -bottom-24 -right-24 w-96 h-96 rounded-full border-[40px] border-white"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-10 md:gap-8 text-center">
                <div class="p-6">
                    <p class="text-5xl font-extrabold font-heading text-agro-400 mb-3">100%</p>
                    <p class="text-agro-100/70 text-sm font-semibold uppercase tracking-widest">Adaptado al Agro</p>
                </div>
                <div class="p-6">
                    <p class="text-5xl font-extrabold font-heading text-agro-400 mb-3">+5k</p>
                    <p class="text-agro-100/70 text-sm font-semibold uppercase tracking-widest">Productos Soportados</p>
                </div>
                <div class="p-6">
                    <p class="text-5xl font-extrabold font-heading text-agro-400 mb-3">24/7</p>
                    <p class="text-agro-100/70 text-sm font-semibold uppercase tracking-widest">Acceso a tu info</p>
                </div>
                <div class="p-6">
                    <p class="text-5xl font-extrabold font-heading text-agro-400 mb-3"><svg class="w-12 h-12 mx-auto inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg></p>
                    <p class="text-agro-100/70 text-sm font-semibold uppercase tracking-widest">Datos Seguros</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="solucion" class="py-24 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="bg-gradient-to-br from-agro-600 to-agro-800 rounded-[2.5rem] p-10 md:p-16 shadow-2xl flex flex-col lg:flex-row items-center justify-between gap-12 relative overflow-hidden">
                <!-- Background pattern -->
                <div class="absolute inset-0 opacity-10 hero-pattern"></div>

                <div class="lg:w-2/3 relative z-10 text-center lg:text-left">
                    <h3 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-white font-heading mb-6 tracking-tight">Moderniza tu punto de venta hoy mismo</h3>
                    <p class="text-agro-50 text-xl md:text-2xl font-light">Deja atrás el papel y las hojas de cálculo. Toma el control de tu inventario y aumenta tus ventas.</p>
                </div>
                <div class="lg:w-1/3 flex justify-center lg:justify-end w-full relative z-10">
                    <a href="{{ route('register') ?? route('login') }}" class="w-full sm:w-auto text-center px-10 py-5 bg-white hover:bg-slate-50 text-agro-900 rounded-2xl font-bold text-xl transition-all shadow-xl hover:shadow-2xl hover:-translate-y-1">
                        Ingresar al Sistema
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-50 border-t border-slate-200 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-2">
                    <svg class="w-8 h-8 text-agro-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                    </svg>
                    <span class="font-heading font-extrabold text-2xl text-slate-800 tracking-tight">Agro<span class="text-agro-600">Gestión</span></span>
                </div>
                <div class="text-slate-500 font-medium">
                    &copy; {{ date('Y') }} Sistema de Inventario y Ventas.
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
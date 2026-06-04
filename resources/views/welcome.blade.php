<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AgroGestión - Plataforma Agrícola Profesional</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700|outfit:500,600,700,800,900" rel="stylesheet" />
    
    <!-- Scripts/Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Tailwind CDN for immediate styling (No build required) -->
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
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Outfit', sans-serif; }
        .glass-panel {
            @apply bg-white/10 backdrop-blur-lg border border-white/20 shadow-xl;
        }
    </style>
    
</head>

<body class="antialiased bg-slate-50 text-slate-800 selection:bg-agro-500 selection:text-white">

    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 transition-all duration-300 bg-agro-950/80 backdrop-blur-md border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center gap-3">
                    <div class="bg-agro-500/20 p-2 rounded-xl border border-agro-400/30">
                        <svg class="w-7 h-7 text-agro-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                    </div>
                    <span class="font-heading font-extrabold text-2xl text-white tracking-tight">Agro<span class="text-agro-400">Gestión</span></span>
                </div>
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="#caracteristicas" class="text-slate-300 hover:text-white text-sm font-medium transition-colors">Características</a>
                    <a href="#solucion" class="text-slate-300 hover:text-white text-sm font-medium transition-colors">Solución</a>
                    <div class="h-6 w-px bg-white/20"></div>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-white bg-agro-600 hover:bg-agro-500 px-5 py-2.5 rounded-xl font-semibold transition-all shadow-[0_0_15px_rgba(59,163,118,0.4)]">Panel de Control</a>
                        @else
                            <a href="{{ route('login') }}" class="text-white font-medium hover:text-agro-300 transition-colors">Ingresar</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-agro-900 bg-white hover:bg-slate-100 px-5 py-2.5 rounded-xl font-bold transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5">Crear Cuenta</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Immersive Hero Section -->
    <div class="relative min-h-screen flex items-center justify-center overflow-hidden bg-agro-950 pt-20">
        <!-- Background Image (Same high-quality aesthetic as login) -->
        <img src="https://images.unsplash.com/photo-1625246333195-78d9c38ad449?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" alt="Agricultura" class="absolute inset-0 w-full h-full object-cover z-0 opacity-40 mix-blend-overlay">
        
        <!-- Complex Gradients for Depth -->
        <div class="absolute inset-0 bg-gradient-to-b from-agro-950/80 via-agro-900/60 to-agro-950 pointer-events-none z-0"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-agro-950/90 via-transparent to-agro-950/90 pointer-events-none z-0"></div>

        <!-- Animated Elements -->
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-agro-500 rounded-full mix-blend-overlay filter blur-[100px] opacity-50 animate-pulse pointer-events-none z-0"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-agro-300 rounded-full mix-blend-overlay filter blur-[100px] opacity-40 animate-pulse pointer-events-none z-0" style="animation-delay: 2s;"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center text-center pb-20">
            
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass-panel text-agro-200 text-sm font-semibold mb-8 mt-10">
                <span class="relative flex h-2.5 w-2.5">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-agro-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-agro-500"></span>
                </span>
                La Evolución de la Gestión Agrícola
            </div>

            <h1 class="text-5xl md:text-7xl lg:text-8xl font-black text-white leading-[1.05] font-heading tracking-tight max-w-5xl mx-auto drop-shadow-2xl">
                Toma el control de tu <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-agro-300 via-white to-agro-100">negocio en el campo</span>
            </h1>
            
            <p class="mt-8 text-xl md:text-2xl text-agro-50/80 max-w-3xl mx-auto font-light leading-relaxed drop-shadow-md">
                Plataforma de clase mundial para inventario, ventas y análisis de rendimiento. 
                Desarrollada para llevar a productores y distribuidores al siguiente nivel.
            </p>

            <div class="mt-12 flex flex-col sm:flex-row gap-5 w-full justify-center px-4 sm:px-0">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="inline-flex justify-center items-center gap-3 px-8 py-4 bg-agro-500 hover:bg-agro-400 text-white rounded-2xl font-bold text-lg transition-all shadow-[0_0_30px_rgba(59,163,118,0.5)] hover:shadow-[0_0_40px_rgba(59,163,118,0.7)] hover:-translate-y-1">
                        Comenzar Gratis Hoy
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                @endif
                <a href="#caracteristicas" class="inline-flex justify-center items-center gap-3 px-8 py-4 glass-panel hover:bg-white/20 text-white rounded-2xl font-semibold text-lg transition-all hover:-translate-y-1 group">
                    Descubrir Plataforma
                    <svg class="w-5 h-5 group-hover:translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                </a>
            </div>

            <!-- Dashboard Preview -->
            <div class="mt-20 relative w-full max-w-6xl mx-auto">
                <div class="absolute inset-0 bg-gradient-to-t from-agro-950 via-transparent to-transparent z-10 rounded-3xl"></div>
                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" alt="Dashboard Preview" class="rounded-3xl shadow-[0_0_50px_rgba(0,0,0,0.5)] border border-white/10 relative z-0 object-cover w-full h-[400px] md:h-[600px] object-top opacity-90">
                
                <!-- Floating Stats -->
                <div class="absolute -left-6 top-20 glass-panel p-4 rounded-2xl z-20 flex items-center gap-4 animate-bounce" style="animation-duration: 4s;">
                    <div class="bg-agro-500/20 p-3 rounded-xl text-agro-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    </div>
                    <div class="text-left">
                        <p class="text-white/60 text-xs font-semibold uppercase tracking-wider">Ventas Mes</p>
                        <p class="text-white font-heading font-bold text-xl">+42.5%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <section id="caracteristicas" class="py-32 bg-slate-50 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-20">
                <div class="inline-flex items-center justify-center p-3 mb-6 rounded-2xl bg-agro-100 text-agro-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                </div>
                <h3 class="text-4xl md:text-5xl font-extrabold text-slate-900 font-heading tracking-tight mb-6">Herramientas de Precisión</h3>
                <p class="text-xl text-slate-500 font-light leading-relaxed">Automatiza procesos, reduce mermas y aumenta la rentabilidad de tu negocio agrícola con módulos diseñados para expertos.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 md:gap-10">
                <!-- Feature 1 -->
                <div class="bg-white rounded-[2.5rem] p-10 shadow-lg shadow-slate-200/50 border border-slate-100 hover:shadow-2xl transition-all duration-500 group hover:-translate-y-2 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-agro-100 to-transparent rounded-bl-full opacity-50 group-hover:scale-125 transition-transform duration-500"></div>
                    <div class="w-16 h-16 bg-gradient-to-br from-agro-500 to-agro-600 rounded-2xl flex items-center justify-center text-white mb-8 shadow-lg shadow-agro-500/30">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h4 class="text-2xl font-bold text-slate-900 font-heading mb-4 group-hover:text-agro-600 transition-colors">Inventario Inteligente</h4>
                    <p class="text-slate-500 leading-relaxed text-lg font-light">Monitoreo en tiempo real de lotes, fechas de caducidad y alertas automáticas. Nunca te quedes sin stock de los productos más vendidos.</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white rounded-[2.5rem] p-10 shadow-lg shadow-slate-200/50 border border-slate-100 hover:shadow-2xl transition-all duration-500 group hover:-translate-y-2 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-agro-100 to-transparent rounded-bl-full opacity-50 group-hover:scale-125 transition-transform duration-500"></div>
                    <div class="w-16 h-16 bg-gradient-to-br from-agro-500 to-agro-600 rounded-2xl flex items-center justify-center text-white mb-8 shadow-lg shadow-agro-500/30">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-2xl font-bold text-slate-900 font-heading mb-4 group-hover:text-agro-600 transition-colors">Punto de Venta Ágil</h4>
                    <p class="text-slate-500 leading-relaxed text-lg font-light">Facturación rápida, tickets térmicos, cotizaciones instantáneas y múltiples métodos de pago, pensado para el ritmo del mostrador.</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white rounded-[2.5rem] p-10 shadow-lg shadow-slate-200/50 border border-slate-100 hover:shadow-2xl transition-all duration-500 group hover:-translate-y-2 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-agro-100 to-transparent rounded-bl-full opacity-50 group-hover:scale-125 transition-transform duration-500"></div>
                    <div class="w-16 h-16 bg-gradient-to-br from-agro-500 to-agro-600 rounded-2xl flex items-center justify-center text-white mb-8 shadow-lg shadow-agro-500/30">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h4 class="text-2xl font-bold text-slate-900 font-heading mb-4 group-hover:text-agro-600 transition-colors">Analítica Avanzada</h4>
                    <p class="text-slate-500 leading-relaxed text-lg font-light">Dashboard interactivo con métricas financieras clave. Conoce tus ganancias, productos estrella y toma decisiones respaldadas por datos.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="bg-agro-950 py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute -top-32 -left-32 w-96 h-96 rounded-full border-[50px] border-white/20"></div>
            <div class="absolute -bottom-32 -right-32 w-96 h-96 rounded-full border-[50px] border-white/20"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-12 md:gap-8 divide-x divide-white/10">
                <div class="text-center px-4">
                    <p class="text-5xl font-black font-heading text-agro-400 mb-4 drop-shadow-md">100%</p>
                    <p class="text-white/60 text-sm font-bold uppercase tracking-[0.2em]">Enfocado al Agro</p>
                </div>
                <div class="text-center px-4">
                    <p class="text-5xl font-black font-heading text-agro-400 mb-4 drop-shadow-md">+10k</p>
                    <p class="text-white/60 text-sm font-bold uppercase tracking-[0.2em]">Productos Base</p>
                </div>
                <div class="text-center px-4">
                    <p class="text-5xl font-black font-heading text-agro-400 mb-4 drop-shadow-md">24/7</p>
                    <p class="text-white/60 text-sm font-bold uppercase tracking-[0.2em]">Soporte Técnico</p>
                </div>
                <div class="text-center px-4">
                    <p class="text-5xl font-black font-heading text-agro-400 mb-4 flex justify-center drop-shadow-md">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </p>
                    <p class="text-white/60 text-sm font-bold uppercase tracking-[0.2em]">Cifrado Militar</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="solucion" class="py-32 bg-white relative overflow-hidden">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="bg-gradient-to-br from-agro-700 via-agro-800 to-agro-950 rounded-[3rem] p-12 md:p-20 shadow-2xl flex flex-col lg:flex-row items-center justify-between gap-12 relative overflow-hidden border border-agro-600/30">
                <!-- Background decoration -->
                <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.05\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
                <div class="absolute -right-20 -top-20 w-80 h-80 bg-agro-400 rounded-full blur-[80px] opacity-20"></div>

                <div class="lg:w-3/5 relative z-10 text-center lg:text-left">
                    <h3 class="text-4xl md:text-5xl font-black text-white font-heading mb-6 tracking-tight leading-tight">Digitaliza tu inventario <br><span class="text-agro-300">hoy mismo.</span></h3>
                    <p class="text-white/80 text-xl font-light leading-relaxed">Únete a cientos de empresas que ya gestionan sus ventas de manera profesional. Deja atrás el papel y toma decisiones inteligentes.</p>
                </div>
                <div class="lg:w-2/5 flex justify-center lg:justify-end w-full relative z-10">
                    <a href="{{ route('register') ?? route('login') }}" class="group w-full sm:w-auto text-center px-10 py-5 bg-white hover:bg-slate-50 text-agro-900 rounded-2xl font-bold text-xl transition-all shadow-xl hover:shadow-2xl hover:scale-105 flex items-center justify-center gap-3">
                        Comenzar Ahora
                        <svg class="w-6 h-6 text-agro-500 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 py-16 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-8">
                <div class="flex items-center gap-3">
                    <div class="bg-agro-500/20 p-2 rounded-xl border border-agro-500/30">
                        <svg class="w-8 h-8 text-agro-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                    </div>
                    <span class="font-heading font-extrabold text-3xl text-white tracking-tight">Agro<span class="text-agro-400">Gestión</span></span>
                </div>
                <div class="flex gap-8">
                    <a href="#" class="text-slate-400 hover:text-white transition-colors text-sm font-medium">Privacidad</a>
                    <a href="#" class="text-slate-400 hover:text-white transition-colors text-sm font-medium">Términos</a>
                    <a href="#" class="text-slate-400 hover:text-white transition-colors text-sm font-medium">Contacto</a>
                </div>
                <div class="text-slate-500 font-medium text-sm">
                    &copy; {{ date('Y') }} AgroGestión. Todos los derechos reservados.
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
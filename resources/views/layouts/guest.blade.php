<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|outfit:500,600,700,800" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

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
    <body class="font-sans text-slate-800 antialiased selection:bg-agro-500 selection:text-white bg-white">
        <div class="min-h-screen flex">
            <!-- Left Side: Branding / Image -->
            <div class="hidden lg:flex lg:w-1/2 relative bg-agro-900 overflow-hidden flex-col justify-between p-16 shadow-2xl z-10 group">
                <!-- Background Image & Overlays -->
                <img src="https://images.unsplash.com/photo-1625246333195-78d9c38ad449?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="AgroGestión Background" class="absolute inset-0 w-full h-full object-cover z-0 opacity-60 group-hover:scale-105 transition-transform duration-1000">
                <div class="absolute inset-0 bg-gradient-to-t from-agro-950 via-agro-900/80 to-agro-900/40 pointer-events-none z-0"></div>
                <div class="absolute inset-0 bg-agro-600/20 mix-blend-multiply pointer-events-none z-0"></div>

                <!-- Gradients/Blobs -->
                <div class="absolute -top-40 -right-40 w-96 h-96 bg-agro-500 rounded-full mix-blend-overlay filter blur-3xl opacity-40 animate-blob pointer-events-none z-0"></div>
                <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-agro-300 rounded-full mix-blend-overlay filter blur-3xl opacity-30 animate-blob animation-delay-2000 pointer-events-none z-0"></div>

                <!-- Top Content -->
                <div class="relative z-10">
                    <a href="/" class="inline-flex items-center gap-3 group/logo">
                        <div class="bg-white/10 p-3 rounded-2xl border border-white/20 backdrop-blur-md group-hover/logo:bg-white/20 transition-all shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                        </div>
                        <span class="font-heading font-extrabold text-3xl text-white tracking-tight drop-shadow-md">AgroGestión</span>
                    </a>
                </div>

                <!-- Middle Content -->
                <div class="relative z-10 text-white mt-auto mb-16 max-w-lg">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-black/30 border border-white/10 text-white text-sm font-medium backdrop-blur-md mb-8 shadow-xl">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-agro-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-agro-400"></span>
                        </span>
                        Plataforma Líder
                    </div>
                    <h2 class="text-4xl lg:text-5xl font-extrabold font-heading mb-6 leading-[1.15] tracking-tight drop-shadow-lg">El control total de tus <br><span class="text-transparent bg-clip-text bg-gradient-to-r from-agro-300 to-white drop-shadow-sm">insumos y ventas</span></h2>
                    <p class="text-white/80 text-lg leading-relaxed font-light drop-shadow-md">Accede a las herramientas más avanzadas diseñadas específicamente para maximizar el rendimiento de tu negocio agrícola.</p>
                </div>

                <!-- Bottom Content -->
                <div class="relative z-10 flex items-center justify-between pt-8 border-t border-white/10">
                    <div class="flex items-center gap-4">
                        <div class="flex -space-x-3">
                            <img class="w-10 h-10 rounded-full border-2 border-agro-900 shadow-md" src="https://i.pravatar.cc/100?img=1" alt="User">
                            <img class="w-10 h-10 rounded-full border-2 border-agro-900 shadow-md" src="https://i.pravatar.cc/100?img=2" alt="User">
                            <img class="w-10 h-10 rounded-full border-2 border-agro-900 shadow-md" src="https://i.pravatar.cc/100?img=3" alt="User">
                            <div class="w-10 h-10 rounded-full border-2 border-agro-900 bg-agro-600 flex items-center justify-center text-xs font-bold text-white shadow-md">+5k</div>
                        </div>
                        <div class="text-sm font-medium text-white/90 leading-tight">
                            Usuarios<br>activos
                        </div>
                    </div>
                    <div class="text-white/60 text-sm font-medium">
                        &copy; {{ date('Y') }}
                    </div>
                </div>
            </div>

            <!-- Right Side: Form -->
            <div class="w-full lg:w-1/2 flex flex-col justify-center relative bg-slate-50/50">
                <!-- Mobile Logo -->
                <div class="lg:hidden absolute top-6 left-6 flex items-center gap-2">
                    <div class="bg-agro-100 p-2 rounded-lg text-agro-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                    </div>
                    <span class="font-heading font-extrabold text-2xl text-slate-900 tracking-tight">Agro<span class="text-agro-600">Gestión</span></span>
                </div>

                <div class="w-full max-w-md mx-auto px-6 py-12 lg:px-8 xl:max-w-lg">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
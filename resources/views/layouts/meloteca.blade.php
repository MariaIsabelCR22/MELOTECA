
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Meloteca') - Mi colección musical</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col bg-[#0c0b10] text-[#e8e5ed] antialiased">

    <!-- FONDO -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <div class="absolute -top-40 left-1/4 w-[500px] h-[500px] rounded-full bg-purple-900/10 blur-[130px]"></div>
        <div class="absolute top-[45%] -right-40 w-[400px] h-[400px] rounded-full bg-violet-800/10 blur-[130px]"></div>
    </div>

    <!-- NAVEGACIÓN -->
    <header class="relative z-10 border-b border-white/[0.07] bg-[#111015]/85 backdrop-blur-xl">

        <div class="mx-auto max-w-7xl px-6 py-5">

            <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                <!-- LOGOTIPO -->
                <a href="{{ route('albums.index') }}" class="group flex items-center gap-3">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl border border-purple-400/20 bg-purple-500/10 text-purple-300 transition group-hover:bg-purple-500/20">
                        <span class="text-xl">♫</span>
                    </div>

                    <div>
                        <span class="block text-xl font-bold tracking-[0.22em] text-white">
                            MELOTECA
                        </span>

                        <span class="block text-[9px] tracking-[0.3em] text-gray-500 uppercase">
                            Archivo musical personal
                        </span>
                    </div>

                </a>

                <!-- ENLACES -->
                <nav class="flex flex-wrap items-center gap-3 sm:gap-5 text-sm">

                    <a href="{{ route('albums.index') }}"
                       class="rounded-lg px-3 py-2 text-gray-400 transition hover:bg-white/[0.04] hover:text-white">
                        Mi colección
                    </a>

                    <a href="{{ route('profile.edit') }}"
                       class="rounded-lg px-3 py-2 text-gray-400 transition hover:bg-white/[0.04] hover:text-white">
                        Mi cuenta
                    </a>

                    <div class="hidden h-6 w-px bg-white/10 sm:block"></div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                                class="rounded-lg px-3 py-2 text-gray-500 transition hover:bg-red-500/10 hover:text-red-300">
                            Cerrar sesión
                        </button>
                    </form>

                </nav>

            </div>

        </div>

    </header>

    <!-- CONTENIDO -->
    <main class="relative z-10 mx-auto w-full max-w-7xl flex-1 px-6 py-12">

        @if (session('success'))
            <div class="mb-8 rounded-xl border border-emerald-500/20 bg-emerald-500/[0.07] px-5 py-4 text-sm text-emerald-300">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </main>

    <!-- PIE DE PÁGINA -->
    <footer class="relative z-10 mt-12 border-t border-white/[0.07] bg-[#111015]/60">

        <div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-3 px-6 py-7 text-center sm:flex-row sm:text-left">

            <span class="text-xs tracking-widest text-gray-500">
                MELOTECA
            </span>

            <p class="text-xs text-gray-600">
                Tu colección, tu música. ♫
            </p>

            <span class="text-[10px] tracking-wider text-gray-700">
                UN ESPACIO PARA ESCUCHAR Y RECORDAR
            </span>

        </div>

    </footer>

</body>
</html>

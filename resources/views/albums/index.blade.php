
@extends('layouts.meloteca')

@section('title', 'Mi colección')

@section('content')

    <!-- ENCABEZADO -->
    <div class="mb-12 flex flex-wrap items-end justify-between gap-6">

        <div>

            <div class="mb-4 flex items-center gap-3">
                <span class="h-px w-8 bg-purple-400"></span>

                <p class="text-[11px] font-medium uppercase tracking-[0.3em] text-purple-300">
                    Tu espacio musical
                </p>
            </div>

            <h1 class="text-4xl font-semibold tracking-tight text-white sm:text-5xl">
                Mi colección<span class="text-purple-400">.</span>
            </h1>

            <p class="mt-4 max-w-md text-sm leading-6 text-gray-500">
                Un pequeño universo de sonidos, recuerdos y canciones que forman parte de ti.
            </p>

            <!-- ESTADÍSTICAS COMPACTAS -->
            <div class="mt-6 flex flex-wrap items-center gap-x-6 gap-y-3">

                <div class="flex items-center gap-2">
                    <span class="text-lg font-semibold text-white">
                        {{ $albums->total() }}
                    </span>

                    <span class="text-xs text-gray-500">
                        Álbumes registrados
                    </span>
                </div>

                <span class="hidden h-4 w-px bg-white/10 sm:block"></span>

                <div class="flex items-center gap-2">
                    <span class="text-lg font-semibold text-purple-300">
                        {{ $albums->count() }}
                    </span>

                    <span class="text-xs text-gray-500">
                        En esta página
                    </span>
                </div>

            </div>

        </div>

        <!-- AGREGAR ÁLBUM -->
        <a href="{{ route('albums.create') }}"
           class="group inline-flex items-center gap-3 rounded-xl border border-purple-400/20 bg-purple-500/10 px-5 py-3.5 text-sm font-medium text-purple-200 transition duration-300 hover:border-purple-400/40 hover:bg-purple-500/20">

            <span class="text-lg transition group-hover:rotate-90">+</span>
            Agregar álbum

        </a>

    </div>


    <!-- BUSCADOR -->
    <form action="{{ route('albums.index') }}" method="GET"
          class="mb-10 flex flex-col gap-3 sm:flex-row sm:items-center">

        <div class="relative w-full sm:max-w-md">

            <span class="pointer-events-none absolute inset-y-0 left-4 flex items-center text-gray-500">
                ⌕
            </span>

            <input
                type="text"
                name="buscar"
                value="{{ $buscar }}"
                placeholder="Buscar álbum o artista..."
                class="w-full rounded-xl border border-white/[0.08] bg-[#15131a] py-3.5 pl-11 pr-4 text-sm text-white placeholder-gray-600 outline-none transition focus:border-purple-400/40 focus:ring-2 focus:ring-purple-500/10"
            >

        </div>

        <button type="submit"
                class="rounded-xl border border-white/10 bg-white/[0.05] px-6 py-3.5 text-sm font-medium text-gray-300 transition hover:border-purple-400/30 hover:bg-purple-500/10 hover:text-purple-200">
            Buscar
        </button>

        @if ($buscar)
            <a href="{{ route('albums.index') }}"
               class="px-2 py-3 text-sm text-gray-500 transition hover:text-white">
                Limpiar búsqueda
            </a>
        @endif

    </form>


    <!-- CUADRÍCULA DE ÁLBUMES -->
    @if ($albums->count() > 0)

        <div class="mb-6 flex items-center justify-between border-b border-white/[0.07] pb-4">

            <p class="text-xs uppercase tracking-[0.2em] text-gray-500">
                Tu biblioteca
            </p>

            <p class="text-xs text-gray-600">
                {{ $albums->total() }} resultados
            </p>

        </div>


        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

            @foreach ($albums as $album)

                <article class="group min-w-0">

                    <!-- PORTADA -->
                    <div class="relative mb-5 aspect-square overflow-hidden rounded-2xl border border-white/[0.07] bg-[#19161f] shadow-xl shadow-black/20">

                        @if ($album->portada)

                            <img
                                src="{{ asset('storage/' . $album->portada) }}"
                                alt="Portada de {{ $album->nombre }}"
                                class="h-full w-full object-cover transition duration-700 ease-out group-hover:scale-105"
                            >

                        @else

                            <div class="flex h-full flex-col items-center justify-center gap-3 bg-gradient-to-br from-[#211b2a] to-[#121016]">
                                <span class="text-5xl text-purple-300/50">♫</span>

                                <span class="text-[10px] uppercase tracking-[0.25em] text-gray-600">
                                    Sin portada
                                </span>
                            </div>

                        @endif

                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 transition duration-500 group-hover:opacity-100"></div>

                        @if ($album->formato)
                            <span class="absolute right-3 top-3 rounded-lg border border-white/10 bg-black/50 px-3 py-1.5 text-[10px] uppercase tracking-wider text-white/80 backdrop-blur-md">
                                {{ $album->formato }}
                            </span>
                        @endif

                    </div>


                    <!-- INFORMACIÓN -->
                    <div class="px-1">

                        <div class="mb-3">

                            <h2 class="truncate text-base font-semibold text-gray-100 transition group-hover:text-purple-200">
                                {{ $album->nombre }}
                            </h2>

                            <p class="mt-1 truncate text-sm text-purple-300/80">
                                {{ $album->artista }}
                            </p>

                        </div>


                        <!-- METADATOS -->
                        <div class="flex flex-wrap items-center gap-x-3 gap-y-1.5 text-[11px] text-gray-500">

                            @if ($album->genero)
                                <span>{{ $album->genero }}</span>
                            @endif

                            @if ($album->anio_lanzamiento)

                                @if ($album->genero)
                                    <span class="text-gray-700">·</span>
                                @endif

                                <span>{{ $album->anio_lanzamiento }}</span>

                            @endif

                        </div>


                        <!-- ACCIONES -->
                        <div class="mt-5 flex items-center justify-between border-t border-white/[0.07] pt-4">

                            <a href="{{ route('albums.edit', $album) }}"
                               class="text-xs font-medium text-gray-400 transition hover:text-purple-300">
                                Editar álbum →
                            </a>

                            <form action="{{ route('albums.destroy', $album) }}"
                                  method="POST"
                                  onsubmit="return confirm('¿Seguro que deseas eliminar este álbum?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="text-xs text-gray-600 transition hover:text-red-400">
                                    Eliminar
                                </button>

                            </form>

                        </div>

                    </div>

                </article>

            @endforeach

        </div>


        <!-- PAGINACIÓN -->
        <div class="mt-14 border-t border-white/[0.07] pt-7">
            {{ $albums->links() }}
        </div>


    @else

        <!-- ESTADO VACÍO -->
        <div class="rounded-2xl border border-dashed border-purple-300/20 bg-white/[0.015] px-6 py-24 text-center">

            <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-2xl border border-purple-400/20 bg-purple-500/[0.07]">
                <span class="text-3xl text-purple-300">♫</span>
            </div>

            <p class="mb-3 text-[10px] uppercase tracking-[0.3em] text-purple-300/70">
                Un espacio por descubrir
            </p>

            <h2 class="text-2xl font-semibold text-white">

                @if ($buscar)
                    No encontramos ese álbum
                @else
                    Tu colección está esperando
                @endif

            </h2>

            <p class="mx-auto mt-3 max-w-sm text-sm leading-6 text-gray-500">

                @if ($buscar)
                    Prueba buscando con otro nombre de álbum o artista.
                @else
                    Todavía no has agregado ningún álbum. Este es el comienzo de tu archivo musical.
                @endif

            </p>

            @if ($buscar)

                <a href="{{ route('albums.index') }}"
                   class="mt-7 inline-flex rounded-xl border border-purple-400/20 bg-purple-500/10 px-5 py-3 text-sm text-purple-200 transition hover:bg-purple-500/20">
                    Volver a mi colección
                </a>

            @else

                <a href="{{ route('albums.create') }}"
                   class="mt-7 inline-flex rounded-xl border border-purple-400/20 bg-purple-500/10 px-5 py-3 text-sm text-purple-200 transition hover:bg-purple-500/20">
                    Agregar mi primer álbum
                </a>

            @endif

        </div>

    @endif

@endsection

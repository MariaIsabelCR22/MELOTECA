
@extends('layouts.meloteca')

@section('title', 'Editar álbum')

@section('content')

<div class="mx-auto max-w-3xl">

    <div class="mb-10">

        <a href="{{ route('albums.index') }}"
           class="text-xs tracking-wide text-gray-500 transition hover:text-purple-300">
            ← Volver a mi colección
        </a>

        <div class="mt-7">

            <p class="mb-3 text-[10px] uppercase tracking-[0.3em] text-purple-300">
                Actualizando tu archivo musical
            </p>

            <h1 class="text-4xl font-semibold tracking-tight text-white">
                Editar álbum<span class="text-purple-400">.</span>
            </h1>

            <p class="mt-3 text-sm text-gray-500">
                Modifica los detalles de este disco cuando quieras.
            </p>

        </div>

    </div>


    <!-- FORMULARIO DE ACTUALIZACIÓN -->
    <div class="overflow-hidden rounded-2xl border border-white/[0.08] bg-[#141219] shadow-2xl shadow-black/20">

        <form action="{{ route('albums.update', $album) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="border-b border-white/[0.07] px-6 py-5 sm:px-8">

                <p class="text-[10px] uppercase tracking-[0.25em] text-gray-500">
                    Información del disco
                </p>

            </div>

            <div class="p-6 sm:p-8">

                @if ($album->portada)

                    <div class="mb-9 rounded-xl border border-white/[0.07] bg-white/[0.02] p-5">

                        <p class="mb-4 text-[10px] uppercase tracking-[0.25em] text-gray-500">
                            Portada actual
                        </p>

                        <div class="flex flex-col items-start gap-5 sm:flex-row sm:items-center">

                            <img
                                src="{{ asset('storage/' . $album->portada) }}"
                                alt="Portada actual de {{ $album->nombre }}"
                                class="h-36 w-36 rounded-xl border border-white/10 object-cover shadow-xl"
                            >

                            <div>

                                <p class="font-medium text-white">
                                    {{ $album->nombre }}
                                </p>

                                <p class="mt-1 text-sm text-purple-300">
                                    {{ $album->artista }}
                                </p>

                                <p class="mt-3 text-xs text-gray-500">
                                    Puedes conservar esta portada, reemplazarla o eliminarla.
                                </p>

                            </div>

                        </div>

                    </div>

                @endif

                @include('albums.partials.form')

                <div class="mt-10 flex flex-wrap items-center gap-3 border-t border-white/[0.07] pt-7">

                    <button type="submit"
                            class="rounded-xl border border-purple-400/20 bg-purple-500/15 px-6 py-3.5 text-sm font-medium text-purple-200 transition hover:border-purple-400/40 hover:bg-purple-500/25">
                        Guardar cambios
                    </button>

                    <a href="{{ route('albums.index') }}"
                       class="rounded-xl px-6 py-3.5 text-sm text-gray-500 transition hover:bg-white/[0.04] hover:text-white">
                        Cancelar
                    </a>

                </div>

            </div>

        </form>


        <!-- ELIMINAR ÁLBUM -->
        <div class="border-t border-red-500/10 bg-red-500/[0.025] px-6 py-6 sm:px-8">

            <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-center">

                <div>

                    <p class="text-sm font-medium text-red-300">
                        Eliminar este álbum
                    </p>

                    <p class="mt-1 max-w-md text-xs leading-5 text-gray-500">
                        Esta acción eliminará el álbum de tu colección y no se podrá deshacer.
                    </p>

                </div>

                <form action="{{ route('albums.destroy', $album) }}"
                      method="POST"
                      onsubmit="return confirm('¿Estás seguro de que deseas eliminar este álbum? Esta acción no se puede deshacer.')">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="shrink-0 rounded-xl border border-red-500/20 bg-red-500/[0.07] px-5 py-3 text-xs font-medium text-red-300 transition hover:border-red-500/40 hover:bg-red-500/15 hover:text-red-200">
                        Eliminar álbum
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection

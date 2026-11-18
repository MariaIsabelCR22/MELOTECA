
@extends('layouts.meloteca')

@section('title', 'Agregar álbum')

@section('content')

<div class="mx-auto max-w-3xl">

    <div class="mb-10">
        <a href="{{ route('albums.index') }}"
           class="text-xs tracking-wide text-gray-500 transition hover:text-purple-300">
            ← Volver a mi colección
        </a>

        <div class="mt-7">
            <p class="mb-3 text-[10px] uppercase tracking-[0.3em] text-purple-300">
                Ampliando tu archivo musical
            </p>

            <h1 class="text-4xl font-semibold tracking-tight text-white">
                Nuevo álbum<span class="text-purple-400">.</span>
            </h1>

            <p class="mt-3 text-sm text-gray-500">
                Guarda un nuevo disco en tu colección personal.
            </p>
        </div>
    </div>

    <form action="{{ route('albums.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="overflow-hidden rounded-2xl border border-white/[0.08] bg-[#141219] shadow-2xl shadow-black/20">

        @csrf

        <div class="border-b border-white/[0.07] px-6 py-5 sm:px-8">
            <p class="text-[10px] uppercase tracking-[0.25em] text-gray-500">
                Información del disco
            </p>
            <p class="mt-1 text-xs text-gray-600">
                Los campos marcados con * son obligatorios.
            </p>
        </div>

        <div class="p-6 sm:p-8">
            @include('albums.partials.form')

            <div class="mt-10 flex flex-wrap items-center gap-3 border-t border-white/[0.07] pt-7">

                <button type="submit"
                        class="rounded-xl border border-purple-400/20 bg-purple-500/15 px-6 py-3.5 text-sm font-medium text-purple-200 transition hover:border-purple-400/40 hover:bg-purple-500/25">
                    Guardar álbum
                </button>

                <a href="{{ route('albums.index') }}"
                   class="rounded-xl px-6 py-3.5 text-sm text-gray-500 transition hover:bg-white/[0.04] hover:text-white">
                    Cancelar
                </a>

            </div>
        </div>

    </form>

    <p class="mt-6 text-center text-[10px] uppercase tracking-[0.2em] text-gray-700">
        Cada disco tiene una historia
    </p>

</div>

@endsection

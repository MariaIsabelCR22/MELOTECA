
<div class="space-y-7">

    <!-- NOMBRE -->
    <div>

        <label for="nombre" class="mb-2.5 block text-xs font-medium tracking-wide text-gray-300">
            Nombre del álbum <span class="text-purple-400">*</span>
        </label>

        <input
            type="text"
            id="nombre"
            name="nombre"
            value="{{ old('nombre', $album->nombre ?? '') }}"
            required
            placeholder="Ej. 1940 Carmen"
            class="w-full rounded-xl border border-white/[0.08] bg-[#0e0c12] px-4 py-3.5 text-sm text-white placeholder-gray-700 outline-none transition focus:border-purple-400/50 focus:ring-2 focus:ring-purple-500/10"
        >

        @error('nombre')
            <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
        @enderror

    </div>


    <!-- ARTISTA -->
    <div>

        <label for="artista" class="mb-2.5 block text-xs font-medium tracking-wide text-gray-300">
            Artista <span class="text-purple-400">*</span>
        </label>

        <input
            type="text"
            id="artista"
            name="artista"
            value="{{ old('artista', $album->artista ?? '') }}"
            required
            placeholder="Ej. Mon Laferte"
            class="w-full rounded-xl border border-white/[0.08] bg-[#0e0c12] px-4 py-3.5 text-sm text-white placeholder-gray-700 outline-none transition focus:border-purple-400/50 focus:ring-2 focus:ring-purple-500/10"
        >

        @error('artista')
            <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
        @enderror

    </div>


    <!-- GÉNERO Y AÑO -->
    <div class="grid gap-6 sm:grid-cols-2">

        <div>

            <label for="genero" class="mb-2.5 block text-xs font-medium tracking-wide text-gray-300">
                Género musical
            </label>

            <input
                type="text"
                id="genero"
                name="genero"
                value="{{ old('genero', $album->genero ?? '') }}"
                placeholder="Ej. Rock alternativo"
                class="w-full rounded-xl border border-white/[0.08] bg-[#0e0c12] px-4 py-3.5 text-sm text-white placeholder-gray-700 outline-none transition focus:border-purple-400/50 focus:ring-2 focus:ring-purple-500/10"
            >

            @error('genero')
                <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
            @enderror

        </div>


        <div>

            <label for="anio_lanzamiento" class="mb-2.5 block text-xs font-medium tracking-wide text-gray-300">
                Año de lanzamiento
            </label>

            <input
                type="number"
                id="anio_lanzamiento"
                name="anio_lanzamiento"
                value="{{ old('anio_lanzamiento', $album->anio_lanzamiento ?? '') }}"
                min="1000"
                max="2100"
                placeholder="Ej. 2024"
                class="w-full rounded-xl border border-white/[0.08] bg-[#0e0c12] px-4 py-3.5 text-sm text-white placeholder-gray-700 outline-none transition focus:border-purple-400/50 focus:ring-2 focus:ring-purple-500/10"
            >

            @error('anio_lanzamiento')
                <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
            @enderror

        </div>

    </div>


    <!-- FORMATO -->
    <div>

        <label for="formato" class="mb-2.5 block text-xs font-medium tracking-wide text-gray-300">
            Formato
        </label>

        <select
            id="formato"
            name="formato"
            class="w-full rounded-xl border border-white/[0.08] bg-[#0e0c12] px-4 py-3.5 text-sm text-white outline-none transition focus:border-purple-400/50 focus:ring-2 focus:ring-purple-500/10"
        >

            <option value="">Selecciona un formato</option>

            <option value="Digital" @selected(old('formato', $album->formato ?? '') == 'Digital')>
                Digital
            </option>

            <option value="CD" @selected(old('formato', $album->formato ?? '') == 'CD')>
                CD
            </option>

            <option value="Vinilo" @selected(old('formato', $album->formato ?? '') == 'Vinilo')>
                Vinilo
            </option>

        </select>

        @error('formato')
            <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
        @enderror

    </div>


    <!-- DESCRIPCIÓN -->
    <div>

        <label for="descripcion" class="mb-2.5 block text-xs font-medium tracking-wide text-gray-300">
            Descripción
        </label>

        <textarea
            id="descripcion"
            name="descripcion"
            rows="4"
            placeholder="Escribe algo sobre este álbum..."
            class="w-full resize-y rounded-xl border border-white/[0.08] bg-[#0e0c12] px-4 py-3.5 text-sm leading-6 text-white placeholder-gray-700 outline-none transition focus:border-purple-400/50 focus:ring-2 focus:ring-purple-500/10"
        >{{ old('descripcion', $album->descripcion ?? '') }}</textarea>

        @error('descripcion')
            <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
        @enderror

    </div>


    <!-- PORTADA -->
    <div>

        <label for="portada" class="mb-3 block text-xs font-medium tracking-wide text-gray-300">
            Portada del álbum
        </label>

        <div class="rounded-xl border border-dashed border-purple-300/20 bg-purple-500/[0.025] p-5 transition hover:border-purple-300/40">

            <input
                type="file"
                id="portada"
                name="portada"
                accept=".jpg,.jpeg,.png,.webp"
                class="w-full text-xs text-gray-400 file:mr-4 file:rounded-lg file:border-0 file:bg-purple-500/15 file:px-4 file:py-2.5 file:text-xs file:font-medium file:text-purple-200 file:transition hover:file:bg-purple-500/25"
            >

            <p class="mt-3 text-[11px] leading-5 text-gray-600">
                Selecciona una imagen para identificar este disco. Formatos JPG, JPEG, PNG y WEBP. Máximo 2 MB.
            </p>

        </div>

        @error('portada')
            <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
        @enderror


        <!-- OPCIÓN PARA ELIMINAR PORTADA -->
        @if (!empty($album->portada))

            <label class="mt-5 flex cursor-pointer items-start gap-3 rounded-xl border border-red-500/10 bg-red-500/[0.025] p-4 transition hover:border-red-500/25">

                <input
                    type="checkbox"
                    name="eliminar_portada"
                    value="1"
                    class="mt-0.5 h-4 w-4 rounded border-white/20 bg-[#0e0c12] text-red-400 focus:ring-red-500/20 focus:ring-offset-0"
                >

                <span>

                    <span class="block text-xs font-medium text-red-300">
                        Eliminar portada actual
                    </span>

                    <span class="mt-1 block text-[11px] leading-5 text-gray-500">
                        Si marcas esta opción y guardas los cambios sin subir otra imagen, el álbum quedará sin portada.
                    </span>

                </span>

            </label>

        @endif

    </div>

</div>

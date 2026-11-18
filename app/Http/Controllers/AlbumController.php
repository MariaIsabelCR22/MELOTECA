<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    // Mostrar los álbumes del usuario autenticado
    public function index(Request $request)
    {
        $buscar = $request->input('buscar');

        $albums = auth()->user()->albums()
            ->when($buscar, function ($query) use ($buscar) {
                $query->where(function ($consulta) use ($buscar) {
                    $consulta->where('nombre', 'like', "%{$buscar}%")
                        ->orWhere('artista', 'like', "%{$buscar}%");
                });
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('albums.index', compact('albums', 'buscar'));
    }

    // Mostrar el formulario para registrar un álbum
    public function create()
    {
        return view('albums.create');
    }

    // Guardar un nuevo álbum
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'artista' => 'required|string|max:255',
            'genero' => 'nullable|string|max:100',
            'anio_lanzamiento' => 'nullable|integer|min:1000|max:2100',
            'formato' => 'nullable|string|max:100',
            'descripcion' => 'nullable|string',
            'portada' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('portada')) {
            $validated['portada'] = $request->file('portada')
                ->store('portadas', 'public');
        }

        auth()->user()->albums()->create($validated);

        return redirect()->route('albums.index')
            ->with('success', '¡Álbum registrado correctamente!');
    }

    // Mostrar el formulario para editar un álbum
    public function edit(Album $album)
    {
        $album = auth()->user()->albums()->findOrFail($album->id);

        return view('albums.edit', compact('album'));
    }

    // Actualizar un álbum existente
    public function update(Request $request, Album $album)
    {
        $album = auth()->user()->albums()->findOrFail($album->id);

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'artista' => 'required|string|max:255',
            'genero' => 'nullable|string|max:100',
            'anio_lanzamiento' => 'nullable|integer|min:1000|max:2100',
            'formato' => 'nullable|string|max:100',
            'descripcion' => 'nullable|string',
            'portada' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'eliminar_portada' => 'nullable|boolean',
        ]);

        // Si se sube una portada nueva, reemplaza la anterior
        if ($request->hasFile('portada')) {

            if ($album->portada) {
                Storage::disk('public')->delete($album->portada);
            }

            $validated['portada'] = $request->file('portada')
                ->store('portadas', 'public');

        }

        // Si no se sube una nueva, pero se marca eliminar portada
        elseif ($request->boolean('eliminar_portada')) {

            if ($album->portada) {
                Storage::disk('public')->delete($album->portada);
            }

            $validated['portada'] = null;

        }

        // Este campo solo es una instrucción del formulario, no una columna
        unset($validated['eliminar_portada']);

        $album->update($validated);

        return redirect()->route('albums.index')
            ->with('success', '¡Álbum actualizado correctamente!');
    }

    // Eliminar un álbum
    public function destroy(Album $album)
    {
        $album = auth()->user()->albums()->findOrFail($album->id);

        if ($album->portada) {
            Storage::disk('public')->delete($album->portada);
        }

        $album->delete();

        return redirect()->route('albums.index')
            ->with('success', 'Álbum eliminado correctamente.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MascotasController extends Controller
{
    public function index()
    {
        $mascotas = Mascota::paginate(10);
        return view('mascotas.index', compact('mascotas'));
    }

    public function create()
    {
        return view('mascotas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_mascota' => 'required|string|max:255',
            'nombre_dueno' => 'required|string|max:255',
            'raza' => 'nullable|string|max:255',
            'edad' => 'nullable|integer|min:0|max:100',
            'tamano' => 'nullable|string|max:50',
            'peso' => 'nullable|numeric|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Manejar la imagen
        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('mascotas', 'public');
        }

        Mascota::create($data);

        return redirect()->route('mascotas.index')->with('success', 'Mascota creada correctamente.');
    }

    public function show(Mascota $mascota)
    {
        return view('mascotas.show', compact('mascota'));
    }

    public function edit(Mascota $mascota)
    {
        return view('mascotas.edit', compact('mascota'));
    }

    public function update(Request $request, Mascota $mascota)
    {
        $request->validate([
            'nombre_mascota' => 'required|string|max:255',
            'nombre_dueno' => 'required|string|max:255',
            'raza' => 'nullable|string|max:255',
            'edad' => 'nullable|integer|min:0|max:100',
            'tamano' => 'nullable|string|max:50',
            'peso' => 'nullable|numeric|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Manejar la imagen
        if ($request->hasFile('imagen')) {
            // Eliminar imagen anterior si existe
            if ($mascota->imagen && Storage::disk('public')->exists($mascota->imagen)) {
                Storage::disk('public')->delete($mascota->imagen);
            }
            $data['imagen'] = $request->file('imagen')->store('mascotas', 'public');
        }

        $mascota->update($data);

        return redirect()->route('mascotas.index')->with('success', 'Mascota actualizada correctamente.');
    }

    public function destroy(Mascota $mascota)
    {
        if (!auth()->user()->isAdmin()) {
            return redirect()->route('mascotas.index')
                            ->with('error', 'No tienes permiso para eliminar mascotas.');
        }

        // Eliminar imagen si existe
        if ($mascota->imagen && Storage::disk('public')->exists($mascota->imagen)) {
            Storage::disk('public')->delete($mascota->imagen);
        }

        $mascota->delete();

        return redirect()->route('mascotas.index')->with('success', 'Mascota eliminada.');
    }
}
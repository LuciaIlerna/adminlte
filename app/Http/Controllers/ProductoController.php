<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function index()
    {
        $producto = producto::paginate(10);
        return view('producto.index', compact('producto'));
    }

    public function create()
    {
        return view('producto.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'archivo_pdf' => 'nullable|mimes:pdf|max:5120',
        ]);

        $data = $request->all();

        // Manejar la imagen
        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('productos', 'public');
        }

        // Manejar el archivo PDF
        if ($request->hasFile('archivo_pdf')) {
            $data['archivo_pdf'] = $request->file('archivo_pdf')->store('productos/pdfs', 'public');
        }

        producto::create($data);

        return redirect()->route('producto.index')
                         ->with('success', 'Producto creado exitosamente.');
    }

    public function show(producto $producto)
    {
        return view('producto.show', compact('producto'));
    }

    public function edit(producto $producto)
    {
        return view('producto.edit', compact('producto'));
    }

    public function update(Request $request, producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'archivo_pdf' => 'nullable|mimes:pdf|max:5120',
        ]);

        $data = $request->all();

        // Manejar la imagen
        if ($request->hasFile('imagen')) {
            // Eliminar imagen anterior si existe
            if ($producto->imagen && Storage::disk('public')->exists($producto->imagen)) {
                Storage::disk('public')->delete($producto->imagen);
            }
            $data['imagen'] = $request->file('imagen')->store('productos', 'public');
        }

        // Manejar el archivo PDF
        if ($request->hasFile('archivo_pdf')) {
            // Eliminar PDF anterior si existe
            if ($producto->archivo_pdf && Storage::disk('public')->exists($producto->archivo_pdf)) {
                Storage::disk('public')->delete($producto->archivo_pdf);
            }
            $data['archivo_pdf'] = $request->file('archivo_pdf')->store('productos/pdfs', 'public');
        }

        $producto->update($data);

        return redirect()->route('producto.index')
                         ->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(producto $producto)
    {
        // Verificar si el usuario es admin
        if (!auth()->user()->isAdmin()) {
            return redirect()->route('producto.index')
                            ->with('error', 'No tienes permiso para eliminar productos.');
        }

        // Eliminar imagen si existe
        if ($producto->imagen && Storage::disk('public')->exists($producto->imagen)) {
            Storage::disk('public')->delete($producto->imagen);
        }

        // Eliminar PDF si existe
        if ($producto->archivo_pdf && Storage::disk('public')->exists($producto->archivo_pdf)) {
            Storage::disk('public')->delete($producto->archivo_pdf);
        }

        $producto->delete();

        return redirect()->route('producto.index')
                         ->with('success', 'Producto eliminado exitosamente.');
    }
}
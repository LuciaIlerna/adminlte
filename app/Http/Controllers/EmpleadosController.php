<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadosController extends Controller
{
    public function index()
    {
        $empleados = Empleado::paginate(10);
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'puesto' => 'required|string|max:100',
            'telefono' => 'nullable|string|max:30',
            'email' => 'required|email|unique:empleados,email',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Manejar la imagen
        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('empleados', 'public');
        }

        Empleado::create($data);

        return redirect()->route('empleados.index')->with('success', 'Empleado creado correctamente.');
    }

    public function show(Empleado $empleado)
    {
        return view('empleados.show', compact('empleado'));
    }

    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'puesto' => 'required|string|max:100',
            'telefono' => 'nullable|string|max:30',
            'email' => 'required|email|unique:empleados,email,' . $empleado->id,
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Manejar la imagen
        if ($request->hasFile('imagen')) {
            // Eliminar imagen anterior si existe
            if ($empleado->imagen && Storage::disk('public')->exists($empleado->imagen)) {
                Storage::disk('public')->delete($empleado->imagen);
            }
            $data['imagen'] = $request->file('imagen')->store('empleados', 'public');
        }

        $empleado->update($data);

        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente.');
    }

    public function destroy(Empleado $empleado)
    {
        if (!auth()->user()->isAdmin()) {
            return redirect()->route('empleados.index')
                            ->with('error', 'No tienes permiso para eliminar empleados.');
        }

        // Eliminar imagen si existe
        if ($empleado->imagen && Storage::disk('public')->exists($empleado->imagen)) {
            Storage::disk('public')->delete($empleado->imagen);
        }

        $empleado->delete();

        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado.');
    }
}
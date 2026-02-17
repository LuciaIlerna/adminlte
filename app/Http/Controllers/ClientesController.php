<?php
namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Clientes::paginate(10);
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Manejar la foto
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('clientes', 'public');
        }

        Clientes::create($data);

        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente creado exitosamente.');
    }

    public function show(Clientes $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Clientes $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Clientes $cliente)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email,' . $cliente->id,
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Manejar la foto
        if ($request->hasFile('foto')) {
            // Eliminar foto anterior si existe
            if ($cliente->foto && \Storage::disk('public')->exists($cliente->foto)) {
                \Storage::disk('public')->delete($cliente->foto);
            }
            $data['foto'] = $request->file('foto')->store('clientes', 'public');
        }

        $cliente->update($data);

        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente actualizado exitosamente.');
    }

    public function destroy(Clientes $cliente)
    {
        // Verificar si el usuario es admin
        if (!auth()->user()->isAdmin()) {
            return redirect()->route('clientes.index')
                            ->with('error', 'No tienes permiso para eliminar clientes.');
        }

        // Eliminar foto si existe
        if ($cliente->foto && \Storage::disk('public')->exists($cliente->foto)) {
            \Storage::disk('public')->delete($cliente->foto);
        }

        $cliente->delete();

        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente eliminado exitosamente.');
    }
}
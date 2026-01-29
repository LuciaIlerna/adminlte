<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CitasController extends Controller
{
    public function index()
    {
        $citas = Cita::all();
        return view('citas.index', compact('citas'));
    }

    public function create()
    {
        return view('citas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'nombre_mascota' => 'required|string|max:255',
        'tipo_cita' => 'required|string|max:255',
        'fecha_hora' => ['required', 'date_format:Y-m-d\TH:i'],
        ]);

        $data = $request->all();
        $data['fecha_hora'] = Carbon::createFromFormat('Y-m-d\TH:i', $request->fecha_hora)
                             ->format('Y-m-d H:i:s');

        Cita::create($data);

        return redirect()->route('citas.index')->with('success', 'Cita creada correctamente.');
    }

    public function show(Cita $cita)
    {
        return view('citas.show', compact('cita'));
    }

    public function edit(Cita $cita)
    {
        return view('citas.edit', compact('cita'));
    }

    public function update(Request $request, Cita $cita)
    {
        $request->validate([
            'nombre_mascota' => 'required|string|max:255',
            'tipo_cita' => 'required|string|max:255',
            'fecha_hora' => 'required|date_format:Y-m-d H:i',
        ]);

        $cita->update($request->all());

        return redirect()->route('citas.index')->with('success', 'Cita actualizada correctamente.');
    }

    public function destroy(Cita $cita)
    {
        $cita->delete();

        return redirect()->route('citas.index')->with('success', 'Cita eliminada.');
    }
}
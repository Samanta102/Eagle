<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Usuario;
use App\Models\Patineta;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::with(['usuario', 'patineta'])->get();
        return view('citas.index', compact('citas'));
    }

    public function create()
    {
        $usuarios = Usuario::all();
        $patinetas = Patineta::all();
        return view('citas.create', compact('usuarios', 'patinetas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'id_patineta' => 'required|exists:patinetas,id_patineta',
            'fecha' => 'required|date',
            'hora' => 'required',
            'motivo' => 'required'
        ]);

        Cita::create($request->all());
        return redirect()->route('citas.index')->with('success', 'Cita registrada correctamente.');
    }

    public function edit(Cita $cita)
    {
        $usuarios = Usuario::all();
        $patinetas = Patineta::all();
        return view('citas.edit', compact('cita', 'usuarios', 'patinetas'));
    }

    public function update(Request $request, Cita $cita)
    {
        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'id_patineta' => 'required|exists:patinetas,id_patineta',
            'fecha' => 'required|date',
            'hora' => 'required',
            'motivo' => 'required'
        ]);

        $cita->update($request->all());
        return redirect()->route('citas.index')->with('success', 'Cita actualizada correctamente.');
    }

    public function destroy(Cita $cita)
    {
        $cita->delete();
        return redirect()->route('citas.index')->with('success', 'Cita eliminada correctamente.');
    }
}

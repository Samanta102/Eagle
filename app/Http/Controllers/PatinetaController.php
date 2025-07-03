<?php

namespace App\Http\Controllers;

use App\Models\Patineta;
use App\Models\Usuario;
use Illuminate\Http\Request;

class PatinetaController extends Controller
{
    public function index()
    {
        $patinetas = Patineta::with('usuario')->get();
        return view('patinetas.index', compact('patinetas'));
    }

    public function create()
    {
        $usuarios = Usuario::all();
        return view('patinetas.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'numero_serial' => 'required',
            'marca' => 'required|max:20',
            'color' => 'required|max:20',
            'fecha_registro' => 'required|date',
        ]);

        Patineta::create($request->all());

        return redirect()->route('patinetas.index')->with('success', 'Patineta creada exitosamente.');
    }

    public function edit(Patineta $patineta)
    {
        $usuarios = Usuario::all();
        return view('patinetas.edit', compact('patineta', 'usuarios'));
    }

    public function update(Request $request, Patineta $patineta)
    {
        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'numero_serial' => 'required',
            'marca' => 'required|max:20',
            'color' => 'required|max:20',
            'fecha_registro' => 'required|date',
        ]);

        $patineta->update($request->all());

        return redirect()->route('patinetas.index')->with('success', 'Patineta actualizada correctamente.');
    }

    public function destroy(Patineta $patineta)
    {
        if ($patineta->citas()->count() > 0) {
            return redirect()->route('patinetas.index')->with('error', 'No puedes eliminar esta patineta porque tiene citas registradas.');
        }

        $patineta->delete();
        return redirect()->route('patinetas.index')->with('success', 'Patineta eliminada correctamente.');
    }
}


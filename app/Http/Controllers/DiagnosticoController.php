<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;
use App\Models\Usuario;
use App\Models\FormaPago;
use App\Models\Cita;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{
    public function index()
    {
        $diagnosticos = Diagnostico::with(['usuario', 'formaPago'])->get();
        return view('diagnosticos.index', compact('diagnosticos'));
    }

    public function create()
    {
        $usuarios = \App\Models\Usuario::all(); // O Usuario::class si tu modelo se llama así
        $formasPago = \App\Models\FormaPago::all();
        $citas = \App\Models\Cita::all(); // Todas las citas por si necesitas

        return view('diagnosticos.create', compact('usuarios', 'formasPago', 'citas'));
    }


    public function store(Request $request)
    {
        Diagnostico::create($request->all());
        return redirect()->route('diagnosticos.index')->with('success', 'Diagnóstico creado correctamente.');
    }

    public function edit($id)
    {
        $diagnostico = Diagnostico::findOrFail($id);
        $usuarios = Usuario::all();
        $formasPago = FormaPago::all();
        $citas = Cita::all();

        return view('diagnosticos.edit', compact('diagnostico', 'usuarios', 'formasPago', 'citas'));
    }

    public function update(Request $request, $id)
    {
        $diagnostico = Diagnostico::findOrFail($id);
        $diagnostico->update($request->all());
        return redirect()->route('diagnosticos.index')->with('success', 'Diagnóstico actualizado.');
    }

    public function destroy($id)
    {
        Diagnostico::destroy($id);
        return redirect()->route('diagnosticos.index')->with('success', 'Diagnóstico eliminado.');
    }
}

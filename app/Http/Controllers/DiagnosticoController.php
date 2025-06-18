<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;
use App\Models\Cita;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{
    public function index()
    {
        $diagnosticos = Diagnostico::with('cita')->get();
        return view('diagnosticos.index', compact('diagnosticos'));
    }

    public function create()
    {
        $citas = Cita::all();
        return view('diagnosticos.create', compact('citas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_cita' => 'required|exists:citas,id_cita',
            'descripcion' => 'required|string',
            'costo_total' => 'required|numeric|min:0',
        ]);

        Diagnostico::create($request->all());

        return redirect()->route('diagnosticos.index')->with('success', 'Diagnóstico creado correctamente.');
    }

    public function edit($id)
    {
        $diagnostico = Diagnostico::findOrFail($id);
        $citas = Cita::all();
        return view('diagnosticos.edit', compact('diagnostico', 'citas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_cita' => 'required|exists:citas,id_cita',
            'descripcion' => 'required|string',
            'costo_total' => 'required|numeric|min:0',
        ]);

        $diagnostico = Diagnostico::findOrFail($id);
        $diagnostico->update($request->all());

        return redirect()->route('diagnosticos.index')->with('success', 'Diagnóstico actualizado correctamente.');
    }

    public function destroy($id)
    {
        Diagnostico::destroy($id);
        return redirect()->route('diagnosticos.index')->with('success', 'Diagnóstico eliminado.');
    }
}


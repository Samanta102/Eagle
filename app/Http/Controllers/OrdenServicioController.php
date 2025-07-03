<?php

namespace App\Http\Controllers;

use App\Models\OrdenServicio;
use App\Models\Cita;
use Illuminate\Http\Request;

class OrdenServicioController extends Controller
{
    public function index()
    {
        $ordenes = OrdenServicio::with('cita')->get();
        return view('ordenes_servicio.index', compact('ordenes'));
    }

    public function create()
    {
        $citas = Cita::all();
        return view('ordenes_servicio.create', compact('citas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_cita' => 'required|exists:citas,id_cita',
            'fecha_fin' => 'required|date',
        ]);

        OrdenServicio::create($request->all());
        return redirect()->route('ordenes_servicio.index')->with('success', 'Orden creada correctamente');
    }

    public function edit($id)
    {
        $orden = OrdenServicio::findOrFail($id);
        $citas = Cita::all();
        return view('ordenes_servicio.edit', compact('orden', 'citas'));
    }

    public function update(Request $request, $id)
    {
        $orden = OrdenServicio::findOrFail($id);

        $request->validate([
            'id_cita' => 'required|exists:citas,id_cita',
            'fecha_fin' => 'required|date',
        ]);

        $orden->update($request->all());
        return redirect()->route('ordenes_servicio.index')->with('success', 'Orden actualizada correctamente');
    }

    public function destroy($id)
    {
        OrdenServicio::destroy($id);
        return redirect()->route('ordenes_servicio.index')->with('success', 'Orden eliminada correctamente');
    }
}

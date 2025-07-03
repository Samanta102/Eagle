<?php

namespace App\Http\Controllers;

use App\Models\Mantenimiento;
use App\Models\OrdenServicio;
use App\Models\Producto;
use Illuminate\Http\Request;

class MantenimientoController extends Controller
{
    public function index()
    {
        $mantenimientos = Mantenimiento::with('orden', 'producto')->get();
        return view('mantenimientos.index', compact('mantenimientos'));
    }

    public function create()
    {
        $ordenes = OrdenServicio::all();
        $productos = Producto::all();
        return view('mantenimientos.create', compact('ordenes', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_orden' => 'required|exists:ordenes_servicio,id_orden',
            'id_producto' => 'required|exists:productos,id_producto',
            'total' => 'required|numeric|min:0',
            'fecha' => 'required|date',
        ]);

        Mantenimiento::create($request->all());
        return redirect()->route('mantenimientos.index')->with('success', 'Mantenimiento creado correctamente.');
    }

    public function edit($id)
    {
        $mantenimiento = Mantenimiento::findOrFail($id);
        $ordenes = OrdenServicio::all();
        $productos = Producto::all();
        return view('mantenimientos.edit', compact('mantenimiento', 'ordenes', 'productos'));
    }

    public function update(Request $request, $id)
    {
        $mantenimiento = Mantenimiento::findOrFail($id);

        $request->validate([
            'id_orden' => 'required|exists:ordenes_servicio,id_orden',
            'id_producto' => 'required|exists:productos,id_producto',
            'total' => 'required|numeric|min:0',
            'fecha' => 'required|date',
        ]);

        $mantenimiento->update($request->all());
        return redirect()->route('mantenimientos.index')->with('success', 'Mantenimiento actualizado correctamente.');
    }

    public function destroy($id)
    {
        Mantenimiento::destroy($id);
        return redirect()->route('mantenimientos.index')->with('success', 'Mantenimiento eliminado correctamente.');
    }
}


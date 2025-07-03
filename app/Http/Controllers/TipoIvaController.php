<?php

namespace App\Http\Controllers;

use App\Models\TipoIva;
use App\Models\Producto;
use Illuminate\Http\Request;

class TipoIvaController extends Controller
{
    public function index()
    {
        $tipos = TipoIva::with('producto')->get();
        return view('tipos_iva.index', compact('tipos'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('tipos_iva.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_producto' => 'required|exists:productos,id_producto',
            'nombre_iva' => 'required|max:50',
            'porcentaje' => 'required',
        ]);

        TipoIva::create($request->all());
        return redirect()->route('tipos-iva.index')->with('success', 'Tipo de IVA creado.');
    }

    public function edit($id)
    {
        $tipo = TipoIva::findOrFail($id);
        $productos = Producto::all();
        return view('tipos_iva.edit', compact('tipo', 'productos'));
    }

    public function update(Request $request, $id)
    {
        $tipo = TipoIva::findOrFail($id);

        $request->validate([
            'id_producto' => 'required|exists:productos,id_producto',
            'nombre_iva' => 'required|max:50',
            'porcentaje' => 'required',
        ]);

        $tipo->update($request->all());
        return redirect()->route('tipos-iva.index')->with('success', 'Tipo de IVA actualizado.');
    }

    public function destroy($id)
    {
        TipoIva::destroy($id);
        return redirect()->route('tipos-iva.index')->with('success', 'Tipo de IVA eliminado.');
    }
}


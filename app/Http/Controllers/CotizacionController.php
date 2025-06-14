<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cotizacion;
use App\Models\Diagnostico;
use App\Models\Usuario;
use App\Models\FormaPago;

class CotizacionController extends Controller
{
    public function index()
    {
        $cotizaciones = Cotizacion::with(['diagnostico', 'usuario', 'formaPago'])->get();
        return view('cotizaciones.index', compact('cotizaciones'));
    }

    public function create()
    {
        $diagnosticos = Diagnostico::all();
        $usuarios = Usuario::all();
        $formasPago = FormaPago::all();

        return view('cotizaciones.create', compact('diagnosticos', 'usuarios', 'formasPago'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_diagnostico' => 'required',
            'id_usuario' => 'required',
            'id_forma_pago' => 'required',
            'forma_pago' => 'required|string|max:50',
            'total' => 'required|numeric',
            'fecha_emision' => 'required|date',
        ]);

        Cotizacion::create($request->all());

        return redirect()->route('cotizaciones.index')->with('success', 'Cotización creada correctamente');
    }

    public function edit($id)
    {
        $cotizacion = Cotizacion::findOrFail($id);
        $diagnosticos = Diagnostico::all();
        $usuarios = Usuario::all();
        $formasPago = FormaPago::all();

        return view('cotizaciones.edit', compact('cotizacion', 'diagnosticos', 'usuarios', 'formasPago'));
    }

    public function update(Request $request, $id)
    {
        $cotizacion = Cotizacion::findOrFail($id);
        $cotizacion->update($request->all());

        return redirect()->route('cotizaciones.index')->with('success', 'Cotización actualizada correctamente');
    }

    public function destroy($id)
    {
        Cotizacion::destroy($id);
        return redirect()->route('cotizaciones.index')->with('success', 'Cotización eliminada');
    }
}


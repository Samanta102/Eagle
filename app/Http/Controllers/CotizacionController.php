<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Diagnostico;
use App\Models\FormaPago;
use App\Models\Cotizacion;
use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    public function index()
    {
        $cotizaciones = Cotizacion::all();
        return view('cotizaciones.index', compact('cotizaciones'));
    }

    public function create()
    {
        $usuarios = Usuario::all();
        $diagnosticos = Diagnostico::all();
        $formas_pago = FormaPago::all();

        return view('cotizaciones.create', compact('usuarios', 'diagnosticos', 'formas_pago'));
    }

    public function store(Request $request)
    {
        // ✅ Validación
        $request->validate([
    'id_usuario' => 'required|exists:usuarios,id_usuario',
    'id_diagnostico' => 'required|exists:diagnosticos,id_diagnostico',
    'id_forma_pago' => 'required|exists:formas_pago,id_forma_pago',
    'total' => 'required|numeric|min:0',
    'fecha_emicion' => 'required|date',
        ]);

        Cotizacion::create($request->all());
        return redirect()->route('cotizaciones.index')->with('success', 'Cotización creada correctamente.');
    }

    public function show($id)
    {
        $cotizacion = Cotizacion::findOrFail($id);
        return view('cotizaciones.show', compact('cotizacion'));
    }

    public function edit($id)
{
    $cotizacion = Cotizacion::findOrFail($id);
    $usuarios = Usuario::all();
    $diagnosticos = Diagnostico::all();
    $formas_pago = FormaPago::all();

    return view('cotizaciones.edit', compact('cotizacion', 'usuarios', 'diagnosticos', 'formas_pago'));
}

    public function update(Request $request, $id)
    {

        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'id_diagnostico' => 'required|exists:diagnosticos,id_diagnostico',
            'id_forma_pago' => 'required|exists:formas_pago,id_forma_pago',
            'total' => 'required|numeric|min:0',
            'fecha_emicion' => 'required|date',
        ]);

        $cotizacion = Cotizacion::findOrFail($id);
        $cotizacion->update($request->all());

        return redirect()->route('cotizaciones.index')->with('success', 'Cotización actualizada correctamente.');
    }

    public function destroy($id)
    {
        Cotizacion::destroy($id);
        return redirect()->route('cotizaciones.index')->with('success', 'Cotización eliminada.');
    }
}


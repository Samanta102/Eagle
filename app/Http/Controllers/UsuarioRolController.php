<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Http\Request;

class UsuarioRolController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::with('rol')->get();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        $roles = Rol::all();
        return view('usuarios.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_rol' => 'required|exists:roles,id_rol',
            'nombre_usuario' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'doc_identidad' => 'required|string|max:15',
            'direccion' => 'required|string|max:50',
            'telefono' => 'required|string|max:50',
            'correo' => 'required|string|email|max:50|unique:usuarios',
            'contrasena' => 'required|string',
        ]);

        Usuario::create($request->all());
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente');
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        $roles = Rol::all();
        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $request->validate([
            'id_rol' => 'required|exists:roles,id_rol',
            'nombre_usuario' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'doc_identidad' => 'required|string|max:15',
            'direccion' => 'required|string|max:50',
            'telefono' => 'required|string|max:50',
            'correo' => 'required|string|email|max:50|unique:usuarios,correo,' . $usuario->id_usuario . ',id_usuario',
            'contrasena' => 'required|string',
        ]);

        $usuario->update($request->all());
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado');
    }

    public function destroy($id)
    {
    $usuario = Usuario::with('citas')->findOrFail($id);

    if ($usuario->citas->count() > 0) {
        return redirect()->route('usuarios.index')
            ->with('error', 'No se puede eliminar el usuario porque tiene citas asociadas.');
    }

    $usuario->delete();

    return redirect()->route('usuarios.index')
        ->with('success', 'Usuario eliminado correctamente.');
}
}

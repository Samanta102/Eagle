<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Mostrar formulario de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Procesar login
    public function login(Request $request)
    {
        $usuario = Usuario::with('rol')
            ->where('doc_identidad', $request->doc_identidad)
            // ->where('contrasena', $request->contrasena) // ⚠️ Solo si no está encriptada
            ->first();

        if ($usuario) {
            Session::put('usuario', $usuario);

            if ($usuario->rol->nombre === 'Administrador') {
                return redirect('/dashboard');
            } elseif ($usuario->rol->nombre === 'Cliente') {
                return redirect('/cliente');
            } else {
                return redirect('/login')->with('error', 'Rol no reconocido');
            }
        } else {
            return redirect('/login')->with('error', 'Credenciales incorrectas');
        }
    }

    // Cerrar sesión
    public function logout()
    {
        Session::forget('usuario');
        return redirect('/login');
    }

    // Mostrar formulario de registro
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Procesar registro
    public function register(Request $request)
    {
        $request->validate([
            'doc_identidad'   => 'required|unique:usuarios,doc_identidad',
            'nombre_usuario'  => 'required|string|max:50',
            'apellido'        => 'required|string|max:50',
            'direccion'       => 'required|string|max:50',
            'telefono'        => 'required|string|max:50',
            'correo'          => 'required|email|unique:usuarios,correo',
            'contrasena'      => 'required|string|min:4',
        ]);

        $clienteRol = \App\Models\Rol::where('nombre', 'Cliente')->first();

        if (!$clienteRol) {
            return redirect()->back()->with('error', 'Rol Cliente no encontrado');
        }

        $usuario = new Usuario([
            'id_rol'          => $clienteRol->id_rol,
            'nombre_usuario'  => $request->nombre_usuario,
            'apellido'        => $request->apellido,
            'doc_identidad'   => $request->doc_identidad,
            'direccion'       => $request->direccion,
            'telefono'        => $request->telefono,
            'correo'          => $request->correo,
            'contrasena'      => bcrypt($request->contrasena), // Se encripta
        ]);

        $usuario->save();

        // Autologin después del registro
        Session::put('usuario', $usuario);
        return redirect()->route('cliente')->with('success', 'Registro exitoso');
    }
}



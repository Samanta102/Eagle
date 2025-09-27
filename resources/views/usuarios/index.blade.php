@extends('layouts.app')
@section('title', 'Lista de Usuarios | Taller Mecánico')
@section('content')

    <style>
        .table-padding { padding: 15px 20px !important; }
        .table-padding-td { padding: 12px 18px !important; }
        
        /* Badge para roles */
        .role-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8em;
            font-weight: 600;
            text-align: center;
            min-width: 80px;
        }

        .role-admin {
            background-color: rgba(231, 76, 60, 0.2);
            color: #e74c3c;
        }

        .role-mecanico {
            background-color: rgba(52, 152, 219, 0.2);
            color: #3498db;
        }

        .role-cliente {
            background-color: rgba(46, 204, 113, 0.2);
            color: #2ecc71;
        }
    </style>

    <div class="main-content">
        <div style="width: 100%; max-width: 1200px; margin: 30px auto 20px auto; display: flex; justify-content: space-between; align-items: center;">
            <h1 style="color: #2c3e50; font-weight: 600; margin: 0; display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-users"></i> Lista de Usuarios
            </h1>
            <a href="{{ route('usuarios.create') }}" style="background: #3498db; color: #fff; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: 500; display: inline-flex; align-items: center; gap: 8px;">
                <i class="fas fa-plus"></i> Nuevo Usuario
            </a>
        </div>

        @if(session('success'))
            <div style="background: #d4edda; color: #155724; border-left: 4px solid #c3e6cb; padding: 12px 20px; border-radius: 6px; margin-bottom: 15px; min-width: 400px; display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div style="background: #f8d7da; color: #721c24; border-left: 4px solid #f5c6cb; padding: 12px 20px; border-radius: 6px; margin-bottom: 15px; min-width: 400px; display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            </div>
        @endif

        @if($usuarios->count() > 0)
            <table style="margin: 0 auto; border-collapse: collapse; min-width: 1200px; background: #fff; border-radius: 10px; box-shadow: 0 0 20px rgba(0,0,0,0.07); overflow: hidden;">
                <thead>
                    <tr style="background: #2c3e50; color: #ffffff;">
                        <th class="table-padding">Nombre</th>
                        <th class="table-padding">Apellido</th>
                        <th class="table-padding">Rol</th>
                        <th class="table-padding">Correo</th>
                        <th class="table-padding">Teléfono</th>
                        <th class="table-padding">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                    <tr style="border-bottom: 1px solid #e0e0e0;">
                        <td class="table-padding-td">{{ $usuario->nombre_usuario }}</td>
                        <td class="table-padding-td">{{ $usuario->apellido }}</td>
                        <td class="table-padding-td">
                            <span class="role-badge role-{{ strtolower($usuario->rol->nombre) }}">
                                {{ $usuario->rol->nombre }}
                            </span>
                        </td>
                        <td class="table-padding-td">{{ $usuario->correo }}</td>
                        <td class="table-padding-td">{{ $usuario->telefono }}</td>
                        <td class="table-padding-td">
                            <a href="{{ route('usuarios.edit', $usuario->id_usuario) }}" style="background: #f39c12; color: #fff; text-decoration: none; padding: 7px 14px; border-radius: 4px; font-size: 0.95em; margin-right: 6px; display: inline-block;">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('usuarios.destroy', $usuario->id_usuario) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: #e74c3c; color: #fff; border: none; padding: 7px 14px; border-radius: 4px; font-size: 0.95em; cursor: pointer;" onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">
                                    <i class="fas fa-trash-alt"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div style="text-align: center; padding: 40px; color: #6c757d; font-style: italic; background: #f5f7fa; border-radius: 8px; margin-top: 20px; min-width: 400px;">
                <i class="fas fa-user-times" style="font-size:2em;margin-bottom:15px;color:#3498db;"></i>
                <h3>No hay usuarios registrados</h3>
                <p>Comience agregando un nuevo usuario</p>
            </div>
        @endif
    </div>

@endsection
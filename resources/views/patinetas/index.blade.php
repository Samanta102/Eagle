@extends('layouts.app')

@section('title', 'Lista de Patinetas | Taller Mecánico')

@section('content')
<div class="container">
    <div class="header">
        <h1><i class="fas fa-motorcycle"></i> Listado de Patinetas</h1>
        <a href="{{ route('patinetas.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nueva Patineta
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
        </div>
    @endif

    @if($patinetas->count() > 0)
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Número Serial</th>
                        <th>Marca</th>
                        <th>Color</th>
                        <th>Fecha de Registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patinetas as $patineta)
                    <tr>
                        <td>{{ $patineta->id_patineta }}</td>
                        <td>{{ $patineta->usuario->nombre_usuario ?? 'Sin usuario' }}</td>
                        <td>{{ $patineta->numero_serial }}</td>
                        <td>{{ $patineta->marca }}</td>
                        <td>
                            <span class="color-chip" style="background-color: {{ $patineta->color }};"></span>
                            {{ $patineta->color }}
                        </td>
                        <td>{{ $patineta->fecha_registro }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('patinetas.edit', $patineta->id_patineta) }}" class="btn-edit">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('patinetas.destroy', $patineta->id_patineta) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete" onclick="return confirm('¿Estás seguro de eliminar esta patineta?')">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="empty-state">
            <i class="fas fa-motorcycle"></i>
            <h3>No hay patinetas registradas</h3>
            <p>Comience agregando una nueva patineta</p>
        </div>
    @endif
</div>
@endsection


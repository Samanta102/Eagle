@extends('layouts.app')

@section('title', 'Listado de Mantenimientos | Taller Mecánico')

@section('content')

    <style>
        /* small helper styles kept local to this view */
        .table-padding { padding: 15px 20px !important; }
        .table-padding-td { padding: 12px 18px !important; }
        .badge-info { background-color: #3498db; color: #fff; padding: 4px 8px; border-radius: 4px; font-weight:600; }
    </style>

    <div style="width: 100%; max-width: 1200px; margin: 30px auto 20px auto; display: flex; justify-content: space-between; align-items: center;">
        <h1 style="color: #2c3e50; font-weight: 600; margin: 0; display: flex; align-items: center; gap: 10px;">
            <i class="fas fa-tools"></i> Listado de Mantenimientos
        </h1>
        <a href="{{ route('mantenimientos.create') }}" style="background: #3498db; color: #fff; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: 500; display: inline-flex; align-items: center; gap: 8px;">
            <i class="fas fa-plus"></i> Nuevo Mantenimiento
        </a>
    </div>

    @if(session('success'))
        <div style="background: #d4edda; color: #155724; border-left: 4px solid #c3e6cb; padding: 12px 20px; border-radius: 6px; margin: 0 auto 15px; max-width:1200px; display:flex; gap:10px; align-items:center;">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="background: #f8d7da; color: #721c24; border-left: 4px solid #f5c6cb; padding: 12px 20px; border-radius: 6px; margin: 0 auto 15px; max-width:1200px; display:flex; gap:10px; align-items:center;">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
        </div>
    @endif

    @if($mantenimientos->count() > 0)
        <table style="margin: 0 auto; border-collapse: collapse; min-width: 1200px; background: #fff; border-radius: 10px; box-shadow: 0 0 20px rgba(0,0,0,0.07); overflow: hidden;">
            <thead>
                <tr style="background: #2c3e50; color: #ffffff;">
                    <th class="table-padding">ID</th>
                    <th class="table-padding">Orden</th>
                    <th class="table-padding">Producto</th>
                    <th class="table-padding">Total</th>
                    <th class="table-padding">Fecha</th>
                    <th class="table-padding">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mantenimientos as $mantenimiento)
                <tr style="border-bottom:1px solid #e0e0e0;">
                    <td class="table-padding-td">{{ $mantenimiento->id_mantenimiento }}</td>
                    <td class="table-padding-td"><span class="badge-info">Orden #{{ $mantenimiento->orden->id_orden ?? 'No encontrada' }}</span></td>
                    <td class="table-padding-td">{{ $mantenimiento->producto->nombre ?? 'No encontrado' }}</td>
                    <td class="table-padding-td">${{ number_format($mantenimiento->total, 0, ',', '.') }}</td>
                    <td class="table-padding-td">{{ $mantenimiento->fecha }}</td>
                    <td class="table-padding-td">
                        <a href="{{ route('mantenimientos.edit', $mantenimiento->id_mantenimiento) }}" style="background: #f39c12; color: #fff; text-decoration: none; padding: 7px 14px; border-radius: 4px; font-size: 0.95em; margin-right: 6px; display: inline-block;">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="{{ route('mantenimientos.destroy', $mantenimiento->id_mantenimiento) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: #e74c3c; color: #fff; border: none; padding: 7px 14px; border-radius: 4px; font-size: 0.95em; cursor: pointer;" onclick="return confirm('¿Eliminar este mantenimiento?')">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div style="text-align: center; padding: 40px; color: #6c757d; font-style: italic; background: #f5f7fa; border-radius: 8px; margin-top: 20px; max-width:1200px; margin-left:auto; margin-right:auto;">
            <i class="fas fa-tools" style="font-size:2em;margin-bottom:15px;color:#3498db;"></i>
            <h3>No hay mantenimientos registrados</h3>
            <p>Comience agregando un nuevo mantenimiento</p>
        </div>
    @endif

@endsection

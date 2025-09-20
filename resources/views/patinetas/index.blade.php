@extends('layouts.app')
@section('title', 'Lista de Patinetas | Taller Mecánico')
@section('content')


{{-- <main class="main-content"> --}}
    <style>
        .table-padding { padding: 15px 20px !important; }
        .table-padding-td { padding: 12px 18px !important; }
    </style>

    <div class="main-content">
    {{-- <div style="display: flex; flex-direction: column; align-items: center; justify-content: flex-start; min-height: 80vh;"> --}}
        {{-- <div> --}}
        <div style="width: 100%; max-width: 1000px; margin: 30px auto 20px auto; display: flex; justify-content: space-between; align-items: center;">
            <h1 style="color: #2c3e50; font-weight: 600; margin: 0; display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-motorcycle"></i> Listado de Patinetas
            </h1>
            <a href="{{ route('patinetas.create') }}" style="background: #3498db; color: #fff; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: 500; display: inline-flex; align-items: center; gap: 8px;">
                <i class="fas fa-plus"></i> Nueva Patineta
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

        @if($patinetas->count() > 0)
            <table style="margin: 0 auto; border-collapse: collapse; min-width: 1000px; background: #fff; border-radius: 10px; box-shadow: 0 0 20px rgba(0,0,0,0.07); overflow: hidden;">
                <thead>
                    <tr style="background: #2c3e50; color: #ffffff;">
                        <th class="table-padding">ID</th>
                        <th class="table-padding">Usuario</th>
                        <th class="table-padding">Número Serial</th>
                        <th class="table-padding">Marca</th>
                        <th class="table-padding">Color</th>
                        <th class="table-padding">Fecha de Registro</th>
                        <th class="table-padding">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patinetas as $patineta)
                    <tr style="border-bottom: 1px solid #e0e0e0;">
                        <td class="table-padding-td">{{ $patineta->id_patineta }}</td>
                        <td class="table-padding-td">{{ $patineta->usuario->nombre_usuario ?? 'Sin usuario' }}</td>
                        <td class="table-padding-td">{{ $patineta->numero_serial }}</td>
                        <td class="table-padding-td">{{ $patineta->marca }}</td>
                        <td class="table-padding-td">
                            <span style="display:inline-block;width:16px;height:16px;border-radius:50%;margin-right:8px;vertical-align:middle;border:1px solid #eee;background:{{ $patineta->color }};"></span>
                            {{ $patineta->color }}
                        </td>
                        <td class="table-padding-td">{{ $patineta->fecha_registro }}</td>
                        <td class="table-padding-td">
                            <a href="{{ route('patinetas.edit', $patineta->id_patineta) }}" style="background: #f39c12; color: #fff; text-decoration: none; padding: 7px 14px; border-radius: 4px; font-size: 0.95em; margin-right: 6px; display: inline-block;">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('patinetas.destroy', $patineta->id_patineta) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: #e74c3c; color: #fff; border: none; padding: 7px 14px; border-radius: 4px; font-size: 0.95em; cursor: pointer;" onclick="return confirm('¿Estás seguro de eliminar esta patineta?')">
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
                <i class="fas fa-motorcycle" style="font-size:2em;margin-bottom:15px;color:#3498db;"></i>
                <h3>No hay patinetas registradas</h3>
                <p>Comience agregando una nueva patineta</p>
            </div>
        @endif
    </div
{{-- </main> --}}
@endsection


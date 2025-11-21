@extends('layouts.app')

@section('title', 'Crear Cita')

@section('content')
<div class="container">
    <div class="header">
        <h1><i class="fas fa-calendar-plus"></i> Crear Nueva Cita</h1>
        <a href="{{ route('citas.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
    </div>

    @if($errors->any())
        <div class="alert-error">
            <div><i class="fas fa-exclamation-circle"></i> Por favor corrige los siguientes errores:</div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('citas.store') }}">
        @csrf

        <div class="form-group">
            <label for="id_usuario" class="form-label">Usuario</label>
            <select class="form-select" name="id_usuario" id="id_usuario" required>
                <option value="">Seleccione un usuario</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id_usuario }}" {{ old('id_usuario') == $usuario->id_usuario ? 'selected' : '' }}>
                        {{ $usuario->nombre_usuario }} {{ $usuario->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_patineta" class="form-label">Patineta</label>
            <select class="form-select" name="id_patineta" id="id_patineta" required>
                <option value="">Seleccione una patineta</option>
                @foreach($patinetas as $patineta)
                    <option value="{{ $patineta->id_patineta }}" {{ old('id_patineta') == $patineta->id_patineta ? 'selected' : '' }}>
                        {{ $patineta->marca }} - {{ $patineta->color }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" class="form-control" name="fecha" id="fecha" 
                   value="{{ old('fecha') }}" required>
        </div>

        <div class="form-group">
            <label for="hora" class="form-label">Hora</label>
            <input type="time" class="form-control" name="hora" id="hora" 
                   value="{{ old('hora') }}" required>
        </div>

        <div class="form-group">
            <label for="motivo" class="form-label">Motivo</label>
            <textarea class="form-control" name="motivo" id="motivo" rows="4" required>{{ old('motivo') }}</textarea>
        </div>

        <div class="form-actions">
            <button type="reset" class="btn btn-secondary">
                <i class="fas fa-undo"></i> Limpiar
            </button>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Guardar Cita
            </button>
        </div>
    </form>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Editar Patineta')

@section('content')
<div class="container">
    <div class="header">
        <h1><i class="fas fa-motorcycle"></i> Editar Patineta</h1>
        <a href="{{ route('patinetas.index') }}" class="btn btn-secondary">
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

    <form action="{{ route('patinetas.update', $patineta->id_patineta) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_usuario" class="form-label">Usuario</label>
            <select name="id_usuario" id="id_usuario" class="form-select" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id_usuario }}" {{ old('id_usuario', $patineta->id_usuario) == $usuario->id_usuario ? 'selected' : '' }}>
                        {{ $usuario->nombre_usuario }} {{ $usuario->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="numero_serial" class="form-label">Número Serial</label>
            <input type="text" name="numero_serial" id="numero_serial" class="form-control" 
                   value="{{ old('numero_serial', $patineta->numero_serial) }}" required>
        </div>

        <div class="form-group">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" name="marca" id="marca" class="form-control" 
                   value="{{ old('marca', $patineta->marca) }}" maxlength="20" required>
        </div>

        <div class="form-group">
            <label for="color" class="form-label">Color</label>
            <input type="text" name="color" id="color" class="form-control" 
                   value="{{ old('color', $patineta->color) }}" maxlength="20" required>
        </div>

        <div class="form-group">
            <label for="fecha_registro" class="form-label">Fecha de Registro</label>
            <input type="date" name="fecha_registro" id="fecha_registro" class="form-control" 
                   value="{{ old('fecha_registro', $patineta->fecha_registro) }}" required>
        </div>

        <div class="form-actions">
            <button type="reset" class="btn btn-secondary">
                <i class="fas fa-undo"></i> Restaurar
            </button>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Actualizar Patineta
            </button>
        </div>
    </form>
</div>
@endsection

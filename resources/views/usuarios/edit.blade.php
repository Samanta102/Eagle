@extends('layouts.app')

@section('title', 'Editar Usuario')

@push('styles')
<style>
    .password-note {
        font-size: 0.85em;
        color: #666;
        margin-top: 5px;
        font-style: italic;
    }
</style>
@endpush

@section('content')
<div class="container">
    <div class="header">
        <h1><i class="fas fa-user-edit"></i> Editar Usuario</h1>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
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

    <form action="{{ route('usuarios.update', $usuario->id_usuario) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="id_rol" class="form-label">Rol</label>
                    <select name="id_rol" id="id_rol" class="form-select" required>
                        @foreach($roles as $rol)
                            <option value="{{ $rol->id_rol }}" {{ $usuario->id_rol == $rol->id_rol ? 'selected' : '' }}>
                                {{ $rol->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="nombre_usuario" class="form-label">Nombre de Usuario</label>
                    <input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control" 
                           value="{{ old('nombre_usuario', $usuario->nombre_usuario) }}" required>
                </div>

                <div class="form-group">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" name="apellido" id="apellido" class="form-control" 
                           value="{{ old('apellido', $usuario->apellido) }}" required>
                </div>

                <div class="form-group">
                    <label for="doc_identidad" class="form-label">Documento de Identidad</label>
                    <input type="text" name="doc_identidad" id="doc_identidad" class="form-control" 
                           value="{{ old('doc_identidad', $usuario->doc_identidad) }}" required>
                </div>

                <div class="form-group">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" 
                           value="{{ old('direccion', $usuario->direccion) }}" required>
                </div>

                <div class="form-group">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" 
                           value="{{ old('telefono', $usuario->telefono) }}" required>
                </div>

                <div class="form-group">
                    <label for="correo" class="form-label">Correo Electrónico</label>
                    <input type="email" name="correo" id="correo" class="form-control" 
                           value="{{ old('correo', $usuario->correo) }}" required>
                </div>

                <div class="form-group">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" name="contrasena" id="contrasena" class="form-control">
                    <p class="password-note">Dejar en blanco si no deseas cambiar la contraseña</p>
                </div>

                <div class="form-actions">
                    <button type="reset" class="btn btn-secondary">
                        <i class="fas fa-undo"></i> Restaurar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Actualizar Usuario
                    </button>
                </div>
            </form>
        </div>
@endsection

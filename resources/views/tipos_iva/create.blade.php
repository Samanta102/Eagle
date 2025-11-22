@extends('layouts.app')

@section('title', 'Crear Tipo de IVA')

@section('content')
<div class="container">
    <div class="header" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;">
        <h1><i class="fas fa-plus-circle"></i> Crear Tipo de IVA</h1>
        <a href="{{ route('tipos-iva.index') }}" class="btn btn-secondary">
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

    <form action="{{ route('tipos-iva.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="id_producto" class="form-label">Producto</label>
            <select name="id_producto" id="id_producto" class="form-select" required>
                <option value="">Seleccione un producto</option>
                @foreach ($productos as $p)
                    <option value="{{ $p->id_producto }}" {{ old('id_producto') == $p->id_producto ? 'selected' : '' }}>{{ $p->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nombre_iva" class="form-label">Nombre IVA</label>
            <input type="text" name="nombre_iva" id="nombre_iva" class="form-control" value="{{ old('nombre_iva') }}" required>
        </div>

        <div class="form-group">
            <label for="porcentaje" class="form-label">Porcentaje</label>
            <input type="number" name="porcentaje" id="porcentaje" class="form-control" value="{{ old('porcentaje') }}" min="0" step="0.01" required>
        </div>

        <div class="form-actions">
            <button type="reset" class="btn btn-secondary">
                <i class="fas fa-undo"></i> Limpiar
            </button>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Guardar Tipo de IVA
            </button>
        </div>
    </form>
</div>
@endsection
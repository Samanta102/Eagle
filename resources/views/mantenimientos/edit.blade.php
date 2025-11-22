@extends('layouts.app')

@section('title', 'Editar Mantenimiento')

@section('content')
<div class="container">
    <div class="header">
        <h1><i class="fas fa-tools"></i> Editar Mantenimiento</h1>
        <a href="{{ route('mantenimientos.index') }}" class="btn btn-secondary">
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

    <form method="POST" action="{{ route('mantenimientos.update', $mantenimiento->id_mantenimiento) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_orden" class="form-label">Orden de servicio</label>
            <select name="id_orden" id="id_orden" class="form-select" required>
                @foreach ($ordenes as $orden)
                    <option value="{{ $orden->id_orden }}" {{ (old('id_orden', $mantenimiento->id_orden) == $orden->id_orden) ? 'selected' : '' }}>Orden #{{ $orden->id_orden }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_producto" class="form-label">Producto usado</label>
            <select name="id_producto" id="id_producto" class="form-select" required>
                @foreach ($productos as $producto)
                    <option value="{{ $producto->id_producto }}" {{ (old('id_producto', $mantenimiento->id_producto) == $producto->id_producto) ? 'selected' : '' }}>{{ $producto->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="total" class="form-label">Total</label>
            <input type="number" name="total" id="total" class="form-control" min="0" step="0.01" value="{{ old('total', $mantenimiento->total) }}" required>
        </div>

        <div class="form-group">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control" value="{{ old('fecha', $mantenimiento->fecha) }}" required>
        </div>

        <div class="form-actions">
            <button type="reset" class="btn btn-secondary">
                <i class="fas fa-undo"></i> Restaurar
            </button>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Actualizar Mantenimiento
            </button>
        </div>
    </form>
</div>

@endsection
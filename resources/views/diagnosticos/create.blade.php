@extends('layouts.app')

@section('title', 'Crear Diagnóstico')

@push('styles')
<style>
    .select-wrapper {
        position: relative;
    }
    .select-wrapper::after {
        content: "▼";
        font-size: 12px;
        color: var(--secondary-color);
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
    }
</style>
@endpush

@section('content')
<div class="container">
    <div class="header">
        <h1>
            <i class="fas fa-stethoscope"></i>
            Crear Diagnóstico
        </h1>
        <a href="{{ route('diagnosticos.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
    </div>

    <form method="POST" action="{{ route('diagnosticos.store') }}">
        @csrf

        <div class="form-group">
            <label for="id_usuario" class="form-label">
                <i class="fas fa-user"></i>
                Seleccionar Usuario:
            </label>
            <div class="select-wrapper">
                <select name="id_usuario" id="id_usuario" class="form-select" required>
                    <option value="">-- Selecciona un usuario --</option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id_usuario }}">
                            {{ $usuario->nombre_usuario }} {{ $usuario->apellido }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="id_cita" class="form-label">
                <i class="fas fa-calendar-check"></i>
                Seleccionar Cita:
            </label>
            <div class="select-wrapper">
                <select name="id_cita" id="id_cita" class="form-select" required>
                    <option value="">-- Selecciona un usuario primero --</option>
                    @foreach($citas as $cita)
                        <option value="{{ $cita->id_cita }}" data-usuario="{{ $cita->id_usuario }}" hidden>
                            Cita #{{ $cita->id_cita }} - {{ $cita->fecha }} {{ $cita->hora }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="id_forma_pago" class="form-label">
                <i class="fas fa-credit-card"></i>
                Forma de Pago:
            </label>
            <div class="select-wrapper">
                <select name="id_forma_pago" id="id_forma_pago" class="form-select" required>
                    <option value="">-- Selecciona una forma de pago --</option>
                    @foreach($formasPago as $forma)
                        <option value="{{ $forma->id_forma_pago }}">{{ $forma->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="descripcion" class="form-label">
                <i class="fas fa-file-medical"></i>
                Descripción:
            </label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="costo_total" class="form-label">
                <i class="fas fa-dollar-sign"></i>
                Costo Total:
            </label>
            <input type="number" step="0.01" name="costo_total" id="costo_total" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="fecha_emision" class="form-label">
                <i class="fas fa-calendar-alt"></i>
                Fecha de Emisión:
            </label>
            <input type="date" name="fecha_emision" id="fecha_emision" class="form-control" required>
        </div>

        <div class="form-actions">
            <button type="reset" class="btn btn-secondary">
                <i class="fas fa-undo"></i>
                Limpiar
            </button>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                Guardar Diagnóstico
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const usuarioSelect = document.getElementById('id_usuario');
        const citaSelect = document.getElementById('id_cita');

        usuarioSelect.addEventListener('change', function () {
            const selectedUsuario = this.value;
            let hasVisibleOptions = false;

            Array.from(citaSelect.options).forEach(option => {
                if (!option.value) {
                    option.hidden = true;
                    return;
                }

                const userId = option.getAttribute('data-usuario');

                if (userId === selectedUsuario) {
                    option.hidden = false;
                    hasVisibleOptions = true;
                } else {
                    option.hidden = true;
                }
            });

            // Actualizar el placeholder según haya opciones disponibles
            const placeholderOption = citaSelect.options[0];
            if (hasVisibleOptions) {
                placeholderOption.text = "-- Selecciona una cita --";
            } else {
                placeholderOption.text = "-- El usuario seleccionado no tiene citas --";
            }
            placeholderOption.hidden = false;
            
            citaSelect.value = '';
        });

        // Validación antes de enviar el formulario
        document.querySelector('form').addEventListener('submit', function(e) {
            if (!usuarioSelect.value || !citaSelect.value || !document.getElementById('id_forma_pago').value) {
                e.preventDefault();
                alert('Por favor complete todos los campos requeridos');
            }
        });
    });
</script>
@endpush
@endsection
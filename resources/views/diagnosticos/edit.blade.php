@extends('layouts.app')

@section('title', 'Editar Diagnóstico')

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
            Editar Diagnóstico
        </h1>
        <a href="{{ route('diagnosticos.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
    </div>

    <form method="POST" action="{{ route('diagnosticos.update', $diagnostico->id_diagnostico) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_usuario" class="form-label">
                <i class="fas fa-user"></i>
                Seleccionar Usuario:
            </label>
            <div class="select-wrapper">
                <select name="id_usuario" id="id_usuario" class="form-select" required>
                    <option value="">-- Selecciona un usuario --</option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id_usuario }}"
                            {{ $usuario->id_usuario == $diagnostico->id_usuario ? 'selected' : '' }}>
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
                    <option value="">-- Selecciona una cita --</option>
                    @foreach($citas as $cita)
                        <option value="{{ $cita->id_cita }}"
                            data-usuario="{{ $cita->id_usuario }}"
                            {{ $cita->id_cita == $diagnostico->id_cita ? 'selected' : '' }}>
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
                        <option value="{{ $forma->id_forma_pago }}"
                            {{ $forma->id_forma_pago == $diagnostico->id_forma_pago ? 'selected' : '' }}>
                            {{ $forma->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="descripcion" class="form-label">
                <i class="fas fa-file-medical"></i>
                Descripción:
            </label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required>{{ $diagnostico->descripcion }}</textarea>
        </div>

        <div class="form-group">
            <label for="costo_total" class="form-label">
                <i class="fas fa-dollar-sign"></i>
                Costo Total:
            </label>
            <input type="number" step="0.01" name="costo_total" id="costo_total" class="form-control" value="{{ $diagnostico->costo_total }}" required>
        </div>

        <div class="form-group">
            <label for="fecha_emision" class="form-label">
                <i class="fas fa-calendar-alt"></i>
                Fecha de Emisión:
            </label>
            <input type="date" name="fecha_emision" id="fecha_emision" class="form-control" value="{{ $diagnostico->fecha_emision }}" required>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-warning">
                <i class="fas fa-sync-alt"></i>
                Actualizar Diagnóstico
            </button>
            <a href="{{ route('diagnosticos.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i>
                Volver
            </a>
        </div>
    </form>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const usuarioSelect = document.getElementById('id_usuario');
        const citaSelect = document.getElementById('id_cita');

        function filtrarCitasPorUsuario(usuarioId) {
            let hasVisibleOptions = false;
            const selectedCita = "{{ $diagnostico->id_cita }}";
            let selectedCitaVisible = false;

            Array.from(citaSelect.options).forEach(option => {
                if (!option.value) {
                    option.hidden = false;
                    return;
                }

                const userId = option.getAttribute('data-usuario');
                const isCorrectUser = userId === usuarioId;
                option.hidden = !isCorrectUser;

                if (isCorrectUser) {
                    hasVisibleOptions = true;
                    if (option.value === selectedCita) {
                        selectedCitaVisible = true;
                        option.selected = true;
                    }
                }
            });

            // Actualizar el placeholder según haya opciones disponibles
            const placeholderOption = citaSelect.options[0];
            if (hasVisibleOptions) {
                placeholderOption.text = "-- Selecciona una cita --";
                if (!selectedCitaVisible && selectedCita) {
                    placeholderOption.text = "-- La cita actual pertenece a otro usuario --";
                }
            } else {
                placeholderOption.text = "-- El usuario seleccionado no tiene citas --";
            }
        }

        usuarioSelect.addEventListener('change', function () {
            filtrarCitasPorUsuario(this.value);
        });

        // Al cargar la página: filtrar citas según el usuario actual
        filtrarCitasPorUsuario(usuarioSelect.value);

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

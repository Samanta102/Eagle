<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cotización</title>
    <style>
        :root {
            --primary-color: #3498db;
            --primary-dark: #2980b9;
            --secondary-color: #2c3e50;
            --light-gray: #f8f9fa;
            --medium-gray: #e0e0e0;
            --dark-gray: #495057;
            --white: #ffffff;
            --success: #28a745;
            --danger: #dc3545;
            --warning: #ffc107;
            --info: #17a2b8;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-gray);
            color: var(--dark-gray);
            line-height: 1.6;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--primary-color);
        }

        h1 {
            color: var(--secondary-color);
            font-weight: 600;
            margin-bottom: 10px;
        }

        .card {
            background-color: var(--white);
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--secondary-color);
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            font-size: 16px;
            border: 1px solid var(--medium-gray);
            border-radius: 6px;
            transition: all 0.3s;
            background-color: var(--white);
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
            outline: none;
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23333' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 12px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: 500;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            border: none;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: var(--white);
            width: 100%;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-secondary {
            background-color: #6c757d;
            color: var(--white);
            width: 100%;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .alert {
            padding: 15px;
            margin-bottom: 25px;
            border-radius: 6px;
            font-size: 15px;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-left: 4px solid #f5c6cb;
        }

        .alert-danger ul {
            margin: 10px 0 0 20px;
        }

        .input-group {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-group-prepend {
            position: absolute;
            left: 15px;
            z-index: 5;
            color: var(--dark-gray);
            font-weight: 600;
        }

        .input-group input {
            padding-left: 40px;
        }

        @media (max-width: 768px) {
            .card {
                padding: 20px;
            }
            
            .form-control {
                padding: 10px 12px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 15px;
            }
            
            h1 {
                font-size: 24px;
            }
        }
    </style>
    <!-- Iconos de Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-file-invoice-dollar"></i> Nueva Cotización</h1>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong><i class="fas fa-exclamation-circle"></i> Por favor corrige los siguientes errores:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <form action="{{ route('cotizaciones.store') }}" method="POST">
                @csrf

                <!-- Usuario -->
                <div class="form-group">
                    <label for="id_usuario"><i class="fas fa-user"></i> Usuario</label>
                    <select class="form-control" name="id_usuario" required>
                        <option value="">Seleccione un usuario</option>
                        @foreach($usuarios as $usuario)
                            <option value="{{ $usuario->id_usuario }}" {{ old('id_usuario') == $usuario->id_usuario ? 'selected' : '' }}>
                                {{ $usuario->nombre_usuario }} {{ $usuario->apellido }} ({{ $usuario->doc_identidad }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Diagnóstico -->
                <div class="form-group">
                    <label for="id_diagnostico"><i class="fas fa-file-medical"></i> Diagnóstico</label>
                    <select class="form-control" name="id_diagnostico" required>
                        <option value="">Seleccione un diagnóstico</option>
                        @foreach($diagnosticos as $diagnostico)
                            <option value="{{ $diagnostico->id_diagnostico }}" {{ old('id_diagnostico') == $diagnostico->id_diagnostico ? 'selected' : '' }}>
                                {{ $diagnostico->descripcion }} ({{ $diagnostico->codigo }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Forma de pago -->
                <div class="form-group">
                    <label for="id_forma_pago"><i class="fas fa-credit-card"></i> Forma de Pago</label>
                    <select class="form-control" name="id_forma_pago" required>
                        <option value="">Seleccione una forma de pago</option>
                        @foreach($formas_pago as $fp)
                            <option value="{{ $fp->id_forma_pago }}" {{ old('id_forma_pago') == $fp->id_forma_pago ? 'selected' : '' }}>
                                {{ $fp->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Total -->
                <div class="form-group">
                    <label for="total"><i class="fas fa-dollar-sign"></i> Total</label>
                    <div class="input-group">
                        <span class="input-group-prepend">$</span>
                        <input type="number" class="form-control" name="total" step="0.01" min="0" 
                               value="{{ old('total') }}" required>
                    </div>
                </div>

                <!-- Fecha de Emisión -->
                <div class="form-group">
                    <label for="fecha_emicion"><i class="fas fa-calendar-alt"></i> Fecha de Emisión</label>
                    <input type="date" class="form-control" name="fecha_emicion" 
                           value="{{ old('fecha_emicion', date('Y-m-d')) }}" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar Cotización
                    </button>
                </div>
            </form>
        </div>

        <a href="{{ route('cotizaciones.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver al Listado
        </a>
    </div>

    <script>
        // Validación del formulario
        document.querySelector('form').addEventListener('submit', function(e) {
            const total = document.querySelector('input[name="total"]');
            if (parseFloat(total.value) <= 0) {
                alert('El total debe ser mayor a cero');
                total.focus();
                e.preventDefault();
            }
        });
    </script>
</body>
</html>

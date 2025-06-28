<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cita</title>
    <style>
        :root {
            --primary-color: #3498db;
            --primary-dark: #2980b9;
            --secondary-color: #2c3e50;
            --danger-color: #e74c3c;
            --danger-dark: #c0392b;
            --warning-color: #f39c12;
            --warning-dark: #d35400;
            --success-color: #2ecc71;
            --success-dark: #27ae60;
            --light-gray: #f5f7fa;
            --medium-gray: #e0e0e0;
            --dark-gray: #333;
            --white: #ffffff;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--dark-gray);
            background-color: var(--light-gray);
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: var(--white);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
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

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
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
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
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

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            
            .button-group {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 15px;
            }
            
            .container {
                padding: 15px;
            }
        }
    </style>
    <!-- Iconos de Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-calendar-edit"></i> Editar Cita #{{ $cita->id_cita }}</h1>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <strong><i class="fas fa-exclamation-circle"></i> Por favor corrige los siguientes errores:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('citas.update', $cita) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="id_usuario"><i class="fas fa-user"></i> Usuario</label>
                <select class="form-control" name="id_usuario" required>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id_usuario }}" {{ $cita->id_usuario == $usuario->id_usuario ? 'selected' : '' }}>
                            {{ $usuario->nombre_usuario }} ({{ $usuario->doc_identidad }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="id_patineta"><i class="fas fa-scooter"></i> Patineta</label>
                <select class="form-control" name="id_patineta" required>
                    @foreach($patinetas as $patineta)
                        <option value="{{ $patineta->id_patineta }}" {{ $cita->id_patineta == $patineta->id_patineta ? 'selected' : '' }}>
                            {{ $patineta->marca }} - {{ $patineta->modelo }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="fecha"><i class="fas fa-calendar-day"></i> Fecha</label>
                <input type="date" class="form-control" name="fecha" value="{{ $cita->fecha }}" required>
            </div>

            <div class="form-group">
                <label for="hora"><i class="fas fa-clock"></i> Hora</label>
                <input type="time" class="form-control" name="hora" value="{{ $cita->hora }}" required>
            </div>

            <div class="form-group">
                <label for="motivo"><i class="fas fa-comment-alt"></i> Motivo</label>
                <textarea class="form-control" name="motivo" required>{{ $cita->motivo }}</textarea>
            </div>

            <div class="button-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Actualizar Cita
                </button>
                <a href="{{ route('citas.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver al listado
                </a>
            </div>
        </form>
    </div>
</body>
</html>

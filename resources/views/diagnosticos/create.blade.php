<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Diagnóstico</title>
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --danger-color: #DC2525;
            --success-color: #4CAF50;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --border-color: #e0e0e0;
            --border-radius: 4px;
            --box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            --focus-shadow: 0 0 0 2px rgba(67, 97, 238, 0.3);
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--dark-color);
            background-color: #f5f7fa;
            margin: 0;
            padding: 20px;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }
        
        h1 {
            color: var(--primary-color);
            margin-bottom: 25px;
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 10px;
            text-align: center;
        }
        
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: var(--border-radius);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
        }
        
        .btn-danger {
            background-color: var(--danger-color);
            color: white;
        }
        
        .btn-danger:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark-color);
        }
        
        select, input, textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            font-size: 16px;
            transition: all 0.3s;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        textarea {
            min-height: 120px;
            resize: vertical;
        }
        
        select:focus, input:focus, textarea:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: var(--focus-shadow);
        }
        
        .button-group {
            margin-top: 30px;
            display: flex;
            gap: 15px;
            align-items: center;
        }
        
        .currency-input {
            position: relative;
        }
        
        .currency-input::before {
            content: '$';
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-weight: bold;
            color: var(--dark-color);
            z-index: 1;
        }
        
        .currency-input input {
            padding-left: 25px;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            
            .button-group {
                flex-direction: column;
                align-items: stretch;
            }
            
            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Nuevo Diagnóstico</h1>

        <form action="{{ route('diagnosticos.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="id_cita">Cita:</label>
                <select id="id_cita" name="id_cita" required>
                    <option value="">Seleccione una cita</option>
                    @foreach ($citas as $cita)
                        <option value="{{ $cita->id_cita }}" {{ old('id_cita') == $cita->id_cita ? 'selected' : '' }}>
                            Cita #{{ $cita->id_cita }} - {{ $cita->paciente->nombre ?? 'Sin paciente' }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" required>{{ old('descripcion') }}</textarea>
            </div>

            <div class="form-group currency-input">
                <label for="costo_total">Costo Total:</label>
                <input type="number" step="0.01" id="costo_total" name="costo_total" value="{{ old('costo_total') }}" required>
            </div>

            <div class="button-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('diagnosticos.index') }}" class="btn btn-danger">Volver</a>
            </div>
        </form>
    </div>
</body>
</html>

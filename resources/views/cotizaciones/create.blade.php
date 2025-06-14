<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cotización</title>
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --danger-color: #DC2525;
            --success-color: #4CAF50;
            --light-color: #f8f9fa;
            --dark-color: #212529;
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
        }
        
        .btn-danger {
            background-color: var(--danger-color);
            color: white;
        }
        
        .btn-danger:hover {
            opacity: 0.9;
        }
        
        .btn-success {
            background-color: var(--success-color);
            color: white;
        }
        
        .btn-success:hover {
            opacity: 0.9;
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
        
        select, input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            font-size: 16px;
            transition: all 0.3s;
            box-sizing: border-box;
        }
        
        select:focus, input:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: var(--focus-shadow);
        }
        
        .button-group {
            margin-top: 30px;
            display: flex;
            gap: 15px;
        }
        
        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }
            
            .button-group {
                flex-direction: column;
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
        <h1>Nueva Cotización</h1>

        <form method="POST" action="{{ route('cotizaciones.store') }}">
            @csrf

            <div class="form-group">
                <label for="id_diagnostico">Diagnóstico:</label>
                <select id="id_diagnostico" name="id_diagnostico" required>
                    <option value="">Seleccione...</option>
                    @foreach ($diagnosticos as $d)
                        <option value="{{ $d->id_diagnostico }}">{{ $d->descripcion }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="id_usuario">Usuario:</label>
                <select id="id_usuario" name="id_usuario" required>
                    <option value="">Seleccione...</option>
                    @foreach ($usuarios as $u)
                        <option value="{{ $u->id_usuario }}">{{ $u->nombre_usuario }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="id_forma_pago">Forma de Pago:</label>
                <select id="id_forma_pago" name="id_forma_pago" required>
                    <option value="">Seleccione...</option>
                    @foreach ($formasPago as $fp)
                        <option value="{{ $fp->id_forma_pago }}">{{ $fp->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="total">Total:</label>
                <input type="number" step="0.01" id="total" name="total" required>
            </div>

            <div class="form-group">
                <label for="fecha_emision">Fecha Emisión:</label>
                <input type="date" id="fecha_emision" name="fecha_emision" required>
            </div>

            <div class="button-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('cotizaciones.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
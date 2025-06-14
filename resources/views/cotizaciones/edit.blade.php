<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cotización</title>
    <style>
        :root {
            --primary-color: #3498db;
            --primary-hover: #2980b9;
            --danger-color: #e74c3c;
            --danger-hover: #c0392b;
            --text-color: #2c3e50;
            --border-color: #ddd;
            --bg-color: #f5f7fa;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
            background-color: var(--bg-color);
        }

        h1 {
            color: var(--text-color);
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #eaecef;
            position: relative;
        }

        h1::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background-color: var(--primary-color);
        }

        form {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: var(--shadow);
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--text-color);
        }

        select, input {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            font-size: 16px;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }

        select:focus, input:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }

        .button-group {
            margin-top: 30px;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 25px;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            border: none;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
        }

        .btn-danger {
            background-color: var(--danger-color);
            color: white;
            text-decoration: none;
        }

        .btn-danger:hover {
            background-color: var(--danger-hover);
            transform: translateY(-2px);
        }

        /* Estilo para el select con opciones */
        select option {
            padding: 8px;
        }

        /* Estilo para los campos deshabilitados */
        input:disabled, select:disabled {
            background-color: #f9f9f9;
            color: #777;
        }

        /* Efecto para los botones al hacer clic */
        .btn:active {
            transform: translateY(0);
        }

        @media (max-width: 768px) {
            body {
                padding: 15px;
            }
            
            form {
                padding: 20px;
            }
            
            .button-group {
                flex-direction: column;
                gap: 10px;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <h1>Editar Cotización</h1>

    <form method="POST" action="{{ route('cotizaciones.update', $cotizacion->id_cotizacion) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Diagnóstico:</label>
            <select name="id_diagnostico" required>
                @foreach ($diagnosticos as $d)
                    <option value="{{ $d->id_diagnostico }}" {{ $d->id_diagnostico == $cotizacion->id_diagnostico ? 'selected' : '' }}>
                        {{ $d->descripcion }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Usuario:</label>
            <select name="id_usuario" required>
                @foreach ($usuarios as $u)
                    <option value="{{ $u->id_usuario }}" {{ $u->id_usuario == $cotizacion->id_usuario ? 'selected' : '' }}>
                        {{ $u->nombre_usuario }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Forma de Pago:</label>
            <select name="id_forma_pago" required>
                @foreach ($formasPago as $fp)
                    <option value="{{ $fp->id_forma_pago }}" {{ $fp->id_forma_pago == $cotizacion->id_forma_pago ? 'selected' : '' }}>
                        {{ $fp->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Nombre Forma de Pago:</label>
            <input type="text" name="forma_pago" value="{{ $cotizacion->forma_pago }}" required>
        </div>

        <div class="form-group">
            <label>Total:</label>
            <input type="number" step="0.01" name="total" value="{{ $cotizacion->total }}" required>
        </div>

        <div class="form-group">
            <label>Fecha Emisión:</label>
            <input type="date" name="fecha_emision" value="{{ $cotizacion->fecha_emision }}" required>
        </div>

        <div class="button-group">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('cotizaciones.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</body>
</html>
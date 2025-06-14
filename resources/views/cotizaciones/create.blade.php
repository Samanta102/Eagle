<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Cotización</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
            background-color: #f5f7fa;
        }

        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #eaecef;
        }

        form {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
        }

        select, input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s;
            box-sizing: border-box;
        }

        select:focus, input:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }

        .form-group {
            margin-bottom: 25px;
        }

        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: background-color 0.3s;
            margin-right: 15px;
        }

        button:hover {
            background-color: #2980b9;
        }

        a {
            display: inline-block;
            padding: 12px 20px;
            background-color: #e74c3c;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #c0392b;
        }

        .button-group {
            margin-top: 30px;
            text-align: center;
        }

        @media (max-width: 600px) {
            body {
                padding: 15px;
            }
            
            form {
                padding: 20px;
            }
            
            .button-group {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }
            
            button, a {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <h1>Nueva Cotización</h1>

    <form method="POST" action="{{ route('cotizaciones.store') }}">
        @csrf

        <div class="form-group">
            <label>Diagnóstico:</label>
            <select name="id_diagnostico" required>
                <option value="">Seleccione...</option>
                @foreach ($diagnosticos as $d)
                    <option value="{{ $d->id_diagnostico }}">{{ $d->descripcion }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Usuario:</label>
            <select name="id_usuario" required>
                <option value="">Seleccione...</option>
                @foreach ($usuarios as $u)
                    <option value="{{ $u->id_usuario }}">{{ $u->nombre_usuario }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Forma de Pago:</label>
            <select name="id_forma_pago" required>
                <option value="">Seleccione...</option>
                @foreach ($formasPago as $fp)
                    <option value="{{ $fp->id_forma_pago }}">{{ $fp->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Nombre Forma de Pago:</label>
            <input type="text" name="forma_pago" required>
        </div>

        <div class="form-group">
            <label>Total:</label>
            <input type="number" step="0.01" name="total" required>
        </div>

        <div class="form-group">
            <label>Fecha Emisión:</label>
            <input type="date" name="fecha_emision" required>
        </div>

        <div class="button-group">
            <button type="submit">Guardar</button>
            <a href="{{ route('cotizaciones.index') }}">Cancelar</a>
        </div>
    </form>
</body>
</html>
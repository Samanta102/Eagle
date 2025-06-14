<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Cotizaciones</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
        }

        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        a {
            color: #3498db;
            text-decoration: none;
            transition: color 0.3s;
        }

        a:hover {
            color: #2980b9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: white;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:nth-child(even):hover {
            background-color: #e9e9e9;
        }

        button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #c0392b;
        }

        .success-message {
            background-color: #2ecc71;
            color: white;
            padding: 10px;
            margin: 20px 0;
            border-radius: 4px;
            text-align: center;
        }

        .create-link {
            display: inline-block;
            background-color: #2ecc71;
            color: white;
            padding: 10px 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .create-link:hover {
            background-color: #27ae60;
            color: white;
        }

        .action-cell {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        form {
            margin: 0;
        }
    </style>
</head>
<body>
    <h1>Listado de Cotizaciones</h1>

    <a href="{{ route('cotizaciones.create') }}" class="create-link">Crear nueva cotización</a>

    @if (session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Diagnóstico</th>
                <th>Usuario</th>
                <th>Forma de Pago</th>
                <th>Total</th>
                <th>Fecha Emisión</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cotizaciones as $cotizacion)
                <tr>
                    <td>{{ $cotizacion->id_cotizacion }}</td>
                    <td>{{ $cotizacion->diagnostico->descripcion ?? 'N/A' }}</td>
                    <td>{{ $cotizacion->usuario->nombre_usuario ?? 'N/A' }}</td>
                    <td>{{ $cotizacion->formaPago->nombre ?? $cotizacion->forma_pago }}</td>
                    <td>{{ $cotizacion->total }}</td>
                    <td>{{ $cotizacion->fecha_emision }}</td>
                    <td class="action-cell">
                        <a href="{{ route('cotizaciones.edit', $cotizacion->id_cotizacion) }}">Editar</a>
                        <form action="{{ route('cotizaciones.destroy', $cotizacion->id_cotizacion) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar esta cotización?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
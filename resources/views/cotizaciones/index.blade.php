<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Cotizaciones</title>
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --danger-color: #DC2525;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --border-radius: 4px;
            --box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
            max-width: 1200px;
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
        }
        
        .btn {
            display: inline-block;
            padding: 8px 16px;
            border-radius: var(--border-radius);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 14px;
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
        
        .btn-edit {
            background-color: #4CAF50;
            color: white;
        }
        
        .btn-edit:hover {
            background-color: #3e8e41;
        }
        
        .alert {
            padding: 12px 16px;
            border-radius: var(--border-radius);
            margin-bottom: 20px;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: var(--box-shadow);
        }
        
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }
        
        th {
            background-color: var(--primary-color);
            color: white;
            font-weight: 500;
        }
        
        tr:nth-child(even) {
            background-color: var(--light-color);
        }
        
        tr:hover {
            background-color: #e9ecef;
        }
        
        .actions-cell {
            display: flex;
            gap: 8px;
        }
        
        .empty-state {
            text-align: center;
            padding: 30px;
            color: #6c757d;
            font-style: italic;
            background-color: var(--light-color);
            border-radius: var(--border-radius);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Listado de Cotizaciones</h1>

        <a href="{{ route('cotizaciones.create') }}" class="btn btn-primary">Crear nueva cotización</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($cotizaciones->isEmpty())
            <div class="empty-state">No hay cotizaciones registradas</div>
        @else
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
                            <td class="actions-cell">
                                <a href="{{ route('cotizaciones.edit', $cotizacion->id_cotizacion) }}" class="btn btn-edit">Editar</a>
                                <form action="{{ route('cotizaciones.destroy', $cotizacion->id_cotizacion) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar esta cotización?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
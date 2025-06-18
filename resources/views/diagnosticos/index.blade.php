<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Diagnósticos</title>
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
            background-color: var(--success-color);
            color: white;
        }
        
        .btn-edit:hover {
            opacity: 0.9;
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
            border-bottom: 1px solid var(--border-color);
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
            flex-wrap: wrap;
        }
        
        .empty-state {
            text-align: center;
            padding: 30px;
            color: #6c757d;
            font-style: italic;
            background-color: var(--light-color);
            border-radius: var(--border-radius);
        }
        
        .currency {
            font-family: 'Courier New', monospace;
            font-weight: bold;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
            
            table {
                display: block;
                overflow-x: auto;
            }
            
            .actions-cell {
                flex-direction: column;
                gap: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Diagnósticos</h1>

        <a href="{{ route('diagnosticos.create') }}" class="btn btn-primary">Crear nuevo diagnóstico</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($diagnosticos->isEmpty())
            <div class="empty-state">No hay diagnósticos registrados</div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cita</th>
                        <th>Descripción</th>
                        <th>Costo Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($diagnosticos as $diagnostico)
                        <tr>
                            <td>{{ $diagnostico->id_diagnostico }}</td>
                            <td>{{ $diagnostico->cita->id_cita ?? 'N/A' }}</td>
                            <td>{{ $diagnostico->descripcion }}</td>
                            <td class="currency">${{ number_format($diagnostico->costo_total, 2) }}</td>
                            <td class="actions-cell">
                                <a href="{{ route('diagnosticos.edit', $diagnostico->id_diagnostico) }}" class="btn btn-edit">Editar</a>
                                <form action="{{ route('diagnosticos.destroy', $diagnostico->id_diagnostico) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este diagnóstico?')">Eliminar</button>
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
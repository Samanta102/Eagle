<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Cotizaciones</title>
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
            --light-gray: #f5f5f5;
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
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: var(--dark-gray);
            background-color: var(--light-gray);
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: var(--white);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
        }

        h1 {
            color: var(--secondary-color);
            font-weight: 600;
            margin: 0;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            font-size: 15px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: var(--white);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-danger {
            background-color: var(--danger-color);
            color: var(--white);
        }

        .btn-danger:hover {
            background-color: var(--danger-dark);
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-warning {
            background-color: var(--warning-color);
            color: var(--white);
        }

        .btn-warning:hover {
            background-color: var(--warning-dark);
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .table-container {
            overflow-x: auto;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.95em;
            min-width: 600px;
        }

        thead tr {
            background-color: var(--secondary-color);
            color: var(--white);
            text-align: left;
        }

        th, td {
            padding: 15px 20px;
            text-align: left;
        }

        th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85em;
            letter-spacing: 0.5px;
        }

        tbody tr {
            border-bottom: 1px solid var(--medium-gray);
            transition: all 0.2s ease;
        }

        tbody tr:nth-of-type(even) {
            background-color: rgba(245, 245, 245, 0.5);
        }

        tbody tr:last-of-type {
            border-bottom: 2px solid var(--secondary-color);
        }

        tbody tr:hover {
            background-color: #f0f8ff;
            transform: scale(1.005);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .amount {
            font-weight: 600;
            color: var(--secondary-color);
        }

        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8em;
            font-weight: 600;
            text-align: center;
            min-width: 80px;
        }

        .status-pending {
            background-color: rgba(243, 156, 18, 0.2);
            color: var(--warning-dark);
        }

        .status-approved {
            background-color: rgba(46, 204, 113, 0.2);
            color: var(--success-dark);
        }

        .status-rejected {
            background-color: rgba(231, 76, 60, 0.2);
            color: var(--danger-dark);
        }

        .actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .date {
            white-space: nowrap;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            
            th, td {
                padding: 12px 15px;
            }
            
            .header {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }
            
            .container {
                padding: 15px;
            }
            
            th, td {
                padding: 10px 12px;
                font-size: 0.85em;
            }
            
            .btn {
                padding: 8px 12px;
                font-size: 14px;
            }
            
            .actions {
                flex-direction: column;
                gap: 5px;
            }
        }
    </style>
    <!-- Iconos de Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Listado de Cotizaciones</h1>
            <a href="{{ route('cotizaciones.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Nueva Cotización
            </a>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Diagnóstico</th>
                        <th>Forma de Pago</th>
                        <th>Total</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cotizaciones as $cotizacion)
                        <tr>
                            <td>{{ $cotizacion->id_cotizacion }}</td>
                            <td>{{ $cotizacion->id_usuario }}</td>
                            <td>{{ $cotizacion->id_diagnostico }}</td>
                            <td>{{ $cotizacion->id_forma_pago }}</td>
                            <td class="amount">${{ number_format($cotizacion->total, 2) }}</td>
                            <td class="date">{{ date('d/m/Y', strtotime($cotizacion->fecha_emicion)) }}</td>
                            <td>
                                <span class="status-badge status-pending">Pendiente</span>
                                <!-- Ejemplos de otros estados:
                                <span class="status-badge status-approved">Aprobada</span>
                                <span class="status-badge status-rejected">Rechazada</span>
                                -->
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('cotizaciones.edit', $cotizacion) }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <form action="{{ route('cotizaciones.destroy', $cotizacion) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta cotización?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Confirmación antes de eliminar
        function confirmDelete(event) {
            if (!confirm('¿Estás seguro de eliminar esta cotización?')) {
                event.preventDefault();
            }
        }
        
        // Asignar el evento a todos los botones de eliminar
        document.querySelectorAll('.btn-danger').forEach(button => {
            button.addEventListener('click', confirmDelete);
        });
    </script>
</body>
</html>
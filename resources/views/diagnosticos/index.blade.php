<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Diagnósticos</title>
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
            max-width: 1200px;
            margin: 0 auto;
            background: var(--white);
            border-radius: 8px;
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
            background-color: var(--primary-color);
            color: var(--white);
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .btn i {
            font-size: 1.1em;
        }

        .alert {
            padding: 15px;
            margin-bottom: 25px;
            border-radius: 6px;
            font-size: 15px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-left: 4px solid #c3e6cb;
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
            background-color: rgba(245, 247, 250, 0.5);
        }

        tbody tr:last-of-type {
            border-bottom: 2px solid var(--secondary-color);
        }

        tbody tr:hover {
            background-color: #e3f2fd;
            transform: scale(1.005);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .btn-edit {
            background-color: var(--warning-color);
            color: var(--white);
        }

        .btn-edit:hover {
            background-color: var(--warning-dark);
        }

        .btn-delete {
            background-color: var(--danger-color);
            color: var(--white);
        }

        .btn-delete:hover {
            background-color: var(--danger-dark);
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            color: #6c757d;
            font-style: italic;
            background-color: var(--light-gray);
            border-radius: 8px;
            margin-top: 20px;
        }

        .empty-state i {
            font-size: 2em;
            margin-bottom: 15px;
            color: var(--primary-color);
        }

        .currency {
            font-weight: 600;
            color: var(--secondary-color);
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
                padding: 15px;
            }
            
            .container {
                padding: 15px;
            }
            
            th, td {
                padding: 10px 12px;
                font-size: 0.85em;
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
            <h1><i class="fas fa-file-medical"></i> Diagnósticos</h1>
            <a href="{{ route('diagnosticos.create') }}" class="btn">
                <i class="fas fa-plus"></i> Nuevo Diagnóstico
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @if($diagnosticos->isEmpty())
            <div class="empty-state">
                <i class="fas fa-clipboard-list"></i>
                <h3>No hay diagnósticos registrados</h3>
                <p>Comience agregando un nuevo diagnóstico</p>
            </div>
        @else
            <div class="table-container">
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
                                <td>{{ Str::limit($diagnostico->descripcion, 50) }}</td>
                                <td class="currency">${{ number_format($diagnostico->costo_total, 2) }}</td>
                                <td>
                                    <div class="actions">
                                        <a href="{{ route('diagnosticos.edit', $diagnostico->id_diagnostico) }}" class="btn btn-edit">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('diagnosticos.destroy', $diagnostico->id_diagnostico) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-delete" onclick="return confirm('¿Está seguro de eliminar este diagnóstico?')">
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
        @endif
    </div>

    <script>
        // Confirmación antes de eliminar
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function(e) {
                if (!confirm('¿Está seguro de eliminar este diagnóstico?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>
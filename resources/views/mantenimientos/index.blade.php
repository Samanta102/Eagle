<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mantenimientos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            --info-color: #17a2b8;
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
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Estático */
        .sidebar {
            width: 250px;
            background-color: var(--secondary-color);
            color: var(--white);
            padding: 20px 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar-header {
            padding: 0 20px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h2 {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 20px 0;
        }

        .menu-item {
            margin-bottom: 5px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 20px;
            color: var(--white);
            text-decoration: none;
            transition: all 0.3s;
        }

        .menu-link:hover, .menu-link.active {
            background-color: rgba(255, 255, 255, 0.1);
            border-left: 4px solid var(--primary-color);
        }

        .menu-link i {
            width: 20px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 20px;
        }

        /* Estilos del CRUD de Mantenimientos */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: var(--white);
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
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary-color);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 15px;
            min-width: 120px;
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
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: var(--white);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid var(--medium-gray);
        }

        th {
            background-color: var(--secondary-color);
            color: var(--white);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 14px;
        }

        tr:hover {
            background-color: rgba(52, 152, 219, 0.05);
        }

        .actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .actions form {
            margin: 0;
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            color: #6c757d;
            font-style: italic;
            background-color: var(--light-gray);
            border-radius: 8px;
        }

        .empty-state i {
            font-size: 2em;
            margin-bottom: 15px;
            color: var(--primary-color);
        }

        .badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-info {
            background-color: var(--primary-color);
            color: var(--white);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                width: 80px;
                overflow: hidden;
            }
            
            .sidebar-header h2 span, 
            .menu-link span {
                display: none;
            }
            
            .menu-link {
                justify-content: center;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .sidebar-menu {
                display: flex;
                overflow-x: auto;
                padding: 10px 0;
            }
            
            .menu-item {
                margin-bottom: 0;
                margin-right: 5px;
            }
            
            .menu-link {
                padding: 10px 15px;
                border-radius: 4px;
                border-left: none;
            }
            
            .menu-link:hover, .menu-link.active {
                border-left: none;
                background-color: rgba(255, 255, 255, 0.2);
            }
            
            .container {
                padding: 20px;
            }
            
            .header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .actions {
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
            
            th, td {
                padding: 10px 8px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar Estático -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <h2>
                <i class="fas fa-tools"></i>
                <span>Taller Mecánico</span>
            </h2>
        </div>
        
        <ul class="sidebar-menu">
            <li class="menu-item">
                <a href="{{ route('dashboard') }}" class="menu-link">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <i class="fas fa-users"></i>
                    <span>Usuarios</span>
                </a>
            </li>
            
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <i class="fas fa-motorcycle"></i>
                    <span>Patinetas</span>
                </a>
            </li>
            
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <i class="fas fa-calendar-check"></i>
                    <span>Citas</span>
                </a>
            </li>
            
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <i class="fas fa-file-medical"></i>
                    <span>Diagnósticos</span>
                </a>
            </li>
            
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Órdenes de Servicio</span>
                </a>
            </li>
            
            <li class="menu-item">
                <a href="#" class="menu-link active">
                    <i class="fas fa-tools"></i>
                    <span>Mantenimientos</span>
                </a>
            </li>
            
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <i class="fas fa-boxes"></i>
                    <span>Productos</span>
                </a>
            </li>
            
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <i class="fas fa-credit-card"></i>
                    <span>Tipos de Pago</span>
                </a>
            </li>
            
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <i class="fas fa-percentage"></i>
                    <span>Tipos de IVA</span>
                </a>
            </li>
        </ul>
    </aside>

    <!-- Main Content con el CRUD de Mantenimientos -->
    <main class="main-content">
        <div class="container">
            <div class="header">
                <h1>
                    <i class="fas fa-tools"></i>
                    Listado de Mantenimientos
                </h1>
                <a href="{{ route('mantenimientos.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Nuevo Mantenimiento
                </a>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th><i class="fas fa-id-card"></i> ID</th>
                            <th><i class="fas fa-file-alt"></i> Orden</th>
                            <th><i class="fas fa-box"></i> Producto</th>
                            <th><i class="fas fa-dollar-sign"></i> Total</th>
                            <th><i class="fas fa-calendar-day"></i> Fecha</th>
                            <th><i class="fas fa-cogs"></i> Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mantenimientos as $mantenimiento)
                            <tr>
                                <td>{{ $mantenimiento->id_mantenimiento }}</td>
                                <td>
                                    <span class="badge badge-info">
                                        Orden #{{ $mantenimiento->orden->id_orden ?? 'No encontrada' }}
                                    </span>
                                </td>
                                <td>{{ $mantenimiento->producto->nombre ?? 'No encontrado' }}</td>
                                <td>${{ number_format($mantenimiento->total, 0, ',', '.') }}</td>
                                <td>{{ $mantenimiento->fecha }}</td>
                                <td class="actions">
                                    <a href="{{ route('mantenimientos.edit', $mantenimiento->id_mantenimiento) }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i>
                                        Editar
                                    </a>
                                    <form action="{{ route('mantenimientos.destroy', $mantenimiento->id_mantenimiento) }}" 
                                          method="POST"
                                          onsubmit="return confirm('¿Eliminar este mantenimiento?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="empty-state">
                                    <i class="fas fa-tools"></i>
                                    <p>No hay mantenimientos registrados</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>

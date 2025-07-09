<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrativo</title>
    <style>
        :root {
            --primary-color: #3498db;
            --primary-dark: #2980b9;
            --secondary-color: #2c3e50;
            --danger-color: #e74c3c;
            --danger-dark: #c0392b;
            --success-color: #2ecc71;
            --success-dark: #27ae60;
            --warning-color: #f39c12;
            --warning-dark: #d35400;
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
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: var(--secondary-color);
            color: var(--white);
            padding: 20px 0;
            transition: all 0.3s;
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
            padding: 20px;
            margin-left: 250px;
            width: calc(100% - 250px);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--primary-color);
        }

        .header h1 {
            color: var(--secondary-color);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* CRUD Container */
        .crud-container {
            max-width: 100%;
            margin: 0 auto;
            background: var(--white);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
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

        .badge-success {
            background-color: var(--success-color);
            color: var(--white);
        }

        .badge-warning {
            background-color: var(--warning-color);
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
            
            .main-content {
                margin-left: 80px;
                width: calc(100% - 80px);
            }
        }

        @media (max-width: 768px) {
            .dashboard-container {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
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
            
            .main-content {
                margin-left: 0;
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
            
            th, td {
                padding: 10px 8px;
                font-size: 14px;
            }
        }
    </style>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>
                    <i class="fas fa-tools"></i>
                    <span>ELECTRIC HOUSE</span>
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
                    <a href="{{ route('citas.index') }}" class="menu-link">
                        <i class="fas fa-calendar-check"></i>
                        <span>Citas</span>
                    </a>
                </li>
                
                <li class="menu-item">
                    <a href="{{ route('diagnosticos.index') }}" class="menu-link">
                        <i class="fas fa-file-medical"></i>
                        <span>Diagnósticos</span>
                    </a>
                </li> 
                
                <li class="menu-item">
                    <a href="{{ route('ordenes_servicio.index') }}" class="menu-link">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Órdenes de Servicio</span>
                    </a>
                </li>
                
                <li class="menu-item">
                    <a href="{{ route('mantenimientos.index') }}" class="menu-link">
                        <i class="fas fa-tools"></i>
                        <span>Mantenimientos</span>
                    </a>
                </li>
                
                <li class="menu-item">
                    <a href="{{ route('productos.index') }}" class="menu-link active">
                        <i class="fas fa-boxes"></i>
                        <span>Productos</span>
                    </a>
                </li>
                
                <li class="menu-item">
                    <a href="{{ route('formas_pago.index') }}" class="menu-link">
                        <i class="fas fa-credit-card"></i>
                        <span>Tipos de Pago</span>
                    </a>
                </li>
                
                <li class="menu-item">
                    <a href="{{ route('tipos-iva.index') }}" class="menu-link">
                        <i class="fas fa-percentage"></i>
                        <span>Tipos de IVA</span>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="header">
                <h1>
                    <i class="fas fa-boxes"></i>
                    Listado de Productos
                </h1>
                <div class="user-info">
                    <span>ADMIN Samanta</span>
                    <i class="fas fa-user-circle" style="font-size: 24px;"></i>
                </div>
            </div>

            <div class="crud-container">
                <div class="header">
                    <h2>Gestión de Productos</h2>
                    <a href="{{ route('productos.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        Nuevo Producto
                    </a>
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th><i class="fas fa-id-card"></i> ID</th>
                                <th><i class="fas fa-tag"></i> Nombre</th>
                                <th><i class="fas fa-align-left"></i> Descripción</th>
                                <th><i class="fas fa-box-open"></i> Cantidad</th>
                                <th><i class="fas fa-dollar-sign"></i> Costo</th>
                                <th><i class="fas fa-percentage"></i> IVA</th>
                                <th><i class="fas fa-cogs"></i> Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($productos as $producto)
                                <tr>
                                    <td>{{ $producto->id_producto }}</td>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ Str::limit($producto->descripcion, 50) }}</td>
                                    <td>
                                        <span class="badge {{ $producto->cantidad > 10 ? 'badge-success' : 'badge-warning' }}">
                                            {{ $producto->cantidad }}
                                        </span>
                                    </td>
                                    <td>${{ number_format($producto->costo, 0, ',', '.') }}</td>
                                    <td>{{ $producto->iva }}%</td>
                                    <td class="actions">
                                        <a href="{{ route('productos.edit', $producto->id_producto) }}" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                            Editar
                                        </a>
                                        <form action="{{ route('productos.destroy', $producto->id_producto) }}" 
                                              method="POST"
                                              onsubmit="return confirm('¿Eliminar producto?');">
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
                                    <td colspan="7" class="empty-state">
                                        <i class="fas fa-box-open"></i>
                                        <p>No hay productos registrados</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>

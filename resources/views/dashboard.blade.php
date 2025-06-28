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
            --success-color: #2ecc71;
            --warning-color: #f39c12;
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
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Cards Grid */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .card {
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--medium-gray);
        }

        .card-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: var(--white);
        }

        .icon-users {
            background-color: var(--primary-color);
        }

        .icon-scooter {
            background-color: var(--success-color);
        }

        .icon-calendar {
            background-color: var(--warning-color);
        }

        .icon-diagnosis {
            background-color: var(--danger-color);
        }

        .icon-quote {
            background-color: var(--info-color);
        }

        .card-title {
            font-weight: 600;
            color: var(--secondary-color);
            margin: 0;
        }

        .card-body {
            color: #666;
        }

        .card-footer {
            margin-top: 15px;
            display: flex;
            justify-content: flex-end;
        }

        .btn {
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: var(--white);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
        }

        /* Stats */
        .stats-container {
            margin-top: 30px;
        }

        .stats-title {
            font-size: 1.2rem;
            margin-bottom: 15px;
            color: var(--secondary-color);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
        }

        .stat-card {
            background-color: var(--white);
            padding: 15px;
            border-radius: 6px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .stat-label {
            color: #666;
            font-size: 0.9rem;
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
            .dashboard-container {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                height: auto;
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
        }

        @media (max-width: 576px) {
            .cards-grid {
                grid-template-columns: 1fr;
            }
            
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
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
                    <a href="#" class="menu-link active">
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
                    <a href="{{ route('cotizaciones.index') }}" class="menu-link">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <span>Cotizaciones</span>
                    </a>
                </li>
                
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Órdenes de Servicio</span>
                    </a>
                </li>
                
                <li class="menu-item">
                    <a href="#" class="menu-link">
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
                    <a href="{{ route('formas_pago.index') }}" class="menu-link">
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

        <!-- Main Content -->
        <main class="main-content">
            <div class="header">
                <h1>Panel de Control</h1>
                <div class="user-info">
                    <span>ADMIN Samanta</span>
                    <i class="fas fa-user-circle" style="font-size: 24px;"></i>
                </div>
            </div>

            <!-- Stats -->
            <div class="stats-container">
                <h3 class="stats-title">Resumen General</h3>
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-value">24</div>
                        <div class="stat-label">Citas Hoy</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-value">8</div>
                        <div class="stat-label">Órdenes Activas</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-value">5</div>
                        <div class="stat-label">Mantenimientos</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-value">$12,450</div>
                        <div class="stat-label">Ventas Hoy</div>
                    </div>
                </div>
            </div>

            <!-- Quick Access Cards -->
            <div class="cards-grid">
                <!-- Usuarios -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-icon icon-users">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="card-title">Usuarios</h3>
                    </div>
                    <div class="card-body">
                        <p>Administra los usuarios del sistema, roles y permisos.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">
                            <i class="fas fa-arrow-right"></i> Acceder
                        </a>
                    </div>
                </div>

                <!-- Patinetas -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-icon icon-scooter">
                            <i class="fas fa-motorcycle"></i>
                        </div>
                        <h3 class="card-title">Patinetas</h3>
                    </div>
                    <div class="card-body">
                        <p>Gestiona el inventario de patinetas y sus características.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">
                            <i class="fas fa-arrow-right"></i> Acceder
                        </a>
                    </div>
                </div>

                <!-- Citas -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-icon icon-calendar">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h3 class="card-title">Citas</h3>
                    </div>
                    <div class="card-body">
                        <p>Programa y gestiona las citas de los clientes.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">
                            <i class="fas fa-arrow-right"></i> Acceder
                        </a>
                    </div>
                </div>

                <!-- Diagnósticos -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-icon icon-diagnosis">
                            <i class="fas fa-file-medical"></i>
                        </div>
                        <h3 class="card-title">Diagnósticos</h3>
                    </div>
                    <div class="card-body">
                        <p>Registra y consulta diagnósticos técnicos.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">
                            <i class="fas fa-arrow-right"></i> Acceder
                        </a>
                    </div>
                </div>

                <!-- Cotizaciones -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-icon icon-quote">
                            <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                        <h3 class="card-title">Cotizaciones</h3>
                    </div>
                    <div class="card-body">
                        <p>Genera y administra cotizaciones para clientes.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">
                            <i class="fas fa-arrow-right"></i> Acceder
                        </a>
                    </div>
                </div>

                <!-- Órdenes de Servicio -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <h3 class="card-title">Órdenes de Servicio</h3>
                    </div>
                    <div class="card-body">
                        <p>Gestiona las órdenes de servicio y su progreso.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">
                            <i class="fas fa-arrow-right"></i> Acceder
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
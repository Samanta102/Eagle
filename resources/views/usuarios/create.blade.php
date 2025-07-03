<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario | Taller Mecánico</title>
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
            margin-left: 250px; /* Igual al ancho del sidebar */
            padding: 20px;
        }

        /* Estilos para el formulario */
        .container {
            max-width: 800px;
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
            display: flex;
            align-items: center;
            gap: 10px;
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
            border: none;
            cursor: pointer;
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

        .btn-secondary {
            background-color: var(--medium-gray);
            color: var(--dark-gray);
        }

        .btn-secondary:hover {
            background-color: #d0d0d0;
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .alert-error {
            padding: 15px;
            margin-bottom: 25px;
            border-radius: 6px;
            font-size: 15px;
            background-color: #f8d7da;
            color: #721c24;
            border-left: 4px solid #f5c6cb;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .alert-error ul {
            list-style-position: inside;
            margin-left: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--secondary-color);
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--medium-gray);
            border-radius: 6px;
            font-size: 16px;
            transition: border 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }

        .form-select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--medium-gray);
            border-radius: 6px;
            font-size: 16px;
            background-color: var(--white);
            transition: border 0.3s;
        }

        .form-select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid var(--medium-gray);
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
        }

        @media (max-width: 576px) {
            .form-actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                <a href="{{ route('usuarios.index') }}" class="menu-link active">
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
                <a href="{{ route('productos.index') }}" class="menu-link">
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

    <!-- Main Content con el formulario -->
    <main class="main-content">
        <div class="container">
            <div class="header">
                <h1><i class="fas fa-user-plus"></i> Crear Nuevo Usuario</h1>
                <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>

            @if($errors->any())
                <div class="alert-error">
                    <div><i class="fas fa-exclamation-circle"></i> Por favor corrige los siguientes errores:</div>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('usuarios.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="id_rol" class="form-label">Rol</label>
                    <select name="id_rol" id="id_rol" class="form-select" required>
                        <option value="">Selecciona un rol</option>
                        @foreach($roles as $rol)
                            <option value="{{ $rol->id_rol }}" {{ old('id_rol') == $rol->id_rol ? 'selected' : '' }}>
                                {{ $rol->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="nombre_usuario" class="form-label">Nombre de Usuario</label>
                    <input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control" 
                           value="{{ old('nombre_usuario') }}" required>
                </div>

                <div class="form-group">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" name="apellido" id="apellido" class="form-control" 
                           value="{{ old('apellido') }}" required>
                </div>

                <div class="form-group">
                    <label for="doc_identidad" class="form-label">Documento de Identidad</label>
                    <input type="text" name="doc_identidad" id="doc_identidad" class="form-control" 
                           value="{{ old('doc_identidad') }}" required>
                </div>

                <div class="form-group">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" 
                           value="{{ old('direccion') }}" required>
                </div>

                <div class="form-group">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" 
                           value="{{ old('telefono') }}" required>
                </div>

                <div class="form-group">
                    <label for="correo" class="form-label">Correo Electrónico</label>
                    <input type="email" name="correo" id="correo" class="form-control" 
                           value="{{ old('correo') }}" required>
                </div>

                <div class="form-group">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" name="contrasena" id="contrasena" class="form-control" required>
                </div>

                <div class="form-actions">
                    <button type="reset" class="btn btn-secondary">
                        <i class="fas fa-undo"></i> Limpiar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar Usuario
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
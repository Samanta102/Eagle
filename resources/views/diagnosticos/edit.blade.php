<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Diagnóstico</title>
    <!-- Font Awesome -->
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
            margin-left: 250px; /* Igual al ancho del sidebar */
            padding: 20px;
        }

        /* Estilos del formulario de edición */
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
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary-color);
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

        .btn-warning {
            background-color: var(--warning-color);
            color: var(--white);
        }

        .btn-warning:hover {
            background-color: var(--warning-dark);
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-secondary {
            background-color: var(--secondary-color);
            color: var(--white);
        }

        .btn-secondary:hover {
            background-color: var(--dark-gray);
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--secondary-color);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--medium-gray);
            border-radius: 6px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="date"]:focus,
        textarea:focus,
        select:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
            gap: 15px;
        }

        .select-wrapper {
            position: relative;
        }

        .select-wrapper::after {
            content: "▼";
            font-size: 12px;
            color: var(--secondary-color);
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
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
            
            .form-actions {
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
                <a href="#" class="menu-link">
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
                <a href="#" class="menu-link active">
                    <i class="fas fa-file-medical"></i>
                    <span>Diagnósticos</span>
                </a>
            </li>
            
            <li class="menu-item">
                <a href="#" class="menu-link">
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

    <!-- Main Content con el formulario de edición -->
    <main class="main-content">
        <div class="container">
            <div class="header">
                <h1>
                    <i class="fas fa-stethoscope"></i>
                    Editar Diagnóstico
                </h1>
            </div>

            <form method="POST" action="{{ route('diagnosticos.update', $diagnostico->id_diagnostico) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="id_usuario">
                        <i class="fas fa-user"></i>
                        Seleccionar Usuario:
                    </label>
                    <div class="select-wrapper">
                        <select name="id_usuario" id="id_usuario" required>
                            <option value="">-- Selecciona un usuario --</option>
                            @foreach($usuarios as $usuario)
                                <option value="{{ $usuario->id_usuario }}"
                                    {{ $usuario->id_usuario == $diagnostico->id_usuario ? 'selected' : '' }}>
                                    {{ $usuario->nombre_usuario }} {{ $usuario->apellido }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="id_cita">
                        <i class="fas fa-calendar-check"></i>
                        Seleccionar Cita:
                    </label>
                    <div class="select-wrapper">
                        <select name="id_cita" id="id_cita" required>
                            <option value="">-- Selecciona una cita --</option>
                            @foreach($citas as $cita)
                                <option value="{{ $cita->id_cita }}"
                                    data-usuario="{{ $cita->id_usuario }}"
                                    {{ $cita->id_cita == $diagnostico->id_cita ? 'selected' : '' }}>
                                    Cita #{{ $cita->id_cita }} - {{ $cita->fecha }} {{ $cita->hora }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="id_forma_pago">
                        <i class="fas fa-credit-card"></i>
                        Forma de Pago:
                    </label>
                    <div class="select-wrapper">
                        <select name="id_forma_pago" id="id_forma_pago" required>
                            <option value="">-- Selecciona una forma de pago --</option>
                            @foreach($formasPago as $forma)
                                <option value="{{ $forma->id_forma_pago }}"
                                    {{ $forma->id_forma_pago == $diagnostico->id_forma_pago ? 'selected' : '' }}>
                                    {{ $forma->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="descripcion">
                        <i class="fas fa-file-medical"></i>
                        Descripción:
                    </label>
                    <textarea name="descripcion" id="descripcion" rows="3" required>{{ $diagnostico->descripcion }}</textarea>
                </div>

                <div class="form-group">
                    <label for="costo_total">
                        <i class="fas fa-dollar-sign"></i>
                        Costo Total:
                    </label>
                    <input type="number" step="0.01" name="costo_total" id="costo_total" value="{{ $diagnostico->costo_total }}" required>
                </div>

                <div class="form-group">
                    <label for="fecha_emision">
                        <i class="fas fa-calendar-alt"></i>
                        Fecha de Emisión:
                    </label>
                    <input type="date" name="fecha_emision" id="fecha_emision" value="{{ $diagnostico->fecha_emision }}" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-sync-alt"></i>
                        Actualizar Diagnóstico
                    </button>
                    <a href="{{ route('diagnosticos.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i>
                        Volver al listado
                    </a>
                </div>
            </form>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const usuarioSelect = document.getElementById('id_usuario');
            const citaSelect = document.getElementById('id_cita');

            function filtrarCitasPorUsuario(usuarioId) {
                let hasVisibleOptions = false;
                const selectedCita = "{{ $diagnostico->id_cita }}";
                let selectedCitaVisible = false;

                Array.from(citaSelect.options).forEach(option => {
                    if (!option.value) {
                        option.hidden = false;
                        return;
                    }

                    const userId = option.getAttribute('data-usuario');
                    const isCorrectUser = userId === usuarioId;
                    option.hidden = !isCorrectUser;

                    if (isCorrectUser) {
                        hasVisibleOptions = true;
                        if (option.value === selectedCita) {
                            selectedCitaVisible = true;
                            option.selected = true;
                        }
                    }
                });

                // Actualizar el placeholder según haya opciones disponibles
                const placeholderOption = citaSelect.options[0];
                if (hasVisibleOptions) {
                    placeholderOption.text = "-- Selecciona una cita --";
                    if (!selectedCitaVisible && selectedCita) {
                        // Si la cita actual no pertenece al usuario seleccionado
                        placeholderOption.text = "-- La cita actual pertenece a otro usuario --";
                    }
                } else {
                    placeholderOption.text = "-- El usuario seleccionado no tiene citas --";
                }
            }

            usuarioSelect.addEventListener('change', function () {
                filtrarCitasPorUsuario(this.value);
            });

            // Al cargar la página: filtrar citas según el usuario actual
            filtrarCitasPorUsuario(usuarioSelect.value);

            // Validación antes de enviar el formulario
            document.querySelector('form').addEventListener('submit', function(e) {
                if (!usuarioSelect.value || !citaSelect.value || !document.getElementById('id_forma_pago').value) {
                    e.preventDefault();
                    alert('Por favor complete todos los campos requeridos');
                }
            });
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard cliente</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --primary-light: #4895ef;
            --secondary: #3f37c9;
            --dark: #1a1a2e;
            --light: #f8f9fa;
            --success: #4cc9f0;
            --danger: #f72585;
            --warning: #f8961e;
            --gray: #6c757d;
            --gray-light: #e9ecef;
            --diagnostic: #7209b7;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }
        
        body {
            background-color: #f5f7ff;
            color: var(--dark);
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(0,0,0,0.1);
        }
        
        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            display: flex;
            align-items: center;
        }
        
        .logo i {
            margin-right: 0.5rem;
            color: var(--secondary);
        }
        
        .user-actions {
            display: flex;
            gap: 1rem;
        }
        
        .btn {
            padding: 0.6rem 1.2rem;
            border-radius: 30px;
            border: none;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.2);
        }
        
        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--primary);
            color: var(--primary);
        }
        
        .btn-outline:hover {
            background-color: var(--primary);
            color: white;
        }
        
        .btn-danger {
            background-color: var(--danger);
            color: white;
        }
        
        .btn-danger:hover {
            background-color: #d31666;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(247, 37, 133, 0.2);
        }
        
        .btn-diagnostic {
            background-color: var(--diagnostic);
            color: white;
        }
        
        .btn-diagnostic:hover {
            background-color: #5a0895;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(114, 9, 183, 0.2);
        }
        
        .card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            margin-bottom: 2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--gray-light);
        }
        
        .card-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }
        
        .card-title i {
            color: var(--primary);
        }
        
        .profile-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
        }
        
        .form-group {
            margin-bottom: 1.2rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
            font-size: 0.9rem;
        }
        
        .form-control {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid var(--gray-light);
            border-radius: 8px;
            font-size: 0.95rem;
            transition: border-color 0.3s ease;
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
        }
        
        .table-responsive {
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 1rem;
        }
        
        thead th {
            background-color: var(--primary);
            color: white;
            padding: 1rem;
            text-align: left;
            font-weight: 500;
        }
        
        thead th:first-child {
            border-top-left-radius: 8px;
        }
        
        thead th:last-child {
            border-top-right-radius: 8px;
        }
        
        tbody tr {
            transition: background-color 0.2s ease;
        }
        
        tbody tr:hover {
            background-color: rgba(67, 97, 238, 0.05);
        }
        
        tbody td {
            padding: 1rem;
            border-bottom: 1px solid var(--gray-light);
            vertical-align: middle;
        }
        
        .badge {
            display: inline-block;
            padding: 0.35rem 0.65rem;
            font-size: 0.75rem;
            font-weight: 600;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 50px;
        }
        
        .badge-primary {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary);
        }
        
        .badge-success {
            background-color: rgba(76, 201, 240, 0.1);
            color: var(--success);
        }
        
        .badge-warning {
            background-color: rgba(248, 150, 30, 0.1);
            color: var(--warning);
        }
        
        .badge-diagnostic {
            background-color: rgba(114, 9, 183, 0.1);
            color: var(--diagnostic);
        }
        
        .actions {
            display: flex;
            gap: 0.5rem;
        }
        
        .action-btn {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            color: white;
        }
        
        .action-btn.edit {
            background-color: var(--primary);
        }
        
        .action-btn.delete {
            background-color: var(--danger);
        }
        
        .action-btn.diagnostic {
            background-color: var(--diagnostic);
        }
        
        .action-btn:hover {
            transform: scale(1.1);
        }
        
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .modal.active {
            opacity: 1;
            visibility: visible;
        }
        
        .modal-content {
            background-color: white;
            border-radius: 12px;
            width: 90%;
            max-width: 600px;
            transform: translateY(-20px);
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            max-height: 90vh;
            overflow-y: auto;
        }
        
        .modal-lg .modal-content {
            max-width: 800px;
        }
        
        .modal.active .modal-content {
            transform: translateY(0);
        }
        
        .modal-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--gray-light);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            background-color: white;
            z-index: 10;
        }
        
        .modal-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--dark);
        }
        
        .close-btn {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--gray);
            transition: color 0.3s ease;
        }
        
        .close-btn:hover {
            color: var(--danger);
        }
        
        .modal-body {
            padding: 1.5rem;
        }
        
        .modal-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid var(--gray-light);
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            position: sticky;
            bottom: 0;
            background-color: white;
        }
        
        .scooter-card {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            padding: 1.5rem;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
        }
        
        .scooter-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
        }
        
        .scooter-icon {
            width: 60px;
            height: 60px;
            background-color: rgba(67, 97, 238, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.5rem;
        }
        
        .scooter-info {
            flex-grow: 1;
        }
        
        .scooter-info h4 {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--dark);
        }
        
        .scooter-info p {
            color: var(--gray);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }
        
        .scooter-meta {
            display: flex;
            gap: 1rem;
            margin-top: 0.5rem;
        }
        
        .scooter-meta span {
            font-size: 0.8rem;
            color: var(--gray);
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }
        
        .scooter-actions {
            display: flex;
            gap: 0.5rem;
        }
        
        .diagnostic-section {
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--gray-light);
        }
        
        .diagnostic-item {
            display: flex;
            justify-content: space-between;
            padding: 0.8rem 0;
            border-bottom: 1px solid var(--gray-light);
        }
        
        .diagnostic-item:last-child {
            border-bottom: none;
        }
        
        .diagnostic-item .label {
            font-weight: 500;
            color: var(--dark);
        }
        
        .diagnostic-item .value {
            font-weight: 600;
        }
        
        .status-indicator {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-right: 0.5rem;
        }
        
        .status-good {
            background-color: var(--success);
        }
        
        .status-warning {
            background-color: var(--warning);
        }
        
        .status-critical {
            background-color: var(--danger);
        }
        
        .progress-container {
            width: 100%;
            background-color: var(--gray-light);
            border-radius: 8px;
            margin: 0.5rem 0;
        }
        
        .progress-bar {
            height: 8px;
            border-radius: 8px;
            background-color: var(--primary);
        }
        
        .health-score {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
            text-align: center;
            margin: 1rem 0;
        }
        
        .health-description {
            text-align: center;
            color: var(--gray);
            margin-bottom: 1.5rem;
        }
        
        @media (max-width: 768px) {
            .profile-grid {
                grid-template-columns: 1fr;
            }
            
            .card {
                padding: 1.5rem;
            }
            
            header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
            
            .user-actions {
                width: 100%;
                justify-content: space-between;
            }
            
            .scooter-card {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .scooter-actions {
                margin-left: 0;
                width: 100%;
                justify-content: flex-end;
            }
            
            .modal-content {
                width: 95%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
    <header>
        <div class="logo">
            <i class="fas fa-bolt"></i>
            <span>Electric House</span>
        </div>

        <div class="volver-principal">
            <a href="{{ route('cliente') }}" class="btn btn-primary">
                <i class="fas fa-home"></i> Volver a la página principal
            </a>
        </div>

        <div class="user-actions">
            <button class="btn btn-outline">
                <i class="fas fa-bell"></i>
            </button>
            <button class="btn btn-outline">
                <i class="fas fa-cog"></i>
            </button>
        </div>
    </header>

        
        <!-- Sección de Perfil -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">
                    <i class="fas fa-user-circle"></i>
                    Mi Perfil
                </h2>
                <button class="btn btn-primary" id="editProfileBtn">
                    <i class="fas fa-edit"></i>
                    Editar Perfil
                </button>
            </div>
            
            <div class="profile-grid">
                <div class="form-group">
                    <label>Nombre Completo</label>
                    <input type="text" class="form-control" value="Juan Pérez Rodríguez" readonly>
                </div>
                <div class="form-group">
                    <label>Correo Electrónico</label>
                    <input type="email" class="form-control" value="juan.perez@example.com" readonly>
                </div>
                <div class="form-group">
                    <label>Teléfono</label>
                    <input type="tel" class="form-control" value="+52 55 1234 5678" readonly>
                </div>
                <div class="form-group">
                    <label>Dirección</label>
                    <input type="text" class="form-control" value="Av. Reforma 123, CDMX" readonly>
                </div>
                <div class="form-group">
                    <label>Fecha de Registro</label>
                    <input type="text" class="form-control" value="15 de Marzo, 2023" readonly>
                </div>
                <div class="form-group">
                    <label>Estado de Cuenta</label>
                    <input type="text" class="form-control" value="Activa" readonly>
                </div>
            </div>
        </div>
        
        <!-- Sección de Patinetas -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">
                    <i class="fas fa-scooter"></i>
                    Mis Patinetas
                </h2>
                <button class="btn btn-primary" id="addScooterBtn">
                    <i class="fas fa-plus"></i>
                    Agregar Patineta
                </button>
            </div>
            
            <div class="scooter-card">
                <div class="scooter-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <div class="scooter-info">
                    <h4>Xiaomi Mi Scooter Pro 2</h4>
                    <p>Número de serie: PSXIA123456789</p>
                    <div class="scooter-meta">
                        <span><i class="fas fa-palette"></i> Negro mate</span>
                        <span><i class="fas fa-calendar-alt"></i> Registrada: 15/03/2023</span>
                        <span class="badge badge-diagnostic"><i class="fas fa-heartbeat"></i> Salud: 82%</span>
                    </div>
                </div>
                <div class="scooter-actions">
                    <button class="action-btn edit">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button class="action-btn diagnostic" id="viewDiagnostic1">
                        <i class="fas fa-chart-line"></i>
                    </button>
                    <button class="action-btn delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            
            <div class="scooter-card">
                <div class="scooter-icon" style="background-color: rgba(248, 150, 30, 0.1); color: var(--warning);">
                    <i class="fas fa-scooter"></i>
                </div>
                <div class="scooter-info">
                    <h4>Segway Ninebot MAX</h4>
                    <p>Número de serie: PSSEG987654321</p>
                    <div class="scooter-meta">
                        <span><i class="fas fa-palette"></i> Blanco perla</span>
                        <span><i class="fas fa-calendar-alt"></i> Registrada: 22/05/2023</span>
                        <span class="badge badge-diagnostic"><i class="fas fa-heartbeat"></i> Salud: 64%</span>
                    </div>
                </div>
                <div class="scooter-actions">
                    <button class="action-btn edit">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button class="action-btn diagnostic" id="viewDiagnostic2">
                        <i class="fas fa-chart-line"></i>
                    </button>
                    <button class="action-btn delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Sección de Citas -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">
                    <i class="fas fa-calendar-check"></i>
                    Mis Citas de Servicio
                </h2>
                <button class="btn btn-primary" id="addAppointmentBtn">
                    <i class="fas fa-plus"></i>
                    Nueva Cita
                </button>
            </div>
            
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Patineta</th>
                            <th>Servicio</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <strong>10 Jun 2023</strong><br>
                                <small>10:00 - 11:00 AM</small>
                            </td>
                            <td>Xiaomi Mi Scooter Pro 2</td>
                            <td>Mantenimiento general</td>
                            <td><span class="badge badge-primary">Confirmada</span></td>
                            <td>
                                <div class="actions">
                                    <button class="action-btn edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <button class="action-btn delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>25 Jun 2023</strong><br>
                                <small>03:30 - 04:30 PM</small>
                            </td>
                            <td>Segway Ninebot MAX</td>
                            <td>Cambio de batería</td>
                            <td><span class="badge badge-warning">Pendiente</span></td>
                            <td>
                                <div class="actions">
                                    <button class="action-btn edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <button class="action-btn delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>05 Jul 2023</strong><br>
                                <small>09:00 - 10:00 AM</small>
                            </td>
                            <td>Xiaomi Mi Scooter Pro 2</td>
                            <td>Revisión de frenos</td>
                            <td><span class="badge badge-success">Completada</span></td>
                            <td>
                                <div class="actions">
                                    <button class="action-btn edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <button class="btn btn-diagnostic" style="padding: 0.3rem 0.6rem; font-size: 0.8rem;">
                                        <i class="fas fa-file-alt"></i> Ver Diagnóstico
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Modal Editar Perfil -->
    <div class="modal" id="profileModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">
                    <i class="fas fa-user-edit"></i>
                    Editar Perfil
                </h3>
                <button class="close-btn">&times;</button>
            </div>
            <div class="modal-body">
                <form id="profileForm">
                    <div class="form-group">
                        <label>Nombre Completo</label>
                        <input type="text" class="form-control" value="Juan Pérez Rodríguez">
                    </div>
                    <div class="form-group">
                        <label>Correo Electrónico</label>
                        <input type="email" class="form-control" value="juan.perez@example.com">
                    </div>
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="tel" class="form-control" value="+52 55 1234 5678">
                    </div>
                    <div class="form-group">
                        <label>Dirección</label>
                        <textarea class="form-control" rows="3">Av. Reforma 123, CDMX</textarea>
                    </div>
                    <div class="form-group">
                        <label>Nueva Contraseña</label>
                        <input type="password" class="form-control" placeholder="Dejar en blanco para no cambiar">
                    </div>
                    <div class="form-group">
                        <label>Confirmar Contraseña</label>
                        <input type="password" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" id="cancelProfileEdit">
                    Cancelar
                </button>
                <button class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    Guardar Cambios
                </button>
            </div>
        </div>
    </div>
    
    <!-- Modal Agregar Patineta -->
    <div class="modal" id="scooterModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">
                    <i class="fas fa-scooter"></i>
                    Agregar Patineta
                </h3>
                <button class="close-btn">&times;</button>
            </div>
            <div class="modal-body">
                <form id="scooterForm">
                    <div class="form-group">
                        <label>Marca</label>
                        <select class="form-control">
                            <option>Seleccionar marca</option>
                            <option>Xiaomi</option>
                            <option>Segway</option>
                            <option>Ninebot</option>
                            <option>Dualtron</option>
                            <option>Otra</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Modelo</label>
                        <input type="text" class="form-control" placeholder="Ej. Mi Scooter Pro 2">
                    </div>
                    <div class="form-group">
                        <label>Número de Serie</label>
                        <input type="text" class="form-control" placeholder="PS123456789">
                    </div>
                    <div class="form-group">
                        <label>Color</label>
                        <input type="text" class="form-control" placeholder="Ej. Negro mate">
                    </div>
                    <div class="form-group">
                        <label>Fecha de Compra</label>
                        <input type="date" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" id="cancelScooterAdd">
                    Cancelar
                </button>
                <button class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Agregar Patineta
                </button>
            </div>
        </div>
    </div>
    
    <!-- Modal Diagnóstico de Patineta -->
    <div class="modal" id="diagnosticModal">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h3 class="modal-title">
                    <i class="fas fa-chart-line"></i>
                    Diagnóstico de Patineta
                </h3>
                <button class="close-btn">&times;</button>
            </div>
            <div class="modal-body">
                <div class="scooter-info" style="display: flex; align-items: center; gap: 1.5rem; margin-bottom: 1.5rem;">
                    <div class="scooter-icon" style="width: 50px; height: 50px; font-size: 1.2rem;">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <div>
                        <h4 style="margin-bottom: 0.2rem;">Xiaomi Mi Scooter Pro 2</h4>
                        <p style="color: var(--gray); font-size: 0.9rem;">Número de serie: PSXIA123456789</p>
                    </div>
                </div>
                
                <div style="background-color: rgba(67, 97, 238, 0.05); border-radius: 12px; padding: 1.5rem; margin-bottom: 1.5rem;">
                    <div class="health-score">82%</div>
                    <div class="health-description">Estado general de la patineta: Bueno</div>
                    <div class="progress-container">
                        <div class="progress-bar" style="width: 82%;"></div>
                    </div>
                </div>
                
                <h4 style="margin-bottom: 1rem; color: var(--dark);">Detalles del Diagnóstico</h4>
                
                <div class="diagnostic-section">
                    <div class="diagnostic-item">
                        <span class="label"><span class="status-indicator status-good"></span> Batería</span>
                        <span class="value">85% capacidad</span>
                    </div>
                    <div class="diagnostic-item">
                        <span class="label"><span class="status-indicator status-good"></span> Motor</span>
                        <span class="value">Óptimo funcionamiento</span>
                    </div>
                    <div class="diagnostic-item">
                        <span class="label"><span class="status-indicator status-warning"></span> Frenos</span>
                        <span class="value">Pastillas al 65%</span>
                    </div>
                    <div class="diagnostic-item">
                        <span class="label"><span class="status-indicator status-good"></span> Neumáticos</span>
                        <span class="value">Presión correcta</span>
                    </div>
                    <div class="diagnostic-item">
                        <span class="label"><span class="status-indicator status-critical"></span> Suspensión</span>
                        <span class="value">Requiere revisión</span>
                    </div>
                </div>
                
                <div class="diagnostic-section">
                    <h5 style="margin-bottom: 1rem; color: var(--dark);">Últimos Servicios</h5>
                    <div class="diagnostic-item">
                        <span class="label">05 Jul 2023</span>
                        <span class="value">Revisión de frenos</span>
                    </div>
                    <div class="diagnostic-item">
                        <span class="label">15 Abr 2023</span>
                        <span class="value">Cambio de batería</span>
                    </div>
                    <div class="diagnostic-item">
                        <span class="label">10 Ene 2023</span>
                        <span class="value">Mantenimiento general</span>
                    </div>
                </div>
                
                <div class="diagnostic-section">
                    <h5 style="margin-bottom: 1rem; color: var(--dark);">Recomendaciones</h5>
                    <ul style="padding-left: 1.5rem; color: var(--gray);">
                        <li style="margin-bottom: 0.5rem;">Reemplazar pastillas de freno en los próximos 200km</li>
                        <li style="margin-bottom: 0.5rem;">Revisar sistema de suspensión lo antes posible</li>
                        <li style="margin-bottom: 0.5rem;">Calibrar neumáticos cada 2 meses</li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" id="cancelDiagnostic">
                    Cerrar
                </button>
                <button class="btn btn-primary">
                    <i class="fas fa-calendar-alt"></i>
                    Agendar Servicio
                </button>
            </div>
        </div>
    </div>
    
    <!-- Modal Confirmación Eliminar -->
    <div class="modal" id="confirmModal">
        <div class="modal-content" style="max-width: 400px;">
            <div class="modal-header">
                <h3 class="modal-title">
                    <i class="fas fa-exclamation-triangle"></i>
                    Confirmar Eliminación
                </h3>
                <button class="close-btn">&times;</button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro que deseas eliminar este elemento? Esta acción no se puede deshacer.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" id="cancelDelete">
                    Cancelar
                </button>
                <button class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                    Eliminar
                </button>
            </div>
        </div>
    </div>
    
    <script>
        // Funcionalidad de los modales
        document.addEventListener('DOMContentLoaded', function() {
            // Elementos del DOM
            const profileModal = document.getElementById('profileModal');
            const scooterModal = document.getElementById('scooterModal');
            const diagnosticModal = document.getElementById('diagnosticModal');
            const confirmModal = document.getElementById('confirmModal');
            
            const editProfileBtn = document.getElementById('editProfileBtn');
            const addScooterBtn = document.getElementById('addScooterBtn');
            const addAppointmentBtn = document.getElementById('addAppointmentBtn');
            const viewDiagnostic1 = document.getElementById('viewDiagnostic1');
            const viewDiagnostic2 = document.getElementById('viewDiagnostic2');
            
            const closeBtns = document.querySelectorAll('.close-btn');
            const cancelProfileEdit = document.getElementById('cancelProfileEdit');
            const cancelScooterAdd = document.getElementById('cancelScooterAdd');
            const cancelDiagnostic = document.getElementById('cancelDiagnostic');
            const cancelDelete = document.getElementById('cancelDelete');
            
            // Abrir modales
            editProfileBtn.addEventListener('click', () => toggleModal(profileModal));
            addScooterBtn.addEventListener('click', () => toggleModal(scooterModal));
            addAppointmentBtn.addEventListener('click', () => toggleModal(scooterModal));
            viewDiagnostic1.addEventListener('click', () => toggleModal(diagnosticModal));
            viewDiagnostic2.addEventListener('click', () => {
                // Cambiar datos para la segunda patineta
                const modal = diagnosticModal;
                modal.querySelector('.scooter-icon').style.backgroundColor = 'rgba(248, 150, 30, 0.1)';
                modal.querySelector('.scooter-icon').style.color = 'var(--warning)';
                modal.querySelector('h4').textContent = 'Segway Ninebot MAX';
                modal.querySelector('p').textContent = 'Número de serie: PSSEG987654321';
                modal.querySelector('.health-score').textContent = '64%';
                modal.querySelector('.health-description').textContent = 'Estado general de la patineta: Requiere atención';
                modal.querySelector('.progress-bar').style.width = '64%';
                
                // Actualizar items de diagnóstico
                const diagnosticItems = modal.querySelectorAll('.diagnostic-item');
                diagnosticItems[0].querySelector('.value').textContent = '72% capacidad';
                diagnosticItems[1].querySelector('.value').textContent = 'Funcionamiento normal';
                diagnosticItems[2].querySelector('.value').textContent = 'Pastillas al 40%';
                diagnosticItems[3].querySelector('.value').textContent = 'Presión baja';
                diagnosticItems[4].querySelector('.value').textContent = 'Requiere reemplazo';
                
                // Cambiar indicadores de estado
                const statusIndicators = modal.querySelectorAll('.status-indicator');
                statusIndicators[0].className = 'status-indicator status-warning';
                statusIndicators[1].className = 'status-indicator status-good';
                statusIndicators[2].className = 'status-indicator status-critical';
                statusIndicators[3].className = 'status-indicator status-warning';
                statusIndicators[4].className = 'status-indicator status-critical';
                
                toggleModal(modal);
            });
            
            // Cerrar modales
            closeBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    document.querySelectorAll('.modal').forEach(modal => {
                        modal.classList.remove('active');
                    });
                });
            });
            
            cancelProfileEdit.addEventListener('click', () => toggleModal(profileModal));
            cancelScooterAdd.addEventListener('click', () => toggleModal(scooterModal));
            cancelDiagnostic.addEventListener('click', () => toggleModal(diagnosticModal));
            cancelDelete.addEventListener('click', () => toggleModal(confirmModal));
            
            // Botones de acción en las tablas/tarjetas
            document.querySelectorAll('.action-btn.edit').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    toggleModal(profileModal); // o scooterModal según corresponda
                });
            });
            
            document.querySelectorAll('.action-btn.delete').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    toggleModal(confirmModal);
                });
            });
            
            // Función para alternar modales
            function toggleModal(modal) {
                modal.classList.toggle('active');
            }
            
            // Cerrar modal al hacer clic fuera del contenido
            window.addEventListener('click', function(e) {
                if (e.target.classList.contains('modal')) {
                    document.querySelectorAll('.modal').forEach(modal => {
                        modal.classList.remove('active');
                    });
                }
            });
            
            // Simular envío de formularios
            document.getElementById('profileForm').addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Perfil actualizado correctamente');
                toggleModal(profileModal);
            });
            
            document.getElementById('scooterForm').addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Patineta agregada correctamente');
                toggleModal(scooterModal);
            });
        });
    </script>
</body>
</html>
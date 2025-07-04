<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | ElectricHouse</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6c63ff;
            --primary-dark: #4d44db;
            --accent: #ff6584;
            --dark: #2d2d3a;
            --light: #f8f9fa;
            --gray: #6c757d;
            --light-gray: #e9ecef;
            --white: #ffffff;
            --danger: #dc3545;
            --success: #28a745;
            --transition: all 0.3s ease;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --border-radius: 12px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            color: var(--dark);
            line-height: 1.6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            background-image: url('https://images.unsplash.com/photo-1627855437693-dcc7b0c4ba7b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(108, 99, 255, 0.8), rgba(45, 45, 58, 0.9));
            z-index: 1;
        }

        .register-container {
            position: relative;
            z-index: 2;
            background-color: var(--white);
            width: 100%;
            max-width: 500px;
            padding: 40px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            transform: translateY(0);
            transition: var(--transition);
            overflow: hidden;
        }

        .register-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .register-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
        }

        h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 25px;
            text-align: center;
            position: relative;
        }

        h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            border-radius: 3px;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo i {
            color: var(--primary);
            font-size: 2.5rem;
        }

        .logo span {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: var(--primary);
            font-size: 1.8rem;
            margin-left: 10px;
            vertical-align: middle;
        }

        .error-message {
            background-color: rgba(220, 53, 69, 0.1);
            color: var(--danger);
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid var(--danger);
            font-size: 0.9rem;
        }

        .error-message i {
            margin-right: 10px;
            font-size: 1.1rem;
        }

        .error-list {
            background-color: rgba(220, 53, 69, 0.1);
            color: var(--danger);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid var(--danger);
            font-size: 0.9rem;
            list-style-position: inside;
        }

        .error-list li {
            margin-bottom: 5px;
        }

        .error-list li:last-child {
            margin-bottom: 0;
        }

        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            flex: 1;
            position: relative;
            margin-bottom: 0;
        }

        .form-group.full-width {
            flex: 0 0 100%;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark);
            font-size: 0.95rem;
        }

        .input-field {
            position: relative;
        }

        input {
            width: 100%;
            padding: 14px 15px 14px 45px;
            border: 1px solid var(--light-gray);
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
            transition: var(--transition);
            background-color: var(--light);
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(108, 99, 255, 0.2);
            background-color: var(--white);
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            font-size: 1.1rem;
        }

        button[type="submit"] {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            border: none;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 1rem;
            cursor: pointer;
            transition: var(--transition);
            margin-top: 10px;
            box-shadow: 0 4px 15px rgba(108, 99, 255, 0.3);
        }

        button[type="submit"]:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(108, 99, 255, 0.4);
        }

        button[type="submit"]:active {
            transform: translateY(0);
        }

        .login-link {
            text-align: center;
            margin-top: 25px;
            color: var(--gray);
            font-size: 0.95rem;
        }

        .login-link a {
            color: var(--primary);
            font-weight: 500;
            text-decoration: none;
            transition: var(--transition);
        }

        .login-link a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .password-strength {
            margin-top: 5px;
            height: 5px;
            background-color: var(--light-gray);
            border-radius: 5px;
            overflow: hidden;
            position: relative;
        }

        .password-strength::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 0;
            background-color: var(--danger);
            transition: var(--transition);
        }

        input[name="contrasena"]:focus ~ .password-strength::after {
            width: 25%;
            background-color: var(--danger);
        }

        input[name="contrasena"]:valid ~ .password-strength::after {
            width: 50%;
            background-color: var(--warning);
        }

        input[name="contrasena"]:valid:not(:focus):not(:placeholder-shown) ~ .password-strength::after {
            width: 75%;
            background-color: var(--success);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
                gap: 20px;
            }
        }

        @media (max-width: 576px) {
            .register-container {
                padding: 30px 20px;
            }

            h2 {
                font-size: 1.7rem;
            }
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .register-container {
            animation: fadeIn 0.6s ease-out forwards;
        }

        /* Floating animation for logo */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        .logo i {
            animation: float 4s ease-in-out infinite;
        }

        /* Tooltip for password requirements */
        .password-tooltip {
            position: relative;
            display: inline-block;
            margin-left: 5px;
            cursor: pointer;
        }

        .password-tooltip .tooltip-text {
            visibility: hidden;
            width: 200px;
            background-color: var(--dark);
            color: var(--white);
            text-align: center;
            border-radius: 6px;
            padding: 10px;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            transition: opacity 0.3s;
            font-size: 0.8rem;
            font-weight: normal;
        }

        .password-tooltip:hover .tooltip-text {
            visibility: visible;
            opacity: 1;
        }

        .password-tooltip .tooltip-text::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: var(--dark) transparent transparent transparent;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="logo">
            <i class="fas fa-bolt"></i>
            <span>Bienvenido</span>
        </div>
        
        <h2>Registro de Usuario</h2>

        @if(session('error'))
            <div class="error-message">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <ul class="error-list">
                @foreach($errors->all() as $error)
                    <li><i class="fas fa-exclamation-circle"></i> {{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('register.attempt') }}">
            @csrf

            <div class="form-row">
                <div class="form-group">
                    <label for="doc_identidad">Documento de Identidad:</label>
                    <div class="input-field">
                        <i class="fas fa-id-card input-icon"></i>
                        <input type="text" id="doc_identidad" name="doc_identidad" placeholder="12345678" required>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="nombre_usuario">Nombre:</label>
                    <div class="input-field">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" id="nombre_usuario" name="nombre_usuario" placeholder="Tu nombre" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <div class="input-field">
                        <i class="fas fa-user-tag input-icon"></i>
                        <input type="text" id="apellido" name="apellido" placeholder="Tu apellido" required>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group full-width">
                    <label for="direccion">Dirección:</label>
                    <div class="input-field">
                        <i class="fas fa-map-marker-alt input-icon"></i>
                        <input type="text" id="direccion" name="direccion" placeholder="Tu dirección completa" required>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <div class="input-field">
                        <i class="fas fa-phone input-icon"></i>
                        <input type="text" id="telefono" name="telefono" placeholder="+52 55 1234 5678" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="correo">Correo:</label>
                    <div class="input-field">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" id="correo" name="correo" placeholder="tucorreo@ejemplo.com" required>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group full-width">
                    <label for="contrasena">Contraseña:
                        <span class="password-tooltip">
                            <i class="fas fa-info-circle"></i>
                            <span class="tooltip-text">Mínimo 8 caracteres, una mayúscula, un número y un carácter especial</span>
                        </span>
                    </label>
                    <div class="input-field">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" id="contrasena" name="contrasena" placeholder="Crea una contraseña segura" required>
                    </div>
                    <div class="password-strength"></div>
                </div>
            </div>

            <button type="submit">Registrarse</button>
        </form>

        <div class="login-link">
            ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a>
        </div>
    </div>

    <script>
        // Password strength indicator
        const passwordInput = document.querySelector('input[name="contrasena"]');
        const passwordStrength = document.querySelector('.password-strength');
        
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;
            
            // Check for length
            if (password.length >= 8) strength += 1;
            
            // Check for uppercase letters
            if (/[A-Z]/.test(password)) strength += 1;
            
            // Check for numbers
            if (/[0-9]/.test(password)) strength += 1;
            
            // Check for special characters
            if (/[^A-Za-z0-9]/.test(password)) strength += 1;
            
            // Update strength indicator
            const strengthBar = passwordStrength.querySelector('::after') || passwordStrength;
            strengthBar.style.width = (strength * 25) + '%';
            
            if (strength < 2) {
                strengthBar.style.backgroundColor = 'var(--danger)';
            } else if (strength < 4) {
                strengthBar.style.backgroundColor = 'var(--warning)';
            } else {
                strengthBar.style.backgroundColor = 'var(--success)';
            }
        });
    </script>
</body>
</html>
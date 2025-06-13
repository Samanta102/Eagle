<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Forma de Pago</title>
    <style>
        /* Copia TODO el CSS de tu create.blade.php aquí */
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --danger-color: #f72585;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --border-radius: 4px;
            --box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            --input-border: #ced4da;
            --input-focus: #80bdff;
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
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }
        
        h1 {
            color: var(--primary-color);
            margin-bottom: 25px;
            text-align: center;
        }
        
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: var(--border-radius);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
            width: 100%;
            margin-top: 15px;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark-color);
        }
        
        input[type="text"] {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid var(--input-border);
            border-radius: var(--border-radius);
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        input[type="text"]:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
        }
        
        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }
        
        .back-link:hover {
            text-decoration: underline;
        }
        
        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 25px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Forma de Pago</h1>
        
        <form action="{{ route('formas_pago.update', $formas_pago) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="nombre">Nombre de la Forma de Pago:</label>
                <input 
                    type="text" 
                    id="nombre" 
                    name="nombre" 
                    value="{{ old('nombre', $formas_pago->nombre) }}" 
                    required
                    placeholder="Ej: Transferencia Bancaria, Efectivo, Tarjeta de Crédito"
                >
            </div>
            
            <button type="submit" class="btn btn-primary">Actualizar Forma de Pago</button>
        </form>
        
        <div class="form-footer">
            <a href="{{ route('formas_pago.index') }}" class="back-link">
                ← Volver al listado
            </a>
        </div>
    </div>
</body>
</html>
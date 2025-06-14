<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formas de Pago</title>
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --danger-color: #DC2525;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --border-radius: 4px;
            --box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }
        
        h1 {
            color: var(--primary-color);
            margin-bottom: 25px;
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 10px;
        }
        
        .btn {
            display: inline-block;
            padding: 8px 16px;
            border-radius: var(--border-radius);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
        }
        
        .btn-danger {
            background-color: var(--danger-color);
            color: white;
        }
        
        .btn-danger:hover {
            opacity: 0.9;
        }
        
        .payment-list {
            list-style: none;
            padding: 0;
        }
        
        .payment-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 15px;
            margin-bottom: 10px;
            background-color: var(--light-color);
            border-radius: var(--border-radius);
            transition: transform 0.2s;
        }
        
        .payment-item:hover {
            transform: translateX(5px);
        }
        
        .payment-name {
            font-weight: 500;
            flex-grow: 1;
        }
        
        .payment-actions {
            display: flex;
            gap: 10px;
        }
        
        .empty-state {
            text-align: center;
            padding: 30px;
            color: #6c757d;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Formas de Pago</h1>
        
        <a href="{{ route('formas_pago.create') }}" class="btn btn-primary">Nueva Forma de Pago</a>
        
        @if($formas->count() > 0)
            <ul class="payment-list">
                @foreach ($formas as $forma)
                    <li class="payment-item">
                        <span class="payment-name">{{ $forma->nombre }}</span>
                        <div class="payment-actions">
                            <a href="{{ route('formas_pago.edit', $forma) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('formas_pago.destroy', $forma) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </li>
                @endforeach

            </ul>
        @else
            <div class="empty-state">
                No hay formas de pago registradas aún.
            </div>
        @endif
    </div>
</body>
</html>
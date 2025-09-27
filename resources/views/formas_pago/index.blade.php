@extends('layouts.app')
@section('title', 'Formas de Pago | Taller Mecánico')
@section('content')

    <style>
        .payment-list {
            list-style: none;
            padding: 0;
            margin-top: 20px;
        }

        .payment-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            margin-bottom: 10px;
            background-color: #fff;
            border-radius: 6px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.2s ease;
            border-bottom: 1px solid #e0e0e0;
        }

        .payment-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .payment-name {
            font-weight: 500;
            flex-grow: 1;
            color: #2c3e50;
        }

        .payment-actions {
            display: flex;
            gap: 10px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .payment-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .payment-actions {
                width: 100%;
                justify-content: flex-end;
            }
        }

        @media (max-width: 480px) {
            .payment-actions {
                flex-direction: column;
                width: 100%;
            }
        }
    </style>

    <div class="main-content">
        <div style="width: 100%; max-width: 1000px; margin: 30px auto 20px auto; display: flex; justify-content: space-between; align-items: center;">
            <h1 style="color: #2c3e50; font-weight: 600; margin: 0; display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-credit-card"></i> Formas de Pago
            </h1>
            <a href="{{ route('formas_pago.create') }}" style="background: #3498db; color: #fff; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: 500; display: inline-flex; align-items: center; gap: 8px;">
                <i class="fas fa-plus"></i> Nueva Forma de Pago
            </a>
        </div>

        @if(session('success'))
            <div style="background: #d4edda; color: #155724; border-left: 4px solid #c3e6cb; padding: 12px 20px; border-radius: 6px; margin-bottom: 15px; min-width: 400px; display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div style="background: #f8d7da; color: #721c24; border-left: 4px solid #f5c6cb; padding: 12px 20px; border-radius: 6px; margin-bottom: 15px; min-width: 400px; display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            </div>
        @endif

        @if($formas->count() > 0)
            <div style="margin: 0 auto; min-width: 1000px; background: #fff; border-radius: 10px; box-shadow: 0 0 20px rgba(0,0,0,0.07); overflow: hidden; padding: 20px;">
                <ul class="payment-list">
                    @foreach ($formas as $forma)
                        <li class="payment-item">
                            <span class="payment-name">{{ $forma->nombre }}</span>
                            <div class="payment-actions">
                                <a href="{{ route('formas_pago.edit', $forma) }}" style="background: #f39c12; color: #fff; text-decoration: none; padding: 7px 14px; border-radius: 4px; font-size: 0.95em; margin-right: 6px; display: inline-block;">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('formas_pago.destroy', $forma) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: #e74c3c; color: #fff; border: none; padding: 7px 14px; border-radius: 4px; font-size: 0.95em; cursor: pointer;" onclick="return confirm('¿Está seguro de eliminar esta forma de pago?')">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <div style="text-align: center; padding: 40px; color: #6c757d; font-style: italic; background: #f5f7fa; border-radius: 8px; margin-top: 20px; min-width: 400px;">
                <i class="fas fa-credit-card" style="font-size:2em;margin-bottom:15px;color:#3498db;"></i>
                <h3>No hay formas de pago registradas</h3>
                <p>Comience agregando una nueva forma de pago</p>
            </div>
        @endif
    </div>

    <script>
        // Confirmación antes de eliminar
        document.querySelectorAll('button[onclick*="confirm"]').forEach(button => {
            button.addEventListener('click', function(e) {
                if (!confirm('¿Está seguro de eliminar esta forma de pago?')) {
                    e.preventDefault();
                }
            });
        });
    </script>

@endsection
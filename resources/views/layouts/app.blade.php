<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Panel')</title>

    {{-- ◽Librerias (https)--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome -->

    {{-- ◽Archivos CSS --}}
    <link rel="stylesheet" href="{{ asset('css/global-variables.css') }}"> <!-- Variables globales (cargar primero) -->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}"> <!-- Sidebar CSS personalizado -->
    <link rel="stylesheet" href="{{ asset('css/topbar.css') }}"> <!-- Topbar CSS personalizado -->
    <link rel="stylesheet" href="{{ asset('css/formulariostyles.css') }}"> <!-- Stylos CSS para formularios (create/edit) -->

    {{-- ◽Archivos que NO estan funcionando! --}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('styles')

</head>
<body id="page-top" style="margin:0; padding:0; background:#f5f7fa;">
    <div style="display: flex; flex-direction: column; min-height: 100vh;">
        @include('layouts.topbar')
        <div style="display: flex; flex: 1; min-height: 0;">
            @include('layouts.sidebar')
            <div style="flex: 1; padding-left: 250px; padding-top: 56px; min-height: 0;">
                <main class="py-4">
                    <!-- Mensajes de error/éxito -->
                    @if(session('error'))
                        <div class="container mt-3">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-bottom: 1rem;">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    
                    @if(session('success'))
                        <div class="container mt-3">
                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom: 1rem;">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    
                    @yield('content')
                </main>
                {{-- @include('layouts.footer') --}}
            </div>
        </div>
    </div>
    @stack('scripts')
</body>
</html>
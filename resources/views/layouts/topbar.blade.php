<div class="topbar">
    <div class="topbar-left">
        <i class="fas fa-tools"></i>
        <span class="topbar-title">
            ELECTRIC HOUSE
        </span>
        {{-- <span class="topbar-page">
            @yield('title', 'Panel de Control')
        </span> --}}
    </div>

    <div class="user-info">
        <span>Administrador {{ session('usuario')->nombre_usuario ?? 'N/A' }}</span>
        <i class="fas fa-user-circle"></i>
        <form action="{{ route('logout') }}" method="GET" onsubmit="return confirm('¿Cerrar sesión?')">
            <button type="submit">
                Cerrar sesión
            </button>
        </form>
    </div>
    
</div>
{{-- filepath: resources/views/layouts/sidebar.blade.php --}}

<aside class="sidebar">

    <ul class="sidebar-menu">

        <li class="menu-item">
            <a href="{{ route('dashboard') }}" class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" title="Dashboard">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('usuarios.index') }}" class="menu-link {{ request()->routeIs('usuarios.*') ? 'active' : '' }}" title="Usuarios">
                <i class="fas fa-users"></i>
                <span>Usuarios</span>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('patinetas.index') }}" class="menu-link {{ request()->routeIs('patinetas.*') ? 'active' : '' }}" title="Patinetas">
                <i class="fas fa-motorcycle"></i>
                <span>Patinetas</span>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('citas.index') }}" class="menu-link" title="Citas">
                <i class="fas fa-calendar-check"></i>
                <span>Citas</span>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('diagnosticos.index') }}" class="menu-link {{ request()->routeIs('diagnosticos.*') ? 'active' : '' }}" title="Diagnósticos">
                <i class="fas fa-file-medical"></i>
                <span>Diagnósticos</span>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('ordenes_servicio.index') }}" class="menu-link {{ request()->routeIs('ordenes_servicio.*') ? 'active' : '' }}" title="Órdenes de Servicio">
                <i class="fas fa-clipboard-list"></i>
                <span>Órdenes de Servicio</span>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('mantenimientos.index') }}" class="menu-link {{ request()->routeIs('mantenimientos.*') ? 'active' : '' }}" title="Mantenimientos">
                <i class="fas fa-tools"></i>
                <span>Mantenimientos</span>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('productos.index') }}" class="menu-link {{ request()->routeIs('productos.*') ? 'active' : '' }}" title="Productos">
                <i class="fas fa-boxes"></i>
                <span>Productos</span>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('formas_pago.index') }}" class="menu-link" title="Tipos de Pago">
                <i class="fas fa-credit-card"></i>
                <span>Tipos de Pago</span>
            </a>
        </li>
        
        <li class="menu-item">
            <a href="{{ route('tipos-iva.index') }}" class="menu-link" title="Tipos de IVA">
                <i class="fas fa-percentage"></i>
                <span>Tipos de IVA</span>
            </a>
        </li>

    </ul>

    {{-- <div>
        <form action="{{ route('logout') }}" method="GET" onsubmit="return confirm('¿Cerrar sesión?')">
            <button type="submit" style="width: 100%; padding: 10px 0; background-color: #3498db; color: #fff; border: none; border-radius: 6px; font-weight: 600; font-size: 1rem; cursor: pointer; margin-bottom: 10px;">Cerrar sesión</button>
        </form>
    </div> --}}

</aside>
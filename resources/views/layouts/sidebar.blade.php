{{-- filepath: resources/views/layouts/sidebar.blade.php --}}
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-tools" style="font-size: 2rem; color: #fff;"></i>
        </div>
        <span class="sidebar-brand-text mx-2">EAGLE TALLER</span>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item mt-2 mb-2">
        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
        <i class="fas fa-tachometer-alt"></i>
        <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Módulos</div>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('usuarios.*') ? 'active' : '' }}" href="{{ route('usuarios.index') }}">
        <i class="fas fa-users"></i>
        <span>Usuarios</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('patinetas.*') ? 'active' : '' }}" href="{{ route('patinetas.index') }}">
        <i class="fas fa-motorcycle"></i>
        <span>Patinetas</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('diagnosticos.*') ? 'active' : '' }}" href="{{ route('diagnosticos.index') }}">
        <i class="fas fa-file-medical"></i>
        <span>Diagnósticos</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('ordenes_servicio.*') ? 'active' : '' }}" href="{{ route('ordenes_servicio.index') }}">
        <i class="fas fa-clipboard-list"></i>
        <span>Órdenes de Servicio</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('mantenimientos.*') ? 'active' : '' }}" href="{{ route('mantenimientos.index') }}">
        <i class="fas fa-tools"></i>
        <span>Mantenimientos</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('productos.*') ? 'active' : '' }}" href="{{ route('productos.index') }}">
        <i class="fas fa-boxes"></i>
        <span>Productos</span>
        </a>
    </li>

    <hr class="sidebar-divider mt-3">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-corner border-0" id="sidebarToggle"></button>
    </div>
</ul>
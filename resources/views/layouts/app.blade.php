<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'SSO Manager'))</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="{{ asset('css/app-ui.css') }}" rel="stylesheet">
</head>
<body class="dashboard-body">
    <div class="app-shell" id="appShell">
        <aside class="sidebar shadow-sm" id="sidebar">
            <div class="sidebar-header">
                <a href="{{ route('dashboard') }}" class="sidebar-brand">
                    <span class="brand-mark brand-mark-xs"><i class="bi bi-shield-lock"></i></span>
                    <span class="brand-text">SSO Manager</span>
                </a>
            </div>
            <nav class="sidebar-nav">
                <a class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class="bi bi-grid-1x2"></i><span>Dashboard</span></a>
                <a class="sidebar-link {{ request()->routeIs('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}"><i class="bi bi-people"></i><span>Usuarios</span></a>
                <a class="sidebar-link" href="#"><i class="bi bi-app-indicator"></i><span>Aplicaciones</span></a>
                <a class="sidebar-link" href="#"><i class="bi bi-key"></i><span>Credenciales</span></a>
                <a class="sidebar-link" href="#"><i class="bi bi-activity"></i><span>Actividad</span></a>
                <a class="sidebar-link" href="#"><i class="bi bi-sliders"></i><span>Configuracion</span></a>
            </nav>
            <div class="sidebar-footer">
                <div class="account-chip">
                    <i class="bi bi-buildings"></i>
                    <div>
                        <span>{{ auth()->user()->name }}</span>
                        <small>{{ ucfirst(auth()->user()->account_type ?? 'business') }}</small>
                    </div>
                </div>
            </div>
        </aside>

        <div class="sidebar-backdrop" data-sidebar-close></div>

        <div class="app-main">
            <nav class="navbar navbar-expand bg-white app-navbar shadow-sm">
                <div class="container-fluid px-3 px-lg-4">
                    <button class="btn btn-icon" type="button" id="sidebarToggle" aria-label="Alternar menu lateral">
                        <i class="bi bi-list"></i>
                    </button>
                    <div class="ms-3">
                        <p class="navbar-eyebrow mb-0">Panel principal</p>
                        <h1 class="navbar-title mb-0">@yield('page-title', 'Dashboard')</h1>
                    </div>
                    <div class="ms-auto d-flex align-items-center gap-2">
                        <button class="btn btn-icon d-none d-sm-inline-flex" type="button" aria-label="Notificaciones">
                            <i class="bi bi-bell"></i>
                        </button>
                        <div class="dropdown">
                            <button class="btn profile-button dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                                <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                                <li><span class="dropdown-item-text text-secondary small">{{ auth()->user()->email }}</span></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="bi bi-box-arrow-right me-2"></i>Cerrar sesion
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <main class="app-content">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const shell = document.getElementById('appShell');
        const toggle = document.getElementById('sidebarToggle');
        const closeTargets = document.querySelectorAll('[data-sidebar-close]');

        toggle.addEventListener('click', () => {
            if (window.matchMedia('(max-width: 991.98px)').matches) {
                shell.classList.toggle('sidebar-open');
                return;
            }

            shell.classList.toggle('sidebar-collapsed');
        });

        closeTargets.forEach((target) => {
            target.addEventListener('click', () => shell.classList.remove('sidebar-open'));
        });
    </script>
    @stack('scripts')
</body>
</html>

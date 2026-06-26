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
<body class="auth-body">
    <main class="auth-shell container-fluid">
        <div class="row g-0 min-vh-100">
            <section class="col-lg-6 auth-showcase d-none d-lg-flex">
                <div class="auth-showcase-content">
                    <span class="brand-mark mb-4"><i class="bi bi-shield-lock"></i></span>
                    <p class="text-uppercase small fw-semibold text-primary mb-3">SSO Manager</p>
                    <h1 class="display-5 fw-bold mb-4">Acceso seguro para equipos modernos.</h1>
                    <p class="lead text-secondary mb-5">Administra sesiones, usuarios y aplicaciones desde una experiencia limpia, rapida y preparada para crecer.</p>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="metric-tile">
                                <i class="bi bi-buildings"></i>
                                <strong>Business</strong>
                                <span>Cuenta por defecto</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="metric-tile">
                                <i class="bi bi-fingerprint"></i>
                                <strong>Seguro</strong>
                                <span>Sesion protegida</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="col-12 col-lg-6 d-flex align-items-center justify-content-center p-4 p-sm-5">
                <div class="auth-card shadow-lg">
                    @yield('content')
                </div>
            </section>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

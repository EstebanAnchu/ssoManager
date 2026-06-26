@extends('layouts.app')

@section('title', 'Dashboard | '.config('app.name', 'SSO Manager'))
@section('page-title', 'Dashboard')

@section('content')
    <section class="dashboard-hero shadow-sm">
        <div>
            <span class="badge text-bg-primary-subtle text-primary-emphasis mb-3">
                <i class="bi bi-buildings me-1"></i>Cuenta business activa
            </span>
            <h2 class="fw-bold mb-2">Hola, {{ auth()->user()->name }}</h2>
            <p class="text-secondary mb-0">Tu espacio de autenticacion esta listo para administrar usuarios, aplicaciones y actividad.</p>
        </div>
        <div class="hero-action">
            <button class="btn btn-light shadow-sm"><i class="bi bi-plus-circle me-2"></i>Nueva aplicacion</button>
        </div>
    </section>

    <section class="row g-4 mt-1">
        <div class="col-12 col-md-6 col-xl-3">
            <article class="stat-card shadow-sm">
                <div class="stat-icon bg-primary-subtle text-primary"><i class="bi bi-people"></i></div>
                <span>Usuarios activos</span>
                <strong>128</strong>
                <small><i class="bi bi-arrow-up-right"></i> 12% este mes</small>
            </article>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
            <article class="stat-card shadow-sm">
                <div class="stat-icon bg-success-subtle text-success"><i class="bi bi-app-indicator"></i></div>
                <span>Aplicaciones</span>
                <strong>24</strong>
                <small><i class="bi bi-check2-circle"></i> Todas operativas</small>
            </article>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
            <article class="stat-card shadow-sm">
                <div class="stat-icon bg-warning-subtle text-warning"><i class="bi bi-key"></i></div>
                <span>Tokens emitidos</span>
                <strong>3.4k</strong>
                <small><i class="bi bi-clock-history"></i> Ultimas 24h</small>
            </article>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
            <article class="stat-card shadow-sm">
                <div class="stat-icon bg-info-subtle text-info"><i class="bi bi-shield-check"></i></div>
                <span>Estado SSO</span>
                <strong>99.9%</strong>
                <small><i class="bi bi-lightning-charge"></i> Disponible</small>
            </article>
        </div>
    </section>

    <section class="row g-4 mt-1">
        <div class="col-12 col-xl-8">
            <article class="panel-card shadow-sm">
                <div class="panel-header">
                    <div>
                        <h3 class="h5 fw-bold mb-1">Actividad reciente</h3>
                        <p class="text-secondary mb-0">Eventos importantes del entorno</p>
                    </div>
                    <button class="btn btn-outline-primary btn-sm"><i class="bi bi-filter me-1"></i>Filtrar</button>
                </div>
                <div class="activity-list">
                    <div class="activity-item">
                        <span class="activity-icon text-success bg-success-subtle"><i class="bi bi-person-check"></i></span>
                        <div>
                            <strong>Nuevo acceso aprobado</strong>
                            <p>Un usuario inicio sesion correctamente desde una ubicacion confiable.</p>
                        </div>
                        <small>Hace 5 min</small>
                    </div>
                    <div class="activity-item">
                        <span class="activity-icon text-primary bg-primary-subtle"><i class="bi bi-app"></i></span>
                        <div>
                            <strong>Aplicacion sincronizada</strong>
                            <p>El proveedor de identidad actualizo la configuracion de SSO.</p>
                        </div>
                        <small>Hace 28 min</small>
                    </div>
                    <div class="activity-item">
                        <span class="activity-icon text-warning bg-warning-subtle"><i class="bi bi-exclamation-triangle"></i></span>
                        <div>
                            <strong>Revision recomendada</strong>
                            <p>Hay credenciales que pronto necesitaran rotacion.</p>
                        </div>
                        <small>Hace 1 h</small>
                    </div>
                </div>
            </article>
        </div>
        <div class="col-12 col-xl-4">
            <article class="panel-card shadow-sm h-100">
                <div class="panel-header">
                    <div>
                        <h3 class="h5 fw-bold mb-1">Progreso</h3>
                        <p class="text-secondary mb-0">Configuracion inicial</p>
                    </div>
                </div>
                <div class="progress-stack">
                    <div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Perfil business</span>
                            <strong>100%</strong>
                        </div>
                        <div class="progress" role="progressbar" aria-label="Perfil business" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Aplicaciones</span>
                            <strong>64%</strong>
                        </div>
                        <div class="progress" role="progressbar" aria-label="Aplicaciones" aria-valuenow="64" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-success" style="width: 64%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Seguridad</span>
                            <strong>82%</strong>
                        </div>
                        <div class="progress" role="progressbar" aria-label="Seguridad" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-info" style="width: 82%"></div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('title', 'Usuarios | '.config('app.name', 'SSO Manager'))
@section('page-title', 'Usuarios')

@section('content')
    <section class="dashboard-hero shadow-sm mb-4">
        <div>
            <span class="badge text-bg-primary-subtle text-primary-emphasis mb-3">
                <i class="bi bi-people me-1"></i>Gestion de usuarios
            </span>
            <h2 class="fw-bold mb-2">Usuarios del sistema</h2>
            <p class="text-secondary mb-0">Administra accesos, perfiles y credenciales desde una sola pantalla.</p>
        </div>
        <div class="hero-action">
            <button class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#createUserModal">
                <i class="bi bi-person-plus me-2"></i>Nuevo usuario
            </button>
        </div>
    </section>

    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-exclamation-triangle me-2"></i>{{ $errors->first() }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    <article class="panel-card shadow-sm">
        <div class="users-toolbar">
            <div>
                <h3 class="h5 fw-bold mb-1">Listado</h3>
                <p class="text-secondary mb-0">El usuario con ID 1 esta protegido contra eliminacion.</p>
            </div>
            <div class="search-box">
                <i class="bi bi-search"></i>
                <input type="search" id="userSearch" value="{{ $search }}" class="form-control" placeholder="Buscar por nombre, correo o tipo">
            </div>
        </div>

        <div id="usersTable">
            @include('users.partials.table', ['users' => $users])
        </div>
    </article>

    @include('users.partials.form-modal', [
        'modalId' => 'createUserModal',
        'title' => 'Nuevo usuario',
        'action' => route('users.store'),
        'method' => 'POST',
        'user' => null,
        'submitLabel' => 'Crear usuario',
    ])
@endsection

@push('scripts')
    <script>
        const searchInput = document.getElementById('userSearch');
        const usersTable = document.getElementById('usersTable');
        let searchTimer;

        const loadUsers = async (url = null) => {
            const targetUrl = new URL(url || '{{ route('users.index') }}', window.location.origin);
            targetUrl.searchParams.set('search', searchInput.value);

            const response = await fetch(targetUrl, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                },
            });

            usersTable.innerHTML = await response.text();
            window.history.replaceState({}, '', targetUrl);
        };

        searchInput.addEventListener('input', () => {
            clearTimeout(searchTimer);
            searchTimer = setTimeout(() => loadUsers(), 250);
        });

        usersTable.addEventListener('click', (event) => {
            const link = event.target.closest('.pagination a');

            if (! link) {
                return;
            }

            event.preventDefault();
            loadUsers(link.href);
        });
    </script>
@endpush

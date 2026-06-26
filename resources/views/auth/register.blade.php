@extends('layouts.auth')

@section('title', 'Registro | '.config('app.name', 'SSO Manager'))

@section('content')
    <div class="mb-4">
        <span class="brand-mark brand-mark-sm mb-3"><i class="bi bi-building-add"></i></span>
        <h2 class="fw-bold mb-2">Crea tu cuenta business</h2>
        <p class="text-secondary mb-0">El registro se activa como perfil business automaticamente.</p>
    </div>

    <form method="POST" action="{{ route('register.store') }}" class="needs-validation" novalidate>
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre completo</label>
            <div class="input-group input-group-modern">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" autocomplete="name" required autofocus>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electronico</label>
            <div class="input-group input-group-modern">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" autocomplete="email" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contrasena</label>
            <div class="input-group input-group-modern">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" autocomplete="new-password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="form-label">Confirmar contrasena</label>
            <div class="input-group input-group-modern">
                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" autocomplete="new-password" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-lg w-100 mb-4">
            <i class="bi bi-person-plus me-2"></i>Registrarme
        </button>

        <p class="text-center text-secondary mb-0">
            Ya tienes cuenta?
            <a class="text-decoration-none fw-semibold" href="{{ route('login') }}">Inicia sesion</a>
        </p>
    </form>
@endsection

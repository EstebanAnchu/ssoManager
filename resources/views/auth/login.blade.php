@extends('layouts.auth')

@section('title', 'Iniciar sesion | '.config('app.name', 'SSO Manager'))

@section('content')
    <div class="mb-4">
        <span class="brand-mark brand-mark-sm mb-3"><i class="bi bi-shield-check"></i></span>
        <h2 class="fw-bold mb-2">Bienvenido de nuevo</h2>
        <p class="text-secondary mb-0">Ingresa a tu panel para gestionar tu cuenta.</p>
    </div>

    <form method="POST" action="{{ route('login.store') }}" class="needs-validation" novalidate>
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Correo electronico</label>
            <div class="input-group input-group-modern">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" autocomplete="email" required autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contrasena</label>
            <div class="input-group input-group-modern">
                <span class="input-group-text"><i class="bi bi-key"></i></span>
                <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" autocomplete="current-password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label text-secondary" for="remember">Recordarme</label>
            </div>
            <a class="text-decoration-none fw-semibold" href="{{ route('register') }}">Crear cuenta</a>
        </div>

        <button type="submit" class="btn btn-primary btn-lg w-100">
            <i class="bi bi-box-arrow-in-right me-2"></i>Iniciar sesion
        </button>
    </form>
@endsection

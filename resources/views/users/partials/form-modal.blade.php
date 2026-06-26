<div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-labelledby="{{ $modalId }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" action="{{ $action }}" class="modal-content user-modal">
            @csrf
            @if ($method !== 'POST')
                @method($method)
            @endif

            <div class="modal-header">
                <div>
                    <p class="modal-eyebrow mb-1">Gestion de usuarios</p>
                    <h2 class="modal-title h5 fw-bold" id="{{ $modalId }}Label">{{ $title }}</h2>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3 text-start">
                    <label for="{{ $modalId }}Name" class="form-label">Nombre</label>
                    <div class="input-group input-group-modern">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input id="{{ $modalId }}Name" name="name" type="text" class="form-control" value="{{ old('name', $user?->name) }}" required>
                    </div>
                </div>

                <div class="mb-3 text-start">
                    <label for="{{ $modalId }}Email" class="form-label">Correo electronico</label>
                    <div class="input-group input-group-modern">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input id="{{ $modalId }}Email" name="email" type="email" class="form-control" value="{{ old('email', $user?->email) }}" required>
                    </div>
                </div>

                <div class="mb-3 text-start">
                    <label for="{{ $modalId }}Type" class="form-label">Tipo de cuenta</label>
                    <div class="input-group input-group-modern">
                        <span class="input-group-text"><i class="bi bi-buildings"></i></span>
                        <select id="{{ $modalId }}Type" name="account_type" class="form-select" required>
                            @foreach (['business' => 'Business', 'admin' => 'Admin', 'operator' => 'Operator'] as $value => $label)
                                <option value="{{ $value }}" @selected(old('account_type', $user?->account_type ?? 'business') === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3 text-start">
                    <label for="{{ $modalId }}Password" class="form-label">
                        Contrasena
                        @if ($user)
                            <span class="text-secondary fw-normal">(opcional)</span>
                        @endif
                    </label>
                    <div class="input-group input-group-modern">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input id="{{ $modalId }}Password" name="password" type="password" class="form-control" {{ $user ? '' : 'required' }}>
                    </div>
                </div>

                <div class="text-start">
                    <label for="{{ $modalId }}PasswordConfirmation" class="form-label">Confirmar contrasena</label>
                    <div class="input-group input-group-modern">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input id="{{ $modalId }}PasswordConfirmation" name="password_confirmation" type="password" class="form-control" {{ $user ? '' : 'required' }}>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check2-circle me-2"></i>{{ $submitLabel }}
                </button>
            </div>
        </form>
    </div>
</div>

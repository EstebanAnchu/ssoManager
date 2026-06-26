<div class="table-responsive">
    <table class="table users-table align-middle mb-0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Tipo</th>
                <th>Creado</th>
                <th class="text-end">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td class="fw-semibold">#{{ $user->id }}</td>
                    <td>
                        <div class="user-cell">
                            <span class="avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                            <div>
                                <strong>{{ $user->name }}</strong>
                                <small>{{ $user->email }}</small>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge text-bg-primary-subtle text-primary-emphasis">
                            {{ ucfirst($user->account_type ?? 'business') }}
                        </span>
                    </td>
                    <td class="text-secondary">{{ $user->created_at?->format('d/m/Y') }}</td>
                    <td class="text-end">
                        <div class="d-inline-flex gap-2">
                            <button class="btn btn-icon btn-icon-sm" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->id }}" aria-label="Editar usuario {{ $user->name }}">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-icon btn-icon-sm text-danger" data-bs-toggle="modal" data-bs-target="#deleteUserModal{{ $user->id }}" aria-label="Eliminar usuario {{ $user->name }}" @disabled($user->id === 1)>
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>

                        @include('users.partials.form-modal', [
                            'modalId' => 'editUserModal'.$user->id,
                            'title' => 'Editar usuario',
                            'action' => route('users.update', $user),
                            'method' => 'PUT',
                            'user' => $user,
                            'submitLabel' => 'Guardar cambios',
                        ])

                        @include('users.partials.delete-modal', ['user' => $user])
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        <div class="empty-state">
                            <i class="bi bi-search"></i>
                            <strong>No hay usuarios para mostrar</strong>
                            <span>Prueba con otro termino de busqueda.</span>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="users-pagination">
    {{ $users->links() }}
</div>

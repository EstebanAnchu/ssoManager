<div class="modal fade" id="deleteUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="deleteUserModal{{ $user->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" action="{{ route('users.destroy', $user) }}" class="modal-content user-modal">
            @csrf
            @method('DELETE')

            <div class="modal-header">
                <div>
                    <p class="modal-eyebrow mb-1">Confirmar eliminacion</p>
                    <h2 class="modal-title h5 fw-bold" id="deleteUserModal{{ $user->id }}Label">Eliminar usuario</h2>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body text-start">
                <div class="delete-warning">
                    <i class="bi bi-exclamation-triangle"></i>
                    <div>
                        <strong>{{ $user->name }}</strong>
                        <span>{{ $user->email }}</span>
                    </div>
                </div>
                <p class="text-secondary mb-0 mt-3">Esta accion eliminara el usuario seleccionado. El registro con ID 1 esta protegido y no puede ser eliminado.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger" @disabled($user->id === 1)>
                    <i class="bi bi-trash me-2"></i>Eliminar
                </button>
            </div>
        </form>
    </div>
</div>

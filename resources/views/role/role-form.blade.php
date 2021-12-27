<div wire:ignore.self class="modal fade" id="roleForm" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New User Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="roleModalForm">
                    <div class="row">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Role Title:</label>
                            <input type="text" class="form-control @error('role_name') is-invalid @enderror"
                                wire:model='role_name'>
                            @error('role_name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" wire:click.prevent='addRole'>Add User Role</button>
            </div>
        </div>
    </div>
</div>
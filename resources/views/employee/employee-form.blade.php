<div wire:ignore.self class="modal fade" id="employeeForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="employeeModalForm">
                    <div class="row">
                        <div class="col-12 col-md-5 border-end">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">IC Number:</label>
                                <input type="text" class="form-control @error('icno') is-invalid @enderror" wire:model.defer='icno'>
                                @error('icno') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Fullname:</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model.defer='name' maxlength="255">
                                @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Date of Birth:</label>
                                <input type="date" class="form-control @error('dob') is-invalid @enderror" wire:model.defer='dob'>
                                @error('dob') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">User Role: <span class="text-muted">(Optional)</span></label>
                                <select wire:model.defer='role' class="form-control">
                                    <option value="">Not Assigned</option>
                                    @foreach ($roles as $item)
                                        <option value="{{ $item->id }}">{{ $item->role_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-7">
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Street Address:</label>
                                <input type="text" class="form-control @error('street_address') is-invalid @enderror" wire:model.defer='street_address' maxlength="255">
                                @error('street_address') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 col-md-6">
                                    <label for="message-text" class="col-form-label">Postcode:</label>
                                    <input type="text" class="form-control @error('postcode') is-invalid @enderror" wire:model.defer='postcode' maxlength="255">
                                @error('postcode') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="message-text" class="col-form-label">City:</label>
                                    <input type="text" class="form-control @error('city') is-invalid @enderror" wire:model.defer='city' maxlength="255">
                                @error('city') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">State:</label>
                                <input type="text" class="form-control @error('state') is-invalid @enderror" wire:model.defer='state' maxlength="255">
                                @error('state') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Country:</label>
                                <input type="text" class="form-control @error('country') is-invalid @enderror" wire:model.defer='country' maxlength="255">
                                @error('country') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" wire:click.prevent='addEmployee'>Add Employee</button>
            </div>
        </div>
    </div>
</div>
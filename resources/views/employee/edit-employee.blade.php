@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Employee') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{ route('employee.update', ['employee' => $employee->id]) }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('Put')
                        <div class="row">
                            <div class="col-12 col-md-5 border-end">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">IC Number:</label>
                                    <input type="text" class="form-control @error('icno') is-invalid @enderror"
                                        id="icno" name="icno" value="{{ $employee->icno }}">
                                    @error('icno') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Fullname:</label>
                                    <input type="text" class="form-control @error('fullname') is-invalid @enderror"
                                        id='fullname' name="fullname" maxlength="255" value="{{ $employee->fullname }}">
                                    @error('fullname') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Date of Birth:</label>
                                    <input type="date" class="form-control @error('dateofbirth') is-invalid @enderror"
                                        id='dateofbirth' name="dateofbirth" value="{{ date('Y-m-d', $employee->dateofbirth) }}">
                                    @error('dateofbirth') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">User Role: <span
                                            class="text-muted">(Optional)</span></label>
                                    <select id='role_id' name="role_id" class="form-control">
                                        <option value="">Not Assigned</option>
                                        @foreach ($roles as $item)
                                        <option value="{{ $item->id }}" @if ($item->id == $employee->role_id) selected @endif>{{ $item->role_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Street Address:</label>
                                    <input type="text"
                                        class="form-control @error('street_address') is-invalid @enderror"
                                        id='street_address' name='street_address' maxlength="255" value="{{ $employee->address->street_address }}">
                                    @error('street_address') <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12 col-md-6">
                                        <label for="message-text" class="col-form-label">Postcode:</label>
                                        <input type="text" class="form-control @error('postcode') is-invalid @enderror"
                                            id='postcode' name='postcode' maxlength="255" value="{{ $employee->address->postcode }}">
                                        @error('postcode') <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="message-text" class="col-form-label">City:</label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror"
                                            id='city' name='city' maxlength="255" value="{{ $employee->address->city }}">
                                        @error('city') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">State:</label>
                                    <input type="text" class="form-control @error('state') is-invalid @enderror"
                                        id='state' name='state' maxlength="255" value="{{ $employee->address->state }}">
                                    @error('state') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Country:</label>
                                    <input type="text" class="form-control @error('country') is-invalid @enderror"
                                        id='country' name='country' maxlength="255" value="{{ $employee->address->country }}">
                                    @error('country') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
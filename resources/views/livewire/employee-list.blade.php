<div>
    {{-- <div class="d-flex mb-3">
        <button type="button" class="btn btn-sm btn-success me-2" wire:click.defer='$set("status", "1")'>Active</button>
        <button type="button" class="btn btn-sm btn-secondary" wire:click.defer='$set("status", "0")'>Inactive</button>
    </div> --}}

    <div class="d-flex mb-3 justify-content-between">
        <div class="d-flex">
            <input type="text" wire:model.defer='search' placeholder="Search by IC/Name..." class="form-control me-4">
            <button class="btn btn-primary me-2" wire:click.prevent='applyFilter'>Apply</button>
            <button class="btn btn-danger" wire:click.prevent='resetFilter'>Reset</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
            data-bs-target="#employeeForm">Add
            new Employee</button>
    </div>

    @include('employee.filter')

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>IC Number</th>
                    <th>Full Name</th>
                    <th>Date of Birth</th>
                    <th>Nationality</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->icno }}</td>
                    <td>{{ $item->fullname }}</td>
                    <td>{{ date('d M Y', $item->dateofbirth) }}</td>
                    <td>{{ $item->address->country ?? '-' }}</td>
                    <td>{{ $item->role->role_name ?? '-' }}</td>
                    <td><span class="badge @if($item->status->is(1)) bg-success @else bg-danger @endif">{{
                            $item->status->description }}</span></td>
                    <td>
                        <a class="btn btn-sm btn-outline-primary"
                            href="{{ route('employee.edit', ['employee' => $item->id]) }}">Edit</a>
                        <button class="btn btn-sm btn-outline-danger"
                            wire:click.prevent='updateEmployee({{ $item->id }})'>{{ $item->status->is(1) ? "Disable" :
                            "Enable" }}</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $employees->links() }}

    @include('employee.employee-form')

    <script>
        window.addEventListener('employee-added', event => {
            $('#employeeForm').modal('hide');
            $('#employeeModalForm')[0].reset();
        })
    </script>
</div>
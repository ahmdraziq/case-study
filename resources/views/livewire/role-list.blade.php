<div>
    <div class="d-flex mb-3 justify-content-end">
        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
            data-bs-target="#roleForm">Add
            new User Role</button>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Role Title</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->role_name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $roles->links() }}

    @include('role.role-form')

    <script>
        window.addEventListener('role-added', event => {
            $('#roleForm').modal('hide');
            $('#roleModalForm')[0].reset();
        })
    </script>
</div>
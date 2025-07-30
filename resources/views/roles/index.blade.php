@extends('layouts.app', ['activePage' => 'roles', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Roles & Permission', 'activeButton' => 'master'])

@section('content')
    @can('role-list')
        <div class="content">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Role Management</h2>
                        <p class="text-sm mb-0">
                            Here you can manage roles of the application. You can add, edit, or delete roles as needed.
                        </p>
                    </div>

                    <div class="pull-right">
                        @can('role-create')
                            <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
                        @endcan
                    </div>
                </div>
            </div>

            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th width="600px">Permissions</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($roles as $key => $role)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @if (!empty($role->permissions))
                                        @foreach ($role->permissions as $permission)
                                            <span class="badge badge-info">{{ $permission->name }}</span>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}"><i
                                            class="fa fa-eye"></i></a>
                                    @can('role-edit')
                                        <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">
                                            <i class="fa fa-edit"></i></a>
                                    @endcan
                                    @can('role-delete')
                                        <button type="button" class="btn btn-danger btn-delete-role"
                                            data-role-id="{{ $role->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <form id="delete-role-form-{{ $role->id }}"
                                            action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $roles->links('pagination::bootstrap-4') }}
            </div>
        @endcan


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.btn-delete-role').forEach(function(btn) {
                    btn.addEventListener('click', function(e) {
                        e.preventDefault();
                        const roleId = this.getAttribute('data-role-id');
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "This action cannot be undone.",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('delete-role-form-' + roleId).submit();
                            }
                        });
                    });
                });
            });
        </script>
    @endsection

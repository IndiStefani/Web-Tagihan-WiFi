@extends('layouts.app', ['activePage' => 'user-management', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'User Management', 'activeButton' => 'master'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card data-tables">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Users</h3>
                                    <p class="text-sm mb-0">
                                        Here you can manage users of the application. You can add, edit, or delete users
                                        as needed.
                                    </p>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-success">Add user</a>
                                </div>
                            </div>
                        </div>

                        @include('alerts.success')

                        <div class="col-12 mt-2">
                        </div>

                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $user)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if (!empty($user->getRoleNames()))
                                                    @foreach ($user->getRoleNames() as $v)
                                                        <span
                                                            class="badge badge-{{ $v == 'Admin' ? 'success' : 'primary' }}">{{ $v }}</span>
                                                    @endforeach
                                                @endif
                                            </td>

                                            <td class="d-flex justify-content-center">
                                                <a class="btn btn-info" href="{{ route('users.show', $user->id) }}"><i
                                                        class="fa fa-eye"></i></a>
                                                <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}"><i
                                                        class="fa fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger btn-delete-user"
                                                    data-user-id="{{ $user->id }}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <form id="delete-user-form-{{ $user->id }}"
                                                    action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $data->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-delete-user').forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const userId = this.getAttribute('data-user-id');
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
                            document.getElementById('delete-user-form-' + userId).submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection

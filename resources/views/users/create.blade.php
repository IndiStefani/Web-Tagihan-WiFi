@extends('layouts.app', ['activePage' => 'user-management', 'title' => 'Soses.NET Dashboard Tagihan by Stepheeen', 'navName' => 'User Management', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Create User</h4>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('users.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="confirm-password">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm-password"
                                        name="confirm-password" required>
                                </div>
                                <div class="d-flex justify-content-center align-items-center" style="min-height: 80px;">
                                    <button type="submit" class="btn btn-primary">Create User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

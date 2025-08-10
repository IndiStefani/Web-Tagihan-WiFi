@extends('layouts.app', ['activePage' => 'user', 'title' => 'Edit User', 'navName' => 'User Management', 'activeButton' => 'master'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="section-image">
                <div class="row">
                    <div class="card col-md-12">
                        <div class="card-header">
                            <h3 class="mb-0">Edit User</h3>
                        </div>

                        <div class="card-body">
                            <h6 class="heading-small text-muted mb-4">Mengubah Informasi Pengguna</h6>
                            @include('alerts.success')
                            @include('alerts.error_self_update', ['key' => 'not_allow_user'])

                            <div class="pl-lg-4">
                                {!! Form::model($user, [
                                    'method' => 'PATCH',
                                    'route' => ['profile.update'],
                                    'enctype' => 'multipart/form-data',
                                    'autocomplete' => 'off',
                                ]) !!}

                                @include('users._form', ['mode' => 'edit'])

                                <div class="text-center">
                                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    {{-- Tambahkan sidebar profil jika diperlukan --}}
                </div>
            </div>
        </div>
    </div>
@endsection

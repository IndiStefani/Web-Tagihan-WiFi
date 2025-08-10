@extends('layouts.app', ['activePage' => 'user', 'title' => 'Detail User', 'navName' => 'User Management', 'activeButton' => 'master'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="section-image">
                <div class="row">
                    <div class="card col-md-12">
                        <div class="card-header">
                            <h3 class="mb-0">Detail User</h3>
                        </div>

                        <div class="card-body">
                            <form method="GET" action="#" autocomplete="off">
                                <h6 class="heading-small text-muted mb-4">Informasi Pengguna</h6>
                                <div class="pl-lg-4">
                                    @include('users._form', ['mode' => 'show'])

                                    <div class="text-center mt-4">
                                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- Tambahkan sidebar profil jika diperlukan --}}
                </div>
            </div>
        </div>
    </div>
@endsection

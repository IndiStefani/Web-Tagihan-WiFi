@extends('layouts.app', ['activePage' => 'pelanggan', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Pelanggan', 'activeButton' => ''])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card data-tables">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Data Pelanggan</h3>
                                    <p class="text-sm mb-0">
                                        List of all registered customers.
                                    </p>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-success">Tambah Pelanggan</a>
                                </div>
                            </div>
                        </div>

                        @include('alerts.success')

                        <div class="col-12 mt-2">
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Wilayah</th>
                                        <th>No. Telepon</th>
                                        <th>Tanggal Pemasangan</th>
                                        <th>Biaya Bulanan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($pelanggans as $key => $pelanggan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pelanggan->nama }}</td>
                                            <td>{{ $pelanggan->alamat }}</td>
                                            <td>{{ $pelanggan->wilayah }}</td>
                                            <td>{{ $pelanggan->no_telepon }}</td>
                                            <td>{{ $pelanggan->tanggal_pemasangan }}</td>
                                            <td>Rp.{{ number_format($pelanggan->biaya_bulanan, 0, ',', '.') }}</td>
                                            <td>
                                                <a href="{{ route('pelanggan.show', $pelanggan->id) }}"
                                                    class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>

                                                <a href="{{ route('pelanggan.edit', $pelanggan->id) }}"
                                                    class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>

                                                <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data pelanggan.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $pelanggans->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app', ['activePage' => 'pelanggan', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Pelanggan', 'activeButton' => ''])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card data-tables">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h3 class="mb-0">Data Pelanggan</h3>
                                    <p class="text-sm mb-0">
                                        List of all registered customers.
                                    </p>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{ route('pelanggan.create') }}" class="btn btn-sm btn-success">
                                        <i class="fa fa-plus"></i> input pelanggan
                                    </a>

                                    <a href="#" class="btn btn-sm btn-info"
                                        onclick="document.getElementById('importFile').click()">
                                        <i class="fa fa-upload"></i> import pelanggan
                                    </a>

                                    <form id="importForm" action="{{ route('pelanggan.import') }}" method="POST"
                                        enctype="multipart/form-data" style="display: none;">
                                        @csrf
                                        <input type="file" name="file" id="importFile" accept=".csv,.xlsx"
                                            onchange="document.getElementById('importForm').submit();">
                                    </form>

                                    <a href="{{ route('pelanggan.export') }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-download"></i> export pelanggan
                                    </a>
                                </div>

                            </div>
                        </div>

                        @include('alerts.success')

                        <div class="col-12 mt-2">
                        </div>

                        <div class="card-body">
                            <table id="tabel-pelanggan" class="table table-striped display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Wilayah</th>
                                        <th>Penarik</th>
                                        <th>No. Telepon</th>
                                        {{-- <th>Tanggal Pemasangan</th> --}}
                                        <th>Biaya Bulanan</th>
                                        <th>Status</th>
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
                                            <td>{{ $pelanggan->penarik->name ?? '-' }}</td>
                                            <td>{{ $pelanggan->no_telepon }}</td>
                                            {{-- <td>{{ $pelanggan->tanggal_pemasangan }}</td> --}}
                                            <td>Rp.{{ number_format($pelanggan->biaya_bulanan, 0, ',', '.') }}</td>
                                            <td>
                                                @if ($pelanggan->status === 'aktif')
                                                    <span class="badge bg-success">Aktif</span>
                                                @else
                                                    <span class="badge bg-danger">Tidak Aktif</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('pelanggan.show', $pelanggan->id) }}"
                                                    class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>

                                                <a href="{{ route('pelanggan.edit', $pelanggan->id) }}"
                                                    class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>

                                                <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center align-middle">
                                                <p class="text-muted fst-italic my-2">Tidak ada data pelanggan.</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{-- <div class="d-flex justify-content-center">
                                {{ $pelanggans->links('pagination::bootstrap-4') }}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#tabel-pelanggan').DataTable();
        });
    </script>
@endpush

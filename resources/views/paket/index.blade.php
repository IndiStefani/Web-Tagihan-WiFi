@extends('layouts.app', ['activePage' => 'paket', 'title' => 'Soses.NET Dashboard Tagihan by Stepheeen', 'navName' => 'Paket', 'activeButton' => ''])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card data-tables">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h3 class="mb-0">Data Paket</h3>
                                    <p class="text-sm mb-0">
                                        List of all registered customers.
                                    </p>
                                </div>
                                {{-- <div class="col-6 text-right">
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
                                </div> --}}

                            </div>
                        </div>

                        @include('alerts.success')

                        <div class="col-12 mt-2">
                        </div>

                        <div class="card-body">
                            <table id="tabel-paket" class="table table-striped display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Paket</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($pakets as $key => $paket)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $paket->nama_paket }}</td>
                                            <td>Rp.{{ number_format($paket->harga ?? '-', 0, ',', '.') }}</td>
                                            {{-- <td>
                                                <a href="{{ route('paket.show', $paket->id) }}"
                                                    class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>

                                                <a href="{{ route('paket.edit', $paket->id) }}"
                                                    class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>

                                                <form action="{{ route('paket.destroy', $paket->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </td> --}}
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center align-middle">
                                                <p class="text-muted fst-italic my-2">Tidak ada data paket.</p>
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
            $('#tabel-paket').DataTable();
        });
    </script>
@endpush

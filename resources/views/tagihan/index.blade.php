@extends('layouts.app', ['activePage' => 'tagihan', 'title' => 'Soses.NET Dashboard Tagihan by Stepheeen', 'navName' => 'Tagihan', 'activeButton' => '',])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card data-tables">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h3 class="mb-0">Data Tagihan</h3>
                                    <p class="text-sm mb-0">
                                        List of all customer bills.
                                    </p>
                                </div>
                            </div>
                        </div>

                        @include('alerts.success')

                        <div class="card-body">
                            <table id="tabel-tagihan" class="table table-striped display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Tanggal Tagihan</th>
                                        <th>Jumlah Tagihan</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($tagihans as $tagihan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $tagihan->pelanggan->nama ?? '-' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($tagihan->tanggal_tagihan)->format('d/m/Y') }}</td>
                                            <td>Rp.{{ number_format($tagihan->jumlah_tagihan, 0, ',', '.') }}</td>
                                            <td>
                                                @if ($tagihan->status === 'lunas')
                                                    <span class="badge bg-success">Lunas</span>
                                                @else
                                                    <button class="badge btn-sm btn-secondary">Belum</button>
                                                    <!-- Tombol Bayar -->
                                                    <button type="button" class="btn btn-sm btn-warning"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalBayar{{ $tagihan->id }}">
                                                        <i class="nc-icon nc-credit-card"></i>
                                                    </button>

                                                    <!-- Modal Bayar -->
                                                    <div class="modal fade" id="modalBayar{{ $tagihan->id }}"
                                                        tabindex="-1" aria-labelledby="modalBayarLabel{{ $tagihan->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <form action="{{ route('tagihan.updateStatus', $tagihan->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="modalBayarLabel{{ $tagihan->id }}">
                                                                            Pembayaran Tagihan</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Client:
                                                                            <strong>{{ $tagihan->pelanggan->nama ?? '-' }}</strong>
                                                                        </p>
                                                                        <p>Service:
                                                                            <strong>{{ $tagihan->keterangan ?? '-' }}</strong>
                                                                        </p>

                                                                        <div class="mb-3">
                                                                            <label class="form-label">Jumlah Bayar</label>
                                                                            <input type="number" name="payment"
                                                                                value="{{ $tagihan->jumlah_tagihan }}"
                                                                                class="form-control" required>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label class="form-label">Metode Pembayaran</label>
                                                                            <select name="payment_method"
                                                                                class="form-select" required>
                                                                                <option value="Tunai">Tunai</option>
                                                                                <option value="Transfer">Transfer</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label class="form-label">Tanggal
                                                                                Pembayaran</label>
                                                                            <input type="date" name="payment_date"
                                                                                value="{{ now()->toDateString() }}"
                                                                                class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-success">Simpan</button>
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Batal</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>{{ $tagihan->keterangan ?? '-' }}</td>
                                            <td>
                                                <a href="{{ route('tagihan.show', $tagihan->id) }}"
                                                    class="btn btn-sm btn-info">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('tagihan.edit', $tagihan->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{ route('tagihan.destroy', $tagihan->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center align-middle">
                                                <p class="text-muted fst-italic my-2">Tidak ada data tagihan.</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
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
            $('#tabel-tagihan').DataTable();
        });
    </script>
@endpush

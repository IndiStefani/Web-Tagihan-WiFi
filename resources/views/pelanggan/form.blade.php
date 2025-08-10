<form action="{{ $mode === 'edit' ? route('pelanggan.update', $pelanggan->id) : '#' }}" method="POST">
    @csrf
    @if ($mode === 'edit')
        @method('PUT')
    @endif

    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama', $pelanggan->nama) }}"
            {{ $mode === 'show' ? 'readonly' : '' }}>
    </div>

    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" name="alamat" id="alamat" rows="2" {{ $mode === 'show' ? 'readonly' : '' }}>{{ old('alamat', $pelanggan->alamat) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="wilayah" class="form-label">Wilayah</label>
        <input type="text" class="form-control" name="wilayah" id="wilayah"
            value="{{ old('wilayah', $pelanggan->wilayah) }}" {{ $mode === 'show' ? 'readonly' : '' }}>
    </div>

    <div class="mb-3">
        <label for="penarik" class="form-label">Penarik</label>
        <select class="form-control" name="penarik" id="penarik" {{ $mode === 'show' ? 'disabled' : '' }}>
            <option value="aktif" {{ old('penarik', $pelanggan->penarik_id) == 'aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="nonaktif" {{ old('penarik', $pelanggan->penarik_id) == 'non aktif' ? 'selected' : '' }}>Nonaktif
            </option>
        </select>
    </div>

    <div class="mb-3">
        <label for="no_telepon" class="form-label">No Telepon</label>
        <input type="text" class="form-control" name="no_telepon" id="no_telepon"
            value="{{ old('no_telepon', $pelanggan->no_telepon) }}" {{ $mode === 'show' ? 'readonly' : '' }}>
    </div>

    <div class="mb-3">
        <label for="tanggal_pemasangan" class="form-label">Tanggal Pemasangan</label>
        <input type="date" class="form-control" name="tanggal_pemasangan" id="tanggal_pemasangan"
            value="{{ old('tanggal_pemasangan', $pelanggan->tanggal_pemasangan) }}"
            {{ $mode === 'show' ? 'readonly' : '' }}>
    </div>

    <div class="mb-3">
        <label for="biaya_bulanan" class="form-label">Biaya Bulanan</label>
        <input type="number" class="form-control" name="biaya_bulanan" id="biaya_bulanan"
            value="{{ old('biaya_bulanan', $pelanggan->biaya_bulanan) }}" {{ $mode === 'show' ? 'readonly' : '' }}>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-control" name="status" id="status" {{ $mode === 'show' ? 'disabled' : '' }}>
            <option value="aktif" {{ old('status', $pelanggan->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="nonaktif" {{ old('status', $pelanggan->status) == 'non aktif' ? 'selected' : '' }}>Nonaktif
            </option>
        </select>
    </div>

    @if ($mode === 'edit')
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    @else
        <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
    @endif
</form>

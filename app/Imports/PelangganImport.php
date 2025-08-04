<?php

namespace App\Imports;

use App\Models\Pelanggan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PelangganImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Pelanggan([
            'nama'              => $row['nama'],
            'alamat'            => $row['alamat'],
            'wilayah'           => $row['wilayah'],
            'no_telepon'        => $row['no_telepon'],
            'tanggal_pemasangan'=> $row['tanggal_pemasangan'],
            'biaya_bulanan'     => $row['biaya_bulanan'],
            'penarik_id'        => $row['penarik_id'] ?? null, // Assuming penarik_id can be null
            'status'            => $row['status'], // Default status if
        ]);
    }
}

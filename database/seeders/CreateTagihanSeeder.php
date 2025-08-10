<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use App\Models\Tagihan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateTagihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pelangganList = Pelanggan::all();

        foreach ($pelangganList as $pelanggan) {
            Tagihan::create([
                'pelanggan_id' => $pelanggan->id,
                'tanggal_tagihan' => Carbon::now()->startOfMonth(),
                'jumlah_tagihan' => rand(50000, 200000), // nominal random contoh
                'status' => 'belum',
                'keterangan' => 'Tagihan Bulan ' . Carbon::now()->format('F Y'),
            ]);
        }
    }
}

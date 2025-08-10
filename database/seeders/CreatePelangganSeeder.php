<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreatePelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Alternatively, you can manually create a record
        // \App\Models\Pelanggan::create([
        //     'nama' => 'John Doe',
        //     'alamat' => '123 Main St',
        //     'wilayah' => 'Downtown',
        //     'no_telepon' => '1234567890',
        //     'tanggal_pemasangan' => now(),
        //     'biaya_bulanan' => 50000,
        //     'penarik_id' => 1, // Assuming penarik with ID 1 exists
        // ]);

        // Membuat 15 data pelanggan secara manual tanpa factory
        for ($i = 1; $i <= 15; $i++) {
            Pelanggan::create([
            'nama' => 'Pelanggan ' . $i,
            'alamat' => 'Alamat ' . $i,
            'no_telp' => '0812345678' . str_pad($i, 2, '0', STR_PAD_LEFT),
            'user' => 'user' . $i,
            'tanggal_pasang' => now()->subDays($i),
            'paket_id' => rand(1, 3), // Assuming there are 5 paket records
            'biaya_pasang' => rand(100000, 500000), // Random biaya_pasang between 100000 and 500000
            'penarik_id' => rand(2, 5), // Assign penarik_id randomly, some may be null
            'kurang' => rand(0, 100000), // Random kurang between 0 and 100000
            ]);
        }
    }
}

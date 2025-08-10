<?php

namespace Database\Seeders;

use App\Models\Paket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreatePaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // You can use the Eloquent model to seed the 'paket' table
        Paket::insert([
            ['nama_paket' => '2 MB', 'harga' => 50000],
            ['nama_paket' => '3 MB', 'harga' => 100000],
            ['nama_paket' => '5 MB', 'harga' => 150000],
            ['nama_paket' => '8 MB', 'harga' => 200000],
            ['nama_paket' => '10 MB', 'harga' => 250000],
            ['nama_paket' => '15 MB', 'harga' => 300000],
        ]);
    }
}

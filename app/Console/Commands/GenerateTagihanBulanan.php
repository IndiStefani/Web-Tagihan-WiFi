<?php

namespace App\Console\Commands;

use App\Models\Pelanggan;
use App\Models\Tagihan;
use Carbon\Carbon;
use Illuminate\Console\Command;

class GenerateTagihanBulanan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-tagihan-bulanan';
    protected $description = 'Generate taggihan bulanan untuk semua spelanggan';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $bulan = Carbon::now()->format('Y-m');
        $pelangganList = Pelanggan::all();

        foreach ($pelangganList as $pelanggan) {
            $tagihanExist = Tagihan::where('pelanggan_id', $pelanggan->id)
                ->where('tanggal_tagihan', $bulan)
                ->exists();

            if (!$tagihanExist) {
                Tagihan::create([
                    'pelanggan_id' => $pelanggan->id,
                    'tanggal_tagihan' => $bulan,
                    'jumlah_tagihan' => $pelanggan->paket->harga ?? 0,
                    'status' => 'belum',
                    'keterangan' => 'Tagihan Bulan ' . Carbon::now()->format('F Y'),
                ]);
            }
        }

        $this->info('Tagihan bulan ' . $bulan . ' berhasil dibuat.');
    }
}

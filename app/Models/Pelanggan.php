<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';

    protected $fillable = [
        'nama',
        'alamat',
        'wilayah',
        'no_telepon',
        'tanggal_pemasangan',
        'biaya_bulanan',
    ];

    public function penarik()
    {
        return $this->belongsTo(Penarik::class, 'penarik_id');
    }
}

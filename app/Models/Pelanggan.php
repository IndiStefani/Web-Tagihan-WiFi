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
        'no_telp',
        'user',
        'tanggal_pasang',
        'paket_id',
        'biaya_pasang',
        'penarik_id',
        'tagihan_id',
        'kurang'
    ];

    public function penarik()
    {
        return $this->belongsTo(User::class, 'penarik_id');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id');
    }

    public function tagihan()
    {
        return $this->hasMany(Tagihan::class, 'tagihan_id');
    }
}

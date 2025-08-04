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
        'penarik_id',
        'status',
    ];

    public function penarik()
    {
        return $this->belongsTo(User::class, 'penarik_id');
    }
}

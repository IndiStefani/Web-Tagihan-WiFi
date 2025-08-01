<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penarik extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role_id',
        'user_id',
    ];
}

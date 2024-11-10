<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class n2 extends Model
{
    /** @use HasFactory<\Database\Factories\N2Factory> */
    use HasFactory;

    protected $fillable = [
        'nama',
        'tanggal_lahir',
        'asal_daerah',
        'status_verifikasi',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class n3 extends Model
{
    /** @use HasFactory<\Database\Factories\N3Factory> */
    use HasFactory;

    protected $fillable = [
        'nama_pengantin_pria',
        'nama_pengantin_wanita',
        'tanggal_persetujuan',
        'status_persetujuan',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class n1 extends Model
{
    /** @use HasFactory<\Database\Factories\N1Factory> */
    use HasFactory;

    protected $fillable = [
        'nama_calon_pengantin_pria',
        'nama_calon_pengantin_wanita',
        'tanggal_pernikahan',
        'status_persetujuan',
    ];
}

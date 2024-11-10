<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class n4 extends Model
{
    /** @use HasFactory<\Database\Factories\N4Factory> */
    use HasFactory;

    protected $fillable = [
        'nama_ayah',
        'nama_ibu',
        'hubungan',
        'status_kewarganegaraan',
    ];
}

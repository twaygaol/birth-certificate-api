<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domisili extends Model
{
    /** @use HasFactory<\Database\Factories\DomisiliFactory> */
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_tgl_lahir',
        'bangsa_agama',
        'nik',
        'pekerjaan',
        'alamat',
        'tanggal_surat',
        'status',
        'email',
        'file_pdf',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

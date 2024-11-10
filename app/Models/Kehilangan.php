<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehilangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'jenis_kelamin',
        'nik',
        'tempat_tgl_lahir',
        'bangsa_agama',
        'pekerjaan',
        'alamat',
        'kehilangan',
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

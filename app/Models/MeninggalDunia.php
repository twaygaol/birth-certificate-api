<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeninggalDunia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_tgl_lahir',
        'bangsa_agama',
        'tempat_tinggal_akhir',
        'hari_tanggal',
        'pukul',
        'sebab_meninggal',
        'tempat_meninggal',
        'dikebumikan',
        'nama_pelapor',
        'hubungan_pelapor',
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KurangMampu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_tgl_lahir',
        'pekerjaan',
        'tempat_sekolah',
        'nim',
        'tempat_tinggal',
        'nama_ayah',
        'nama_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'tanggungan_anak',
        'penghasilan_ayah',
        'penghasilan_ibu',
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class BirthCertificate extends Model
{
    use HasFactory;

    // Allow mass assignment for these attributes
    protected $fillable = [
        'akun',
        'email',
        'certificate_number',
        'baby_name',
        'gender',
        'birth_date',
        'birth_time',
        'birth_place',
        'hospital_name',
        'birth_order',
        'father_name',
        'father_nik',
        'father_birthplace',
        'father_birthdate',
        'father_job',
        'mother_name',
        'mother_nik',
        'mother_birthplace',
        'mother_birthdate',
        'mother_job',
        'address',
        'village',
        'district',
        'city',
        'province',
        'postal_code',
        'witness1_name',
        'witness1_nik',
        'witness2_name',
        'witness2_nik',
        'registration_date',
        'registrant_name',
        'registrant_relation',
        'registrant_nik',
        'status',
        'rejection_reason',
        'file1',
        'file2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'akun', 'email'); // Pastikan 'akun' sesuai dengan kolom di tabel
    }

}

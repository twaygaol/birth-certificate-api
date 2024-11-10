<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\BirthCertificate;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function birthCertificates()
    {
        return $this->hasMany(BirthCertificate::class, 'email', 'email');
    }

    public function skck()
    {
        return $this->hasMany(Skck::class, 'email', 'email'); // If each user can have many SKCKs
    }

    public function kurangmampu()
    {
        return $this->hasMany(KurangMampu::class, 'email', 'email'); // If each user can have many SKCKs
    }

    public function kehilangan()
    {
        return $this->hasMany(Kehilangan::class, 'email', 'email'); // If each user can have many SKCKs
    }

    public function meninggaldunia()
    {
        return $this->hasMany(MeninggalDunia::class, 'email', 'email'); // If each user can have many SKCKs
    }

    public function domisili()
    {
        return $this->hasMany(Domisili::class, 'email', 'email'); // If each user can have many SKCKs
    }

}

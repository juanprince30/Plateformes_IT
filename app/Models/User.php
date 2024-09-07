<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
        'prenom',
        'description',
        'telepone',
        'telephone_2',
        'ville',
        'addresse',
        'niveau_etude',
        'statut',
        'image',
        'role',
        'date_naissance',
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

    public function Notification()
    { 
        return $this->hasMany(Notification::class);
    }

    public function Certification()
    {
        return $this->hasMany(Certification::class);
    }

    public function Competence()
    {
        return $this->hasMany(Competence::class);
    }

    public function Experience()
    {
        return $this->hasMany(Experience::class);
    }

    public function Offre()
    {
        return $this->hasMany(Offre::class);
    }

    public function Candidacture()
    {
        return $this->hasMany(Candidacture::class);
    }

    public function Discussion()
    {
        return $this->hasMany(Discussion::class);
    }

    public function Reponse()
    {
        return $this->hasMany(Reponse::class);
    }

    public function Cv_et_motivation()
    {
        return $this->hasMany(Cv_et_motivation::class);
    }
}

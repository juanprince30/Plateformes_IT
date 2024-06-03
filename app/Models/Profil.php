<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $fillable= [
        'nom',
        'prenom',
        'description',
        'telephone',
        'telephone_2',
        'ville',
        'addresse',
        'niveau_etude',
        'statut',
        'image',
        'role',
        'user_id',
        'pays_id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Pays()
    {
        return $this->belongsTo(Pays::class);
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
}

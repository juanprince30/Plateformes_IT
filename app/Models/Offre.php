<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;

    protected $fillable=[
        'titre',
        'type_offre',
        'ville',
        'pays',
        'salaire',
        'experience_requis',
        'responsabilite',
        'competence_requis',
        'categorie_id',
        'profil_id',
    ];

    public function Categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function Profil()
    {
        return $this->belongsTo(Profil::class);
    }

    public function Candidacture()
    {
        return $this->hasMany(Candidacture::class);
    }

    public function Notification()
    { 
        return $this->hasMany(Notification::class);
    }
}

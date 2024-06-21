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
        'user_id',
        'etat_offre',
        'date_fin_offre',
        'date_debut_offre',
        'prix',
    ];

    public function Categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
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

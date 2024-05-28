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
}

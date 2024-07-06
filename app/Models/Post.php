<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
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
        'date_debut_offre',
        'date_fin_offre',
        'competence_requis',
        'categorie_id',
        'user_id',
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

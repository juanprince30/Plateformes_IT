<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;

    protected $fillable = [
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



    // protected $casts = [
    //     'competence_requis' => 'array',
    // ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function profil()
    {
        return $this->belongsTo(Profil::class);
    }

    public function candidatures()
    {
        return $this->hasMany(Candidacture::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}

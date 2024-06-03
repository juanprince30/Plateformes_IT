<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable= [
        'entreprise',
        'nom_superviseur',
        'contact_superviseur',
        'travail_actuellement',
        'titre',
        'responsabilite',
        'ville',
        'date_debut',
        'date_fin',
        'profil_id',
        'pays_id',
    ];

    public function Profil()
    {
        return $this->belongsTo(Profil::class);
    }
    public function Pays()
    {
        return $this->belongsTo(Pays::class);
    }
}

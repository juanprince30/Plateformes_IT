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
        'titre',
        'responsabilite',
        'date_debut',
        'date_fin',
        'profil_id',
    ];

    public function Profil()
    {
        return $this->belongsTo(Profil::class);
    }
}

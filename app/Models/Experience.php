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
        'user_id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}

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
    ];
}

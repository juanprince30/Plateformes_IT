<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    protected $fillable=[
        'titre',
        'nom_institut',
        'date_dobtention',
        'fichier',
        'profil_id',
    ];
}

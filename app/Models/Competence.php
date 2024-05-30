<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;

    protected $fillable= [
        'titre',
        'description',
        'profil_id',
        'categorie_id',
    ];

    public function Profil()
    {
        return $this->belongsTo(Profil::class);
    }

    public function Categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}

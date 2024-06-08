<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable=[
        'libelle',
        'description',
    ];

    public function Competence()
    {
        return $this->hasMany(Competence::class);
    }

    public function Offre()
    {
        return $this->hasMany(Offre::class);
    }
    


    public function Discussion()
    {
        return $this->hasMany(Discussion::class);
    }
}

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
        'user_id',
        'categorie_id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}

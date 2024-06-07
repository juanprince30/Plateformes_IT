<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;

    protected $fillable=[
        'sujet',
        'contenu',
        'etat',
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

    public function Reponse()
    {
        return $this->hasMany(Reponse::class);
    }

    public function Notification()
    { 
        return $this->hasMany(Notification::class);
    }
}

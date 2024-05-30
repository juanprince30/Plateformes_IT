<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidacture extends Model
{
    use HasFactory;

    protected $fillable=[
        'motivation',
        'description',
        'profil_id',
        'offre_id'
    ];

    public function Offre()
    {
        return $this->belongsTo(Offre::class);
    }

    public function Profil()
    {
        return $this->belongsTo(Profil::class);
    }

    public function Notification()
    { 
        return $this->hasMany(Notification::class);
    }
}

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
}

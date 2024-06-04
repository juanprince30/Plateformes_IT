<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv_et_motivation extends Model
{
    use HasFactory;

    protected $fillable=[
        'cv',
        'motivation',
        'description',
        'profil_id',
    ];

    public function Profil()
    {
        return $this->belongsTo(Profil::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    use HasFactory;

    protected $fillable=[
        'contenu',
        'user_id',
        'discussion_id',
    ];

    public function Profil()
    {
        return $this->belongsTo(Profil::class);
    }

    public function Discussion()
    {
        return $this->belongsTo(Discussion::class);
    }
}

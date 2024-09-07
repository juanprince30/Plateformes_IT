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

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Discussion()
    {
        return $this->belongsTo(Discussion::class);
    }
}

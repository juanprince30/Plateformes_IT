<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable=[
        'type',
        'message',
        'candidacture_id',
        'user_id',
        'discussion_id',
        'offre_id'
    ];

    public function Candidacture()
    {
        return $this->belongsTo(Candidacture::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Offre()
    {
        return $this->belongsTo(Offre::class);
    }

    public function Discussion()
    {
        return $this->belongsTo(Discussion::class);
    }
}

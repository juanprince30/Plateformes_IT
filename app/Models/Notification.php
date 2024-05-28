<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable=[
        'message',
        'candidacture_id',
        'user_id',
        'discussion_id',
        'offre_id'
    ];
}

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
        'user_id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}

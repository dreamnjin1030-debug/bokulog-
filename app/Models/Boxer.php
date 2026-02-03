<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Boxer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'gym_id',
        'name',
        'content',
        'pictures',
        'sns_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }

    public function posts()
    {
        return $this->hasMany(BoxerPost::class);
    }
}

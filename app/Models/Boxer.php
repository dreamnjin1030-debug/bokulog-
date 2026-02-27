<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Boxer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'gym_id',
        'name',
        'win',
        'lose',
        'draw',
        'titles',
        'comment', // プロフィール文
        'sns_url',
        'pictures', // プロフィール画像
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

    public function followedUsers()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'boxer_id',
            'user_id'
        )->withTimestamps();
    }

    public function isFollowedBy(?\App\Models\User $user): bool
    {
        if (!$user) {
            return false;
        }

        return $this->followedUsers()->where('user_id', $user->id)->exists();
    }
}

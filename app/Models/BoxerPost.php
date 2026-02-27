<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BoxerPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'boxer_id',
        'comment',
    ];

    public function boxer()
    {
        return $this->belongsTo(Boxer::class);
    }

    public function comments()
    {
        return $this->hasMany(BoxerPostComment::class);
    }

    public function likedUsers()
    {
        return $this->belongsToMany(User::class, 'boxer_posts_like')->withTimestamps();
    }

    public function isLikedBy(?User $user): bool
    {
        if (!$user) return false;

        return $this->likedUsers()->where('users.id', $user->id)->exists();
    }
}

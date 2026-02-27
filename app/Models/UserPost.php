<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserPostLike;

class UserPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'boxer_id',
        'title',
        'comment',
        'rating',
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function userPostComments()
    {
        return $this->hasMany(UserPostComment::class);
    }

    //この投稿にいいねしたユーザーたち
    public function likedUsers()
    {
        return $this->belongsToMany(
            User::class,
            'user_post_likes',
            'user_post_id',
            'user_id',
        );
    }
}

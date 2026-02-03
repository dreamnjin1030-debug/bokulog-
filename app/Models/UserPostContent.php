<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserPostContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_post_id',
        'user_id',
        'content'
    ];

    public function userPost()
    {
        return $this->belongsTo(UserPost::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

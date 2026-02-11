<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'boxer_id',
        'title',
        'content',
        'rating',
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function userPostContents()
    {
        return $this->hasMany(UserPostContent::class);
    }
}

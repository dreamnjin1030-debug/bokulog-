<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BoxerPostContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'boxer_posts_id',
        'user_id',
        'content',
    ];
}

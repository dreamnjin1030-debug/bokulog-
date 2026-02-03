<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\factories\HasFactory;

class BoxerPostLike extends Model
{
    use HAsFactory;

    protected $fillable = [
        'boxer_post_id',
        'user_id',
    ];
}

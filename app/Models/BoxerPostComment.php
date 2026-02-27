<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BoxerPostComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'boxer_post_id',
        'user_id',
        'comment'
    ];

    public function post()
    {
        return $this->belongsTo(BoxerPost::class, 'boxer_post_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

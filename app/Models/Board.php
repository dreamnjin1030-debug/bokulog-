<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Hasfactory;

class Board extends Model
{
    use HasFactory;

    protected $fillable = [
        'boxer_id',
        'user_id',
        'content',
    ];

    //投稿先のボクサー
    public function boxer()
    {
        return $this->belongsTo(Boxer::class);
    }

    //投稿したユーザー
    public function user()
    {
        return $this->belongsTo(user::class);
    }
}

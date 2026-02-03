<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BoxerPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'boxer_id',
        'content',
    ];

    public function boxer()
    {
        return $this->belongsTo(Boxer::class);
    }
}

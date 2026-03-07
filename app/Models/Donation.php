<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'boxer_id',
        'amount',
        'payment_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function boxer()
    {
        return $this->belongsTo(Boxer::class);
    }
}

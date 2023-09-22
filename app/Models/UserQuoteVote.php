<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuoteVote extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'quote_id',
        'vote'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }
}

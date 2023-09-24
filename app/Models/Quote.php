<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quote extends Model
{
    use HasFactory;

    public function userQuoteVotes(): HasMany
    {
        return $this->hasMany(UserQuoteVote::class);
    }

    public function upvotes(): int
    {
        return $this->userQuoteVotes()
            ->where('positive', true)
            ->count();
    }

    public function downvotes(): int
    {
        return $this->userQuoteVotes()->where('positive', false)->count();
    }

    public function totalScore(): int
    {
        return $this->upvotes() - $this->downvotes();
    }
}

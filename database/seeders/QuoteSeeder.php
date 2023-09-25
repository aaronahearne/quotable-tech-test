<?php

namespace Database\Seeders;

use App\Models\Quote;
use Illuminate\Database\Seeder;

class QuoteSeeder extends Seeder
{
    private array $movieQuotes = [
        [
            'quote' => "Here's looking at you, kid.",
            'character_name' => "Rick Blaine",
            'movie_name' => "Casablanca"
        ],
        [
            'quote' => "May the Force be with you.",
            'character_name' => "Han Solo",
            'movie_name' => "Star Wars"
        ],
        [
            'quote' => "You can't handle the truth!",
            'character_name' => "Colonel Nathan R. Jessup",
            'movie_name' => "A Few Good Men"
        ],
        [
            'quote' => "You talking to me?",
            'character_name' => "Travis Bickle",
            'movie_name' => "Taxi Driver"
        ],
        [
            'quote' => "There's no place like home.",
            'character_name' => "Dorothy",
            'movie_name' => "The Wizard of Oz"
        ],
        [
            'quote' => "I'll be back.",
            'character_name' => "The Terminator",
            'movie_name' => "The Terminator"
        ],
        [
            'quote' => "To infinity and beyond!",
            'character_name' => "Buzz Lightyear",
            'movie_name' => "Toy Story"
        ],
        [
            'quote' => "Here's Johnny!",
            'character_name' => "Jack Torrance",
            'movie_name' => "The Shining"
        ],
        [
            'quote' => "Why so serious?",
            'character_name' => "The Joker",
            'movie_name' => "The Dark Knight"
        ],
        [
            'quote' => "Life is like a box of chocolates; you never know what you're gonna get.",
            'character_name' => "Forrest Gump",
            'movie_name' => "Forrest Gump"
        ],
        [
            'quote' => "I feel the need—the need for speed!",
            'character_name' => "Maverick",
            'movie_name' => "Top Gun"
        ],
        [
            'quote' => "Keep your friends close, but your enemies closer.",
            'character_name' => "Michael Corleone",
            'movie_name' => "The Godfather Part II"
        ],
        [
            'quote' => "There's no crying in baseball!",
            'character_name' => "Jimmy Dugan",
            'movie_name' => "A League of Their Own"
        ],
        [
            'quote' => "You had me at 'hello.'",
            'character_name' => "Dorothy Boyd",
            'movie_name' => "Jerry Maguire"
        ],
        [
            'quote' => "I coulda been a contender.",
            'character_name' => "Terry Malloy",
            'movie_name' => "On the Waterfront"
        ],
    ];

    public function run()
    {
        collect($this->movieQuotes)->each(function ($quote) {
            Quote::create($quote);
        });
    }
}

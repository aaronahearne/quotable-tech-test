<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Quote;
use App\Models\User;
use App\Models\UserQuoteVote;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // These should be extracted into individual seeders
        User::factory()->create([
             'name' => 'User A',
             'email' => 'usera@example.com',
             'password' => bcrypt('password')
         ]);

        User::factory()->create([
            'name' => 'User B',
            'email' => 'userb@example.com',
            'password' => bcrypt('password')
        ]);

        User::factory()->count(9)->create();

        Quote::factory()->count(4)->create();

        User::all()->each(function($user){
            Quote::all()->each(function($quote) use ($user){
                UserQuoteVote::factory()->create([
                    'user_id' => $user->id,
                    'quote_id' => $quote->id,
                    'positive' => fake()->boolean(),
                ]);
            });
        });
    }
}

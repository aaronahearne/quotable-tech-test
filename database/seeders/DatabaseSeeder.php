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
         \App\Models\User::factory()->create([
             'name' => 'User A',
             'email' => 'usera@example.com',
             'password' => bcrypt('password')
         ]);

        \App\Models\User::factory()->create([
            'name' => 'User B',
            'email' => 'userb@example.com',
            'password' => bcrypt('password')
        ]);

        Quote::factory()->count(3)->create();

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

<?php

namespace Tests\Unit;

use App\Models\Quote;
use App\Models\UserQuoteVote;
use Tests\TestCase;

class QuoteTest extends TestCase
{
    public function testUpvotes()
    {
        $quote = Quote::factory()->create();

        $upvotes = UserQuoteVote::factory()->count(3)->create([
            'quote_id' => $quote->id,
            'positive' => true,
        ]);

        $downvotes = UserQuoteVote::factory()->count(5)->create([
            'quote_id' => $quote->id,
            'positive' => false,
        ]);

        $this->assertEquals(3, $quote->refresh()->upvotes());
    }

    public function testDownvotes()
    {
        $quote = Quote::factory()->create();

        $upvotes = UserQuoteVote::factory()->count(3)->create([
            'quote_id' => $quote->id,
            'positive' => true,
        ]);

        $downvotes = UserQuoteVote::factory()->count(5)->create([
            'quote_id' => $quote->id,
            'positive' => false,
        ]);

        $this->assertEquals(5, $quote->refresh()->downvotes());
    }

    public function testTotalScore()
    {
        $quote = Quote::factory()->create();

        $upvotes = UserQuoteVote::factory()->count(3)->create([
            'quote_id' => $quote->id,
            'positive' => true,
        ]);

        $downvotes = UserQuoteVote::factory()->count(5)->create([
            'quote_id' => $quote->id,
            'positive' => false,
        ]);

        $this->assertEquals(-2, $quote->refresh()->totalScore());
    }
}

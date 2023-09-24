<?php

namespace Tests\Feature;

use App\Models\Quote;
use App\Models\User;
use Tests\TestCase;

class QuoteTest extends TestCase
{
    protected User $user;

    // DRY: This basic setup should be extracted to a parent class
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function testGetQuotes()
    {
        $this->actingAs($this->user);

        $response = $this->get('/quotes');

        $response->assertOk();

        $allQuotes = Quote::all();

        $quoteIds = array_column($response->json('data'), 'id');

        $this->assertCount(count($quoteIds), $allQuotes);
        $this->assertEquals($allQuotes->pluck('id')->toArray(), $quoteIds);
    }
}

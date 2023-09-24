<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserQuoteVote;
use Tests\TestCase;

class VoteTest extends TestCase
{
    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function testToggleVote()
    {
        $this->actingAs($this->user);

        $vote = UserQuoteVote::factory()->create([
            'user_id' => $this->user->id,
            'positive' => 0,
        ]);

        $response = $this->post('/quote/' . $vote->quote_id . '/vote', [
            'positive' => 1,
        ]);

        $response->assertOk();
        $this->assertTrue($vote->refresh()->positive);

        $response = $this->post('/quote/' . $vote->quote_id . '/vote', [
            'positive' => 0,
        ]);

        $response->assertOk();
        $this->assertFalse($vote->refresh()->positive);
    }
}

<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Relay\Event;
use Tests\TestCase;

class EventRsvpTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_event_rsvp_saved()
    {
        $user = User::factory()->create();
        $event = Event::factory()->create();

        $this->actingAs($user)->post('/rsvp', [
            'event_id' => $event->id
        ]);

        $this->assertDatabaseHas('event_rsvps', [
            'user_id' => $user->id,
            'event_id' => $event->id,
        ]);
    }
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}

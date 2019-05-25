<?php

namespace Tests\Feature;

use App\Location;
use App\Reservation;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReservationControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_create_a_reservation()
    {
        $user = factory(User::class)->create();
        $location = factory(Location::class)->create();

        $response = $this->json('POST', '/api/reservations/', [
            'location_id' => $location->id,
            'user_id' => $user->id,
            'name' => 'programar',
            'surname' => 'mierda',
            'email' => 'peum@example.com',
            'phone' => '+34555666777',
            'date' => '2019-05-15',
            'time' => '17:00',
            'duration' => '1 hour',
            'adult' => 0,
            'more' => 'A description',
        ]);

        $response->assertStatus(201);
        $this->assertCount(1, Reservation::all());

        $this->assertEquals('Thank you', $response->json('message'));
    }
}

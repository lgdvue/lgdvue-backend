<?php

namespace Tests\Feature;

use App\Location;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LocationControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_retrieve_all_locations()
    {
        factory(Location::class, 2)->create();

        $response = $this->json('GET', '/api/locations');

        $response->assertStatus(200);
        $this->assertCount(2, $response->json());
    }

    /** @test */
    public function it_should_retrieve_a_location()
    {
        $location = factory(Location::class)->create();

        $response = $this->json('GET', '/api/locations/'. $location->id);

        $response->assertStatus(200);
        $this->assertEquals($location->id, $response->json('id'));
    }

    /** @test */
    public function it_should_create_a_location()
    {
        $user = factory(User::class)->create();
        $this->withoutExceptionHandling();

        $response = $this->json('POST', '/api/locations/', [
            'user_id' => $user->id,
            'type' => 'house',
            'lat' => 9.8421,
            'lng' => -3.4567,
            'title' => 'A title',
            'description' => 'A description',
        ]);

        $response->assertStatus(201);
        $this->assertCount(1, Location::all());

        $this->assertEquals('house', $response->json('type'));
    }
}

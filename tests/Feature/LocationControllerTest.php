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

        $this->assertCount(2, $response->json());
    }

    /** @test */
    public function it_should_retrieve_a_location()
    {
        $location = factory(Location::class)->create();

        $response = $this->json('GET', '/api/locations/'. $location->id);

        $this->assertEquals($location->id, $response->json('id'));
    }
}

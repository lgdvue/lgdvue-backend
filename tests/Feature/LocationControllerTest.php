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

        $this->assertCount(2, $response->json('locationList'));
    }
}

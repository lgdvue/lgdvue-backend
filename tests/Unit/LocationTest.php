<?php

namespace Tests\Unit;

use App\Location;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LocationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_type()
    {
        $location = factory(Location::class)->create();
        $this->assertEquals('house', $location->type);
    }

    /** @test */
    public function it_belongs_to_user()
    {
        $user = factory(User::class)->create();
        $location = factory(Location::class)->create([
            'user_id' => $user->id,
        ]);
        $this->assertEquals($user->id, $location->user->id);
    }

    /** @test */
    public function it_has_latitude_and_longitude()
    {
        $location = factory(Location::class)->create();
        $this->assertNotNull($location->longitude);
        $this->assertNotNull($location->latitude);
    }
}

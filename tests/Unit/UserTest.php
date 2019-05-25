<?php

namespace Tests\Unit;

use App\Location;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_many_locations()
    {
        $user = factory(User::class)->create();
        factory(Location::class, 2)->create([
            'user_id' => $user->id,
        ]);

        $this->assertCount(2, $user->locations);
    }
}

<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user, 'api')->get('/api/user');

        $this->assertEquals($user->email, $response->json('email'));
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_fetches_users()
    {
        \App\Models\User::factory()->count(20)->create();

        $response = $this->getJson('/api/users');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message',
            'users' => [
                'data' => [
                    '*' => ['id', 'name', 'email', 'latitude', 'longitude'],
                ],
                'current_page',
                'per_page',
                'total',
            ],
        ]);
    }
}
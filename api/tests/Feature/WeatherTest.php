<?php 

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WeatherTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_fetches_weather_for_a_user()
    {
        $user = \App\Models\User::factory()->create();

        $this->mock(\App\Services\WeatherService::class, function ($mock) use ($user) {
            $mock->shouldReceive('getWeather')
                ->with($user->latitude, $user->longitude)
                ->andReturn([
                    'main' => ['temp' => 25.5],
                    'weather' => [['description' => 'clear sky']],
                ]);
        });

        $response = $this->getJson("/api/users/{$user->id}/weather");

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'user' => ['id', 'name', 'email', 'latitude', 'longitude'],
            'weather' => ['main', 'weather'],
        ]);
    }
}
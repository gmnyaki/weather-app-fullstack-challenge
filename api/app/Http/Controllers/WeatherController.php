<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    /**
     * Get weather data for a user.
     *
     * @param int $userId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserWeather($userId)
    {
        $user = User::findOrFail($userId);

        // Generate a unique cache key for the user's weather data
        $cacheKey = "weather_{$user->latitude}_{$user->longitude}";

        $weatherData = Cache::remember($cacheKey, 3600, function () use ($user) {
            return $this->weatherService->getWeather(
                $user->latitude,
                $user->longitude
            );
        });

        return response()->json([
            'user' => $user,
            'weather' => $weatherData,
        ]);
    }
}
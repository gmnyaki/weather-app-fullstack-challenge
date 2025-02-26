<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;

class WeatherService
{
    /**
     * @var string The API key for OpenWeatherMap API
     */
    protected $apiKey;

    /**
     * @var int The time-to-live (TTL) for cached weather data in seconds
     */
    protected $cacheTtl; 

    /**
     * WeatherService constructor.
     * Initializes the API key and cache TTL.
     */
    public function __construct()
    {
        $this->apiKey = config('services.openweathermap.key');
        $this->cacheTtl = 3600; // Cache for 1 hour (60*60 seconds)
    }

    /**
     * Fetches weather data for a given location (latitude and longitude).
     *
     * This method first checks if the weather data is available in the cache (Redis).
     * If data is cached, it returns the cached data. If not, it fetches fresh data
     * from the OpenWeatherMap API and caches the response for subsequent use.
     *
     * @param float $latitude The latitude of the location
     * @param float $longitude The longitude of the location
     * @return array The weather data for the specified location
     * @throws \Exception If the request to the weather API fails
     */
    public function getWeather(float $latitude, float $longitude): array
    {
        $cacheKey = "weather:{$latitude},{$longitude}";

        // Check if weather data is cached
        if ($cachedData = Redis::get($cacheKey)) {
            // Return cached data if available
            return json_decode($cachedData, true);
        }

        // Fetch weather data from OpenWeatherMap API if not cached
        $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
            'lat' => $latitude,
            'lon' => $longitude,
            'appid' => $this->apiKey,
            'units' => 'metric', 
        ]);

        // Check if the API request failed
        if ($response->failed()) {
            throw new \Exception('Failed to fetch weather data: ' . $response->body());
        }

        $weatherData = $response->json();

        // Cache the fetched data for future requests
        Redis::setex($cacheKey, $this->cacheTtl, json_encode($weatherData));

        return $weatherData;
    }
}

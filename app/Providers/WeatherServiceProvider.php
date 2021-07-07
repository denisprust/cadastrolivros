<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class WeatherServiceProvider extends ServiceProvider
{

    protected $weather;

    public function __construct() 
    {
    }

    private function setWeather($ipAddress) 
    {
        $url = "https://api.hgbrasil.com/weather?key=14bcffa9&user_ip={$ipAddress}";

        $response = Http::get($url);
        $this->weather = $response->json()['results'];
    }

    public function getWeather($ipAddress)
    {
        $this->setWeather($ipAddress);

        return $this->weather;
    }
}

<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ForecastSolarService
{
    public function getSolarForecast()
    {
        try {
            $response = Http::get(
                config('services.forecastsolar.api')
                . '/estimate/watthours/period'
                . '/' . config('services.forecastsolar.lat')
                . '/' . config('services.forecastsolar.lon')
                . '/' . config('services.forecastsolar.dec')
                . '/' . config('services.forecastsolar.az')
                . '/' . config('services.forecastsolar.kwp')
                . '?no_sun=1'
            );

            if($response->successful() && $response->json('message.type') === 'success') {
                return $response->json()['result'];
            }
            else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
        }
    }
}

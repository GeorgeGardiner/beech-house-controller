<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SolaxService
{
    public function getInverterData()
    {
        try {
            $response = Http::get(
                config('services.solax.api')
                . '/getRealtimeInfo.do'
                . '?tokenId=' . config('services.solax.token')
                . '&sn=' . config('services.solax.registration')
            );

            if($response->successful() && $response->json('success') === true) {
                return $response->json()['result'];
            }
            else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
        }
    }

    public function setBatteryLevel($level)
    {

    }
}

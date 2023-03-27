<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TadoService
{
    private $bearerToken = null;
    private $bearerTokenExpiresAt = null;

    public function getBearerToken()
    {
        if($this->bearerToken !== null && $this->bearerTokenExpiresAt !== null && $this->bearerTokenExpiresAt->isFuture()) {
            return $this->bearerToken;
        }

        $authorizationResponse = Http::asForm()
            ->acceptJson()
            ->post(config('services.tado.oauth_api'), [
                'grant_type' => 'password',
                'client_id' => config('services.tado.client_id'),
                'client_secret' => config('services.tado.client_secret'),
                'scope' => config('services.tado.client_scope'),
                'username' => config('services.tado.username'),
                'password' => config('services.tado.password')
            ]);

        if($authorizationResponse->failed()) {
            return null;
        }
        if($authorizationResponse->json('access_token') === null) {
            return null;
        }

        $this->bearerToken = $authorizationResponse->json('access_token');
        $this->bearerTokenExpiresAt = now()->addSeconds($authorizationResponse->json('expires_in'))->subSeconds(10);

        return $this->bearerToken;
    }

    public function getZoneStates() {
        $bearerToken = $this->getBearerToken();
        if($bearerToken === null) {
            return null;
        }

        $zonesResponse = Http::withToken($bearerToken)
            ->acceptJson()
            ->get('https://my.tado.com/api/v2/homes/'.config('services.tado.home_id').'/zoneStates?ngsw-bypass=true');

        if($zonesResponse->failed()) {
            return null;
        }
        if($zonesResponse->json('zoneStates') === null) {
            return null;
        }
        return $zonesResponse->json('zoneStates');
    }



}

<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'solax' => [
        'api' => env('SOLAX_API'),
        'registration' => env('SOLAX_REGISTRATION'),
        'inverter' => env('SOLAX_INVERTER'),
        'token' => env('SOLAX_TOKEN')
    ],
    'forecastsolar' => [
        'api' => env('FORECASTSOLAR_API'),
        'lat' => env('FORECASTSOLAR_LAT'),
        'lon' => env('FORECASTSOLAR_LON'),
        'dec' => env('FORECASTSOLAR_DEC'),
        'az' => env('FORECASTSOLAR_AZ'),
        'kwp' => env('FORECASTSOLAR_KWP')
    ],
    'tado' => [
        'oauth_api' => env('TADO_OAUTH_API'),
        'client_id' => env('TADO_OAUTH_CLIENT_ID'),
        'client_scope' => env('TADO_OAUTH_CLIENT_SCOPE'),
        'client_secret' => env('TADO_OAUTH_CLIENT_SECRET'),
        'username' => env('TADO_USERNAME'),
        'password' => env('TADO_PASSWORD'),
        'home_id' => env('TADO_HOME_ID')
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TadoZoneState extends Model
{
    protected $table = 'tado_zone_state';

    public $timestamps = false;

    protected $casts = [
        'reading_at' => 'datetime',
        'zone_id' => 'integer',
        'temperature' => 'double',
        'humidity' => 'integer',
        'target_temperature' => 'double',
        'call_for_heat' => 'boolean',
        'heating_power' => 'integer'
    ];
}

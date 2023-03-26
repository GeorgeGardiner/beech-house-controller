<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TadoZoneReading extends Model
{
    protected $table = 'tado_zone_reading';

    public $timestamps = false;

    protected $casts = [
        'reading_at' => 'datetime',
        'zone_id' => 'integer',
        'temperature' => 'double',
        'humidity' => 'integer',
        'target_temperature' => 'double',
        'is_heating' => 'boolean',
        'heating_power_pct' => 'integer'
    ];
}

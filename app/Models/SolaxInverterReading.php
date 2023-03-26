<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolaxInverterReading extends Model
{
    protected $table = 'solax_inverter_reading';

    public $timestamps = false;

    protected $casts = [
        'reading_at' => 'datetime',
        'acpower_w' => 'integer',
        'yieldtoday_wh' => 'integer',
        'yieldtotal_wh' => 'integer',
        'feedinpower_w' => 'integer',
        'feedinenergy_w' => 'integer',
        'consumeenergy_wh' => 'integer',
        'feedinpowerm2_w' => 'integer',
        'soc_pct' => 'integer',
        'peps1_w' => 'integer',
        'peps2_w' => 'integer',
        'peps3_w' => 'integer',
        'inverter_status' => 'integer'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForecastSolarProjection extends Model
{
    protected $table = 'forecast_solar';

    public $timestamps = false;

    protected $fillable = [
        'forecast_for', 'forecast_at', 'watthours'
    ];

    protected $casts = [
        'forecast_for' => 'datetime',
        'forecast_at' => 'datetime',
        'watthours' => 'integer'
    ];

}

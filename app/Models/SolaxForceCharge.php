<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolaxForceCharge extends Model
{
    protected $table = 'solax_force_charge';

    public $timestamps = false;

    protected $casts = [
        'applicable_at' => 'date',
        'charge_to' => 'integer'
    ];
}

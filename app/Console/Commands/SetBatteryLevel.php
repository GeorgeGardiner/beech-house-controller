<?php

namespace App\Console\Commands;

use App\Models\ForecastSolarProjection;
use App\Models\SolaxForceCharge;
use App\Services\ForecastSolarService;
use App\Services\SolaxService;
use Illuminate\Console\Command;

class SetBatteryLevel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calc:battery-level';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set the battery charge level for the day ahead';

    /**
     * Execute the console command.
     */
    public function handle(SolaxService $solax): void
    {
        $morningWatthours = ForecastSolarProjection::where('forecast_for', '>=', now()->addDay()->startOfDay())
            ->where('forecast_for', '<', now()->addDay()->startOfDay()->addHours(12))
            ->sum('watthours');

        $soc = 100;
        if($morningWatthours >= 2000) {
            $soc = 80;
        }
        if($morningWatthours >= 3000) {
            $soc = 70;
        }
        if($morningWatthours >= 4000) {
            $soc = 60;
        }
        if($morningWatthours >= 5000) {
            $soc = 50;
        }
        if($morningWatthours >= 6000) {
            $soc = 40;
        }
        if($morningWatthours >= 7000) {
            $soc = 30;
        }
        if($morningWatthours >= 8000) {
            $soc = 20;
        }

        $forceCharge = new SolaxForceCharge();
        $forceCharge->applicable_at = now();
        $forceCharge->charge_to = $soc;
        $forceCharge->save();

        $solax->setBatteryLevel($soc);
    }
}

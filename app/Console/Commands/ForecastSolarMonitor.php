<?php

namespace App\Console\Commands;

use App\Models\ForecastSolarProjection;
use App\Services\ForecastSolarService;
use Illuminate\Console\Command;

class ForecastSolarMonitor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monitor:forecast-solar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the latest forecast data from Forecast.Solar';

    /**
     * Execute the console command.
     */
    public function handle(ForecastSolarService $forecast): void
    {
        $data = $forecast->getSolarForecast();
        if($data !== null) {
            foreach($data as $dt=>$wh) {
                ForecastSolarProjection::updateOrCreate(
                    ['forecast_for' => $dt],
                    ['forecast_at' => now(), 'watthours' => $wh]
                );
            }
        }
    }
}

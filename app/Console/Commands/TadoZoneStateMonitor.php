<?php

namespace App\Console\Commands;

use App\Models\TadoZoneState;
use App\Services\TadoService;
use Illuminate\Console\Command;

class TadoZoneStateMonitor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monitor:tado';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the latest data from the Solax inverter';

    /**
     * Execute the console command.
     */
    public function handle(TadoService $tado): void
    {
        $data = $tado->getZoneStates();
        if($data !== null) {
            foreach($data as $zone=>$zoneData) {
                $tadoZoneState = new TadoZoneState();
                $tadoZoneState->zone_id = $zone;
                $tadoZoneState->reading_at = now();
                if(isset($zoneData['sensorDataPoints'])) {
                    if(isset($zoneData['sensorDataPoints']['insideTemperature'])) {
                        $tadoZoneState->temperature = $zoneData['sensorDataPoints']['insideTemperature']['celsius'];
                    }
                    if(isset($zoneData['sensorDataPoints']['humidity'])) {
                        $tadoZoneState->humidity = $zoneData['sensorDataPoints']['humidity']['percentage'];
                    }
                }

                if(isset($zoneData['activityDataPoints'])) {
                    if(isset($zoneData['activityDataPoints']['heatingPower'])) {
                        $tadoZoneState->heating_power = $zoneData['activityDataPoints']['heatingPower']['percentage'];
                    }
                }

                if(isset($zoneData['setting'])) {
                    if(isset($zoneData['setting']['temperature'])) {
                        $tadoZoneState->target_temperature = $zoneData['setting']['temperature']['celsius'];
                    }
                }

                $tadoZoneState->save();
            }
        }
    }
}

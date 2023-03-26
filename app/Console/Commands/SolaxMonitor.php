<?php

namespace App\Console\Commands;

use App\Models\SolaxInverterReading;
use App\Services\SolaxService;
use Illuminate\Console\Command;

class SolaxMonitor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monitor:solax';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the latest data from the Solax inverter';

    /**
     * Execute the console command.
     */
    public function handle(SolaxService $solax): void
    {
        $data = $solax->getInverterData();
        if($data !== null) {
            $solarInverterReading = new SolaxInverterReading();
            $solarInverterReading->reading_at = $data['uploadTime'];
            $solarInverterReading->acpower_w = $data['acpower'];
            $solarInverterReading->yieldtoday_wh = $data['yieldtoday'] * 1000;
            $solarInverterReading->yieldtotal_wh = $data['yieldtotal'] * 1000;
            $solarInverterReading->feedinpower_w = $data['feedinpower'];
            $solarInverterReading->feedinenergy_w = $data['feedinenergy'] * 1000;
            $solarInverterReading->consumeenergy_wh = $data['consumeenergy'] * 1000;
            $solarInverterReading->feedinpowerm2_w = $data['feedinpowerM2'];
            $solarInverterReading->soc_pct = $data['soc'];
            $solarInverterReading->peps1_w = $data['peps1'];
            // $solarInverterReading->peps2_w = $data['peps2'];
            // $solarInverterReading->peps3_w = $data['peps3'];
            $solarInverterReading->inverter_status = $data['inverterStatus'];
            $solarInverterReading->save();
        }
    }
}

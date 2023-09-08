<?php

namespace App\Http\Controllers\MonitoringSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BouyMonitoringSystem;

class BouyMonitoringSystemController extends Controller
{
    public function getDataFromDevice($id, $wh, $th, $wp, $wpwr, $wt, $at){

        $newBouyMonitoringSystem = new BouyMonitoringSystem;
        $newBouyMonitoringSystem->bouy_id = $id;
        $newBouyMonitoringSystem->wave_height = $wh;
        $newBouyMonitoringSystem->tide_height = $th;
        $newBouyMonitoringSystem->wave_period = $wp;
        $newBouyMonitoringSystem->wave_power = $wpwr;
        $newBouyMonitoringSystem->wave_temperature = $wt;
        $newBouyMonitoringSystem->air_temperature = $at;
        $newBouyMonitoringSystem->save();

        return response()->json([
            'ID'  =>  $id,
            'waterHeight'  =>  $wh,
            'tideHeight'  =>  $th,
            'wavePeriod'  =>  $wp,
            'wavePower'  =>  $wpwr,
            'waveTemperature'  =>  $wt,
            'airTemperature'  =>  $at,
        ]);
    }
}

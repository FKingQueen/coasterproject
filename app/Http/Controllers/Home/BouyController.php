<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Bouy;

class BouyController extends Controller
{
    public function getSms(){
        $sms = Bouy::all();
        // return $sms;
        for($i = 0; $i < count($sms)-1; $i++ ){
            $data[$i] = explode('+',($sms[$i]->sms));   
            $data[$i][7] = '20' . $data[$i][7];   
            $data[$i][7] = Carbon::createFromFormat('Y:m:d:H:i:s', $data[$i][7])->format('Y/m/d H:i:s');
            $data[$i][8] = explode(' ',($data[$i][7])); 

            $data[$i][9] = explode('/',($data[$i][8][0])); 
            $data[$i][10] = explode(':',($data[$i][8][1])); 
        }
        for($i = 0; $i < count($sms)-1; $i++ ){
            $newData[$i]['height'] = (double)$data[$i][0];
            $newData[$i]['temp'] = (double)$data[$i][1];
            $newData[$i]['humidity'] = (double)$data[$i][3];
            $newData[$i]['year'] = (int)$data[$i][9][0];
            $newData[$i]['month'] = (int)$data[$i][9][1];
            $newData[$i]['day'] = (int)$data[$i][9][2];

            $newData[$i]['hour'] = (int)$data[$i][10][0];
            $newData[$i]['min'] = (int)$data[$i][10][1];
            $newData[$i]['sec'] = (int)$data[$i][10][2];
        }
        // $data1[0] = $newData->whereYear('date', 2022);
        $new = collect($newData);
        return $new;
    }

    public function getSampleData($temp1, $temp2, $wh){
        $newInventory = new Bouy;
        $newInventory->sms = $wh;
        $newInventory->sender_number = '09053102687';
        $newInventory->save();
        return  $newInventory->sms;
    }
}

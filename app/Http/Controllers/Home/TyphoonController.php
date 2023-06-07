<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Typhoon;

class TyphoonController extends Controller
{
    public function getTyphoon($id){
        return Typhoon::where('province_id', $id)->get();
    }
}

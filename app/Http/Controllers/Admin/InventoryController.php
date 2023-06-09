<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    public function storeInventory(Request $request){
        $validated = $request->validate([
            'municipality' => 'required',
            'province' => 'required',    
            'barangay' => 'required',    
            'latitude' => 'required',          
            'longitude' => 'required',
        ]);
        $newInventory = new Inventory;
        $newInventory->province = $request->province;
        $newInventory->municipality = $request->municipality;
        $newInventory->barangay = $request->barangay;
        $newInventory->latitude = $request->latitude;
        $newInventory->longitude = $request->longitude;
        $newInventory->save();

        return $request->all();
    }

    public function getInventory(){
        return Inventory::all();
    }

}

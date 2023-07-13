<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Inventory;
use DB;

class InventoryController extends Controller
{
    public function getInventory(){
        return Inventory::all();
    }

    public function storeInventory(Request $request){
        $validated = $request->validate([
            'municipality' => 'required',
            'province' => 'required',    
            'barangay' => 'required',    
            'latitude' => 'required',          
            'longitude' => 'required',
        ]);
        $shoreline = null;
        for($i = 0; $i < sizeof($request->shoreline); $i++){
            if($shoreline == null){
                $shoreline =$request->shoreline[$i];
            } else {
                $shoreline = $shoreline . ', ' . $request->shoreline[$i];
            }
            
        }
        $coastalHazard = null;
        for($i = 0; $i < sizeof($request->coastalHazard); $i++){
            if($coastalHazard == null){
                $coastalHazard =$request->coastalHazard[$i];
            } else {
                $coastalHazard = $coastalHazard . ', ' . $request->coastalHazard[$i];
            }
            
        }
        $structureMaterial = null;
        for($i = 0; $i < sizeof($request->structureMaterial); $i++){
            if($structureMaterial == null){
                $structureMaterial =$request->structureMaterial[$i];
            } else {
                $structureMaterial = $structureMaterial . ', ' . $request->structureMaterial[$i];
            }
            
        }
        $typeStructure = null;
        for($i = 0; $i < sizeof($request->typeStructure); $i++){
            if($typeStructure == null){
                $typeStructure =$request->typeStructure[$i];
            } else {
                $typeStructure = $typeStructure . ', ' . $request->typeStructure[$i];
            }
            
        }

        // return $typeStructure;
        $newInventory = new Inventory;
        $newInventory->province = $request->province;
        $newInventory->municipality = $request->municipality;
        $newInventory->barangay = $request->barangay;
        $newInventory->latitude = $request->latitude;
        $newInventory->longitude = $request->longitude;
        $newInventory->coastalHazard = $coastalHazard;
        $newInventory->shoreline = $shoreline;
        $newInventory->morphology = $request->morphology;
        $newInventory->typeStructure = $typeStructure;
        $newInventory->structureMaterial = $structureMaterial;
        $newInventory->wavesStructure = $request->wavesStructure;
        $newInventory->protectionToe = $request->protectionToe;
        $newInventory->armorUnits = $request->armorUnits;
        $newInventory->heightStructure = $request->heightStructure;
        $newInventory->lengthStructure = $request->lengthStructure;
        $newInventory->landwardsTypology = $request->landwardsTypology;
        $newInventory->shorelineTypology = $request->shorelineTypology;
        $newInventory->nearshoreTypology = $request->nearshoreTypology;
        $newInventory->image = $request->image;
        $newInventory->description = $request->description;
        $newInventory->save();

        return $request->all();
    }

    public function uploadInventory(Request $request){
        $request->validate([
            'file' => 'required'
        ]); 
        $x = 100;
        $y = 60;
        $picName = time().'.'.$request->file->extension();

        $file = $request->file;
        $img = \Image::make($file)->resize(250, 125);
        $img->save(public_path('/inventory'.'/low/'.$picName),$x);

        $img2 = \Image::make($file);
        $img2->save(public_path('/inventory'.'/high/'.$picName),$y);

        // $request->file->move(public_path('uploads/high'),$picName);
        return $picName;
    }

    public function deleteImageInventory(Request $request){
        $fileName = $request->imageName;
        $this->deleteFileFromServe($fileName);
        return 'done';
    }

    public function deleteFileFromServe($fileName){
        $filePath = public_path().'/inventory/'.'/low/'.$fileName;
        if(file_exists($filePath)){
            @unlink($filePath);
        }
        $filePath = public_path().'/inventory/'.'/high/'.$fileName;
        if(file_exists($filePath)){
            @unlink($filePath);
        }
        return;
    }

    public function deleteInventory($id){
        $Inventory = Inventory::find($id);
        $fileName = $Inventory->image;

        $filePath = public_path().'/inventory/'.'/high/'.$fileName;
        if(file_exists($filePath)){
            @unlink($filePath);
        }
        $filePath = public_path().'/inventory/'.'/low/'.$fileName;
        if(file_exists($filePath)){
            @unlink($filePath);
        }
        $Inventory->delete();
        return $fileName;
    }

    public function getInventoryEdit($id){
        $inventory = Inventory::where('id', $id)->get();

        $inventory[0]->structureMaterial =  explode(', ',($inventory[0]->structureMaterial));

        $inventory[0]->coastalHazard =  explode(', ',($inventory[0]->coastalHazard));

        $inventory[0]->shoreline =  explode(', ',($inventory[0]->shoreline));

        $inventory[0]->typeStructure =  explode(', ',($inventory[0]->typeStructure));
        return $inventory;
    }

    public function updateInventory(Request $request){
        $shoreline = null;
        for($i = 0; $i < sizeof($request->shoreline); $i++){
            if($shoreline == null){
                $shoreline =$request->shoreline[$i];
            } else {
                $shoreline = $shoreline . ', ' . $request->shoreline[$i];
            }
            
        }
        $coastalHazard = null;
        for($i = 0; $i < sizeof($request->coastalHazard); $i++){
            if($coastalHazard == null){
                $coastalHazard =$request->coastalHazard[$i];
            } else {
                $coastalHazard = $coastalHazard . ', ' . $request->coastalHazard[$i];
            }
            
        }
        $structureMaterial = null;
        for($i = 0; $i < sizeof($request->structureMaterial); $i++){
            if($structureMaterial == null){
                $structureMaterial =$request->structureMaterial[$i];
            } else {
                $structureMaterial = $structureMaterial . ', ' . $request->structureMaterial[$i];
            }
            
        }
        $typeStructure = null;
        for($i = 0; $i < sizeof($request->typeStructure); $i++){
            if($typeStructure == null){
                $typeStructure =$request->typeStructure[$i];
            } else {
                $typeStructure = $typeStructure . ', ' . $request->typeStructure[$i];
            }
            
        }

        DB::table('inventories')
        ->where('id', $request->id)
        ->update([
        'province' => $request->province,
        'municipality' => $request->municipality,
        'barangay' => $request->barangay,
        'latitude' => $request->latitude,
        'longitude' => $request->longitude,
        'coastalHazard' => $coastalHazard,
        'shoreline' => $shoreline,
        'morphology' => $request->morphology,
        'typeStructure' => $typeStructure,
        'structureMaterial' => $structureMaterial,
        'wavesStructure' => $request->wavesStructure,
        'protectionToe' => $request->protectionToe,
        'armorUnits' => $request->armorUnits,
        'heightStructure' => $request->heightStructure,
        'lengthStructure' => $request->lengthStructure,
        'landwardsTypology' => $request->landwardsTypology,
        'shorelineTypology' => $request->shorelineTypology,
        'nearshoreTypology' => $request->nearshoreTypology,
        'image' => $request->image,
        'description' => $request->description,
        ]);

        return;
    } 

    public function importInventory(){

        return true;
    }

}

<?php

namespace App\Imports;

use App\Models\Inventory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;

class InventoryImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        return new Inventory([
            "latitude"  => $row['latitude'],
            "longitude"  => $row['longitude'],
            "province"  => $row['province'],
            "municipality"  => $row['municipality'],
            "barangay"  => $row['barangay'],
            "coastalHazard"  => $row['coastalhazard'],
            "shoreline"  => $row['shoreline'],
            "morphology"  => $row['morphology'],
            "typeStructure"  => $row['typestructure'],
            "structureMaterial"  => $row['structurematerial'],
            "wavesStructure"  => $row['wavesstructure'],
            "description"  => $row['description'],
        ]);
    }
}

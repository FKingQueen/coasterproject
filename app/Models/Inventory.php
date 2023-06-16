<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'province',
        'municipality',
        'barangay',
        'coastalHazard',
        'shoreline',
        'morphology',
        'typeStructure',
        'structureMaterial',
        'wavesStructure',
        'protectionToe',
        'heightStructure',
        'lengthStructure',
        'landwardsTypology',
        'shorelineTypology',
        'nearshoreTypology',
        'image',
        'content',
        'latitude',
        'longitude',
    ];
}

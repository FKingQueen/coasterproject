<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'coastalID',
        'coastalProtection',
        'conditionRating',
        'crDesc',
        'heightRange',
        'length',
        'locationType',
        'prDesc',
        'primaryMaterial',
        'priorityRating',
        'province',
        'yearCompleted',
        'image',
        'latitude',
        'longitude',
    ];
}

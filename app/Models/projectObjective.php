<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projectObjective extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_type_id',
        'objective',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'author',
        'image',
        'article',
    ];

    public function projects()
    {
        return $this->hasMany('App\Models\Project');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type', 'type_id');
    }
}

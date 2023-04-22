<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class HarticleController extends Controller
{
    public function getArticles() {
        return Article::all();
    }   
}

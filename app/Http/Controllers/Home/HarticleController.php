<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Article;
use App\Models\Project;
use App\Models\Type;

class HarticleController extends Controller
{
    public function getArticles() {
        $article =  Article::with('projects')->with('type')->get();
        
        foreach($article as $key => $arti)
        {
            $article[$key]->date = Carbon::createFromFormat('Y-m-d H:i:s', $arti->created_at)->format('F d, Y');
        }

        return $article;
    }   
}

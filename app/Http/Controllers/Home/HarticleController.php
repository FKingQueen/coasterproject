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

    public function getArticle($id){
        // return $id;
        $article = Article::where('id', $id)->with('projects')->with('type')->get();

        $article[0]->date = Carbon::createFromFormat('Y-m-d H:i:s', $article[0]->created_at)->format('F d, Y');

        $articles =  Article::with('projects')->with('type')->get();
        
        foreach($articles as $key => $arti)
        {
            $articles[$key]->date = Carbon::createFromFormat('Y-m-d H:i:s', $arti->created_at)->format('F d, Y');
        }

        return response()->json([
            'article'  =>  $article,
            'articles'  =>  $articles,
        ]);
    }

    public function getmoreArticle($id){
        $moreArticle =  Article::where('type_id', $id)->with('projects')->with('type')->get();
        
        foreach($moreArticle as $key => $arti)
        {
            $moreArticle[$key]->date = Carbon::createFromFormat('Y-m-d H:i:s', $arti->created_at)->format('F d, Y');
        }

        $articles =  Article::where('type_id', $id)->with('projects')->with('type')->get();
        
        foreach($articles as $key => $arti)
        {
            $articles[$key]->date = Carbon::createFromFormat('Y-m-d H:i:s', $arti->created_at)->format('F d, Y');
        }

        return response()->json([
            'moreArticle'  =>  $moreArticle,
            'articles'  =>  $articles,
        ]);

    }
}

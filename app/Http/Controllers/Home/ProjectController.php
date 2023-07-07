<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Article;
use App\Models\ProjectType;
use Carbon\Carbon;

class ProjectController extends Controller
{
    public function getProject($id){
        $project = ProjectType::where('id', $id)->with('projectObjective')->with('projectImage')->get();
        $newsArticles = Article::where('type_id', 1)->with('projects')->with('type')->get();
        foreach($newsArticles as $key => $arti)
        {
            $newsArticles[$key]->date = Carbon::createFromFormat('Y-m-d H:i:s', $arti->created_at)->format('F d, Y');
        }
        $announcementsArticles = Article::where('type_id', 2)->with('projects')->with('type')->get();
        foreach($announcementsArticles as $key => $arti)
        {
            $announcementsArticles[$key]->date = Carbon::createFromFormat('Y-m-d H:i:s', $arti->created_at)->format('F d, Y');
        }
        $eventsArticles = Article::where('type_id', 3)->with('projects')->with('type')->get();
        foreach($eventsArticles as $key => $arti)
        {
            $eventsArticles[$key]->date = Carbon::createFromFormat('Y-m-d H:i:s', $arti->created_at)->format('F d, Y');
        }

        return response()->json([
            'project'  =>  $project,
            'newsArticles'  =>  $newsArticles,
            'announcementsArticles'  =>  $announcementsArticles,
            'eventsArticles'  =>  $eventsArticles,
        ]);
    }

    public function getRelatedArticle(){
        $articles = Article::with('projects')->with('type')->get();
        foreach($articles as $key => $arti)
        {
            $articles[$key]->date = Carbon::createFromFormat('Y-m-d H:i:s', $arti->created_at)->format('F d, Y');
        }
        return $articles;
    }
        
}

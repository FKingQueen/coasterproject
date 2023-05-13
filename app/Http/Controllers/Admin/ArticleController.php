<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Project;
use App\Models\Type;
use DB;
use File;

class ArticleController extends Controller
{

    public function getArticle()
    {
        return Article::orderBy('id', 'desc')->with('projects')->with('type')->get();
    }

    public function storeArticle(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'article' => 'required',    
            'projectValue' => 'required',    
            'typeValue' => 'required',       
            'author' => 'required',
            'image' => 'required',
        ]);

        $newArticle = new Article;
        $newArticle->user_id = Auth::id();
        $newArticle->type_id = $request->typeValue;
        $newArticle->title = $request->title;
        $newArticle->author = $request->author;
        $newArticle->image = $request->image;
        $newArticle->article = $request->article;
        $newArticle->save();

        $projects = $request->projectValue;

        foreach($projects as $key => $project){
            if($project == '1'){
                Project::create([
                    'article_id' =>  $newArticle->id,
                    'user_id' => Auth::user()->id,
                    'projectType_id' => $project,
                ]);
            } else if ($project == '2') {
                Project::create([
                    'article_id' =>  $newArticle->id,
                    'user_id' => Auth::user()->id,
                    'projectType_id' => $project,
                ]);
            } else if ($project == '3') {
                Project::create([
                    'article_id' =>  $newArticle->id,
                    'user_id' => Auth::user()->id,
                    'projectType_id' => $project,
                ]);
            } else if ($project == '4') {
                Project::create([
                    'article_id' =>  $newArticle->id,
                    'user_id' => Auth::user()->id,
                    'projectType_id' => $project,
                ]);
            }
            
        }
        
        return;
    }

    public function upload(Request $request){
        $request->validate([
            'file' => 'required'
        ]); 
        $x = 100;
        $picName = time().'.'.$request->file->extension();
        $file = $request->file;
        $img = \Image::make($file)->resize(250, 125);
        $img->save(public_path('uploads/'.$picName),$x);
        // File::move(public_path($picName), public_path('uploads/'.$picName));
        return $picName;
    }

    public function deleteImage(Request $request){
        $fileName = $request->imageName;
        $this->deleteFileFromServe($fileName);
        return 'done';
    }

    public function deleteFileFromServe($fileName){
        $filePath = public_path().'/uploads/'.$fileName;
        if(file_exists($filePath)){
            @unlink($filePath);
        }
        return;
    }

    public function deleteArticle($id){
        $Article = Article::find($id);
        $fileName = $Article->image;
        $filePath = public_path().'/uploads/'.$fileName;
        if(file_exists($filePath)){
            @unlink($filePath);
        }
        $Article->delete();
        return $fileName;
    }

    public function getArticleEdit($id)
    {
        // return Article::find($id)->with('projects')->with('type')->get();
        return Article::where('id', $id)->with('projects')->with('type')->get();
    }

    public function updateArticle(Request $request){
        Project::where('article_id', $request->id)->delete();

        $projects = $request->projectValue;

        $validated = $request->validate([
            'title' => 'required',
            'article' => 'required',    
            'projectValue' => 'required',    
            'typeValue' => 'required',       
            'author' => 'required',
            'image' => 'required',
        ]);

        DB::table('articles')
        ->where('id', $request->id)
        ->update([
        'user_id' => Auth::id(),
        'title' => $request->title,
        'type_id' => $request->typeValue[0],
        'author' => $request->author,
        'image' => $request->image,
        'article' => $request->article,
        ]);

        foreach($projects as $key => $project){
            if($project == '1'){
                Project::create([
                    'article_id' =>  $request->id,
                    'user_id' => Auth::user()->id,
                    'projectType_id' => $project,
                ]);
            } else if ($project == '2') {
                Project::create([
                    'article_id' =>  $request->id,
                    'user_id' => Auth::user()->id,
                    'projectType_id' => $project,
                ]);
            } else if ($project == '3') {
                Project::create([
                    'article_id' =>  $request->id,
                    'user_id' => Auth::user()->id,
                    'projectType_id' => $project,
                ]);
            } else if ($project == '4') {
                Project::create([
                    'article_id' =>  $request->id,
                    'user_id' => Auth::user()->id,
                    'projectType_id' => $project,
                ]);
            }
            
        }

        return ;
    }
}

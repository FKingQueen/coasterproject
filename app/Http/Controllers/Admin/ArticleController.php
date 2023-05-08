<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Article;
use DB;

class ArticleController extends Controller
{
    
    // Article

    public function getArticle()
    {
        return Article::orderBy('id', 'desc')->get();
    }

    public function storeArticle(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'article' => 'required',
            'author' => 'required',
            'image' => 'required',
        ]);

        Article::create([
            'title' => $request->title,
            'userId' => Auth::user()->id,
            'article' => $request->article,
            'author' => $request->author,
            'image' => $request->image,
        ]);

        return $status = 'true';
    }

    public function upload(Request $request){
        $request->validate([
            'file' => 'required'
        ]); 
        $picName = time().'.'.$request->file->extension();
        $request->file->move(public_path('uploads'),$picName);
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
        return Article::find($id);
    }

    public function updateArticle(Request $request){
        DB::table('articles')
            ->where('id', $request->id)
            ->update([
            'title' => $request->title,
            'author' => $request->author,
            'image' => $request->image,
            'article' => $request->article,
            ]);
        return ;
    }
}

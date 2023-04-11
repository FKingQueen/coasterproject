<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Article;

class AdminController extends Controller
{

    public function storeUser(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'userType' => 'required',
            'passwd' => 'required',
        ]);

        $password = bcrypt($request->passwd);
        // return $request;
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'userType' => $request->userType,
            'password' => $password,
        ]);

        return $request;
    }

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
}

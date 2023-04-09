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

    public function storeArticle(Request $request){
        Article::create([
            'title' => $request->title,
            'author' => $request->author,
            'article' => $request->article,
        ]);
        return $request;
    }
}

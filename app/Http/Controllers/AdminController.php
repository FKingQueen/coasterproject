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
        $request->validate([
            'title'  => 'required',
            'author'  => 'required',
            'article'  => 'required',
            'image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]); 
        $input  = $request->all();
        $imageName  = NULL;
        if($image = $request->file('file')) {
            $destination = '.img/';
            $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->image($destinationPath, $imageName);
            $input['image'] = $imageName; 
        };
        return $input;
    }

    public function upload(Request $request){

        return $request;
    }
}

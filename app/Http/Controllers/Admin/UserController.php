<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // User 
    public function getUser()
    {
        return User::orderBy('id', 'desc')->get();
    }

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

    public function deleteUser($id){
        $User = User::find($id);
        $User->delete();
        return;
    }

    public function getUserEdit($id)
    {
        User::find($id);
        return;
    }
    
}

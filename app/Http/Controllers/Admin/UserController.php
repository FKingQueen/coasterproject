<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

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
            'email' => 'required|email|unique:users',
            'userType' => 'required',
            'passwd' => 'required|min:8',
        ]);

        $password = bcrypt($request->passwd);
        // return $request;
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'userType' => $request->userType,
            'password' => $password,
        ]);

        return $validated;
    }

    public function deleteUser($id){
        $User = User::find($id);
        $User->delete();
        return;
    }

    public function getUserEdit($id)
    {
        return User::find($id);
    }

    public function updateUser(Request $request)
    {
        DB::table('users')
        ->where('id', $request->id)
        ->update([
        'name' => $request->name,
        'userType' => $request->userType,
        'email' => $request->email
        ]);
        return $request->all();
    }
    
    public function updatePassword(Request $request)
    {
        $password = bcrypt($request->passwd);
        DB::table('users')
        ->where('id', $request->id)
        ->update([
        'password' => $password
        ]);
        return;
    }
}

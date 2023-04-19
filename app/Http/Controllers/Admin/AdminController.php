<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\RelationNotFoundException;
 

class AdminController extends Controller
{
    public function getsomething(){
        
        return Auth::user();
    }
    public function login(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required|min:8',
        ]);
        
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)){
            return response()->json([
                'auth'  =>  'success'
            ]);
            
        }else{
            return response()->json([
                'auth'  =>  'failed'
            ]);
        }

        return $validated;
    }
    
    public function logout()
    {
        auth()->guard('web')->logout();
    }
}

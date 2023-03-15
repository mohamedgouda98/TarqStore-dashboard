<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthApiController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if($token = Auth::attempt($credentials))
        {
            return response()->json([
                'id' => Auth::id(),
                'name' => Auth::user()->name,
                'token' => $token
            ]);
        }

        return response()->json([
            'error' => 'admin not found'
        ]);
    }

    public function home()
    {
        return response()->json([
            'key' =>'home'
        ]);
    }
}

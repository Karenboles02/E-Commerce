<?php

namespace App\Http\Controllers\Api\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\Auth\LoginUserRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginUserRequest $request){

        $validated= $request->validated();
 
        $credentials= [
            'email' => $validated['email'], 
            'password' => $validated['password'], 
        ];
        
        if (Auth::attempt($credentials)) {

            $user = Auth::user();
            $sucess=[
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            ];

            $sucess['token'] = $user->createToken('user-access')->plainTextToken;
            return response()->json($sucess, 200);

        }

        return response()->json("this user is not authorized",401);
    }

}


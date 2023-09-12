<?php

namespace App\Http\Controllers\Api\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Auth\LoginAdminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function login(LoginAdminRequest $request){

        $validated= $request->validated();

        $credentials = [
            'username' => $validated['username'], 
            'password' => $validated['password'], 
        ];

        if (Auth::guard('admin')->attempt($credentials)) {

            dd(Auth::user());

            $token = $request->user('admin')->createToken('admin-access')->plainTextToken;
            return response()->json(['token' => $token], 200);

        }

        return response()->json("this user is not authorized",401);
    }
}


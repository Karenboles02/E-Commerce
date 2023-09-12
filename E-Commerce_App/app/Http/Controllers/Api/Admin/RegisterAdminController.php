<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\RegisterAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class RegisterAdminController extends Controller
{
    public function register( RegisterAdminRequest $request){
        $validated= $request->validated();
        $admin=Admin::create($validated);
        return response()->json("Admin is stored succesfully", 200);
    }
}

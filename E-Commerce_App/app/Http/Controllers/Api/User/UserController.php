<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\DeleteUserRequest;
use App\Http\Requests\Api\User\StoreUserRequest;
use App\Http\Requests\Api\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\UsersResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users= User::get();
        
        return response()->json(UsersResource::collection($users), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        $user=User::create($validated);

        return response()->json("User is stored succesfully", 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user= User::findOrFail($id);
        return response()->json(new UserResource($user), 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $validated = $request->validated();
       
        $user= User::findOrFail($id);
        $user-> update($validated);
        return response()->json(new UserResource($user), 200);
        //return response()->json("User is updated succesfully", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteUserRequest $requset, string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json('User is deleted successfully', 200);
    }
}

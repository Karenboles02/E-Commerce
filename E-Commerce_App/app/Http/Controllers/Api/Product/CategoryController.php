<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Product\Category\DeleteCategoryRequest;
use App\Http\Requests\Api\Product\Category\StoreCategoryRequest;
use App\Http\Requests\Api\Product\Category\UpdateCategoryRequest;
use App\Http\Resources\Product\Category\CategoriesResource;
use App\Http\Resources\Product\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories= Category::get();
        
        return response()->json(CategoriesResource::collection($categories), 200);
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
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        $category=Category::create($validated);

        return response()->json("Category is stored succesfully", 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category= Category::findOrFail($id);
        return response()->json(new CategoryResource($category), 200);
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
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $validated = $request->validated();
       
        $category= Category::findOrFail($id);
        $category-> update($validated);
        return response()->json(new CategoryResource($category), 200);
        //return response()->json("User is updated succesfully", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteCategoryRequest $request,string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json('Category is deleted successfully', 200);
    }
}

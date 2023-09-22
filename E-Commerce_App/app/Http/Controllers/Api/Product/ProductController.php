<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Product\Product\DeleteProductRequest;
use App\Http\Requests\Api\Product\Product\StoreProductRequest;
use App\Http\Requests\Api\Product\Product\UpdateProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\ProductsResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products= Product::get();
        
        return response()->json(ProductsResource::collection($products), 200);
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
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        $product=Product::create($validated);

        return response()->json("Product is stored succesfully", 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product= Product::findOrFail($id);
        return response()->json(new ProductResource($product), 200);
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
    public function update(UpdateProductRequest $request, string $id)
    {
        $validated = $request->validated();
       
        $product= Product::findOrFail($id);
        $product-> update($validated);
        return response()->json(new ProductResource($product), 200);
        //return response()->json("User is updated succesfully", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteProductRequest $request,string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json('Product is deleted successfully', 200);
    }
}

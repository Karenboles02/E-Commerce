<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Product\Discount\DeleteDiscountRequest;
use App\Http\Requests\Api\Product\Discount\StoreDiscountRequest;
use App\Http\Requests\Api\Product\Discount\UpdateDiscountRequest;
use App\Http\Requests\Api\User\UpdateUserRequest;
use App\Http\Resources\Product\Discount\DiscountResource;
use App\Http\Resources\Product\Discount\DiscountsResource;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discounts= Discount::get();
        
        return response()->json(DiscountsResource::collection($discounts), 200);
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
    public function store(StoreDiscountRequest $request)
    {
        $validated = $request->validated();

        $discount=Discount::create($validated);

        return response()->json("Discount is stored succesfully", 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $discount= Discount::findOrFail($id);
        return response()->json(new DiscountResource($discount), 200);
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
    public function update(UpdateDiscountRequest $request, string $id)
    {
        $validated = $request->validated();
       
        $discount= Discount::findOrFail($id);
        $discount-> update($validated);
        return response()->json(new DiscountResource($discount), 200);
        //return response()->json("User is updated succesfully", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteDiscountRequest $request,string $id)
    {
        $discount = Discount::findOrFail($id);
        $discount->delete();
        return response()->json('Discount is deleted successfully', 200);
    }
}

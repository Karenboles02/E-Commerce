<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Product\Category\CategoryResource;
use App\Http\Resources\Product\Discount\DiscountResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description'=> $this->description,
            'category'=>new CategoryResource($this->category),
            'price'=> $this->price,
            'discount'=>new DiscountResource($this->discount),
            'stock'=> $this->stock,
            'image_url' => $this->getFirstMediaUrl('Product_image', 'thumbnail'), // 'User_image' is the collection name

            'created_at' => $this->created_at->format('d-m-Y'),
            'updated_at' => $this->updated_at->format('d-m-Y'),
            
        ];
    }
}

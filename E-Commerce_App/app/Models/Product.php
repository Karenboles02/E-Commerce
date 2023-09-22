<?php

namespace App\Models;

use Hamcrest\Arrays\IsArray;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model
{
    use HasFactory,InteractsWithMedia;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'category_id',
        'discount_id',
        
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function discount(){
        return $this->belongsTo(Discount::class);
    }
    public function image($images,$collection)
    {
        if(is_array($images)){
            foreach($images as $image){
                $this->addMedia($image) 
                ->toMediaCollection($collection); 
            }
        }
        else{

            $this->addMedia($images) 
            ->toMediaCollection('Product_image'); 
        }

    }
                
}



<?php

namespace App\Http\Requests\Api\Product\Product;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'nullable|max:50',
            'description'=>'nullable|string|max:255',
            'price'=>'nullable|decimal:2',
            'stock'=>'nullable|integer',
            'category_id'=>'nullable|exists:categories,id',
            'discount_id'=>'nullable|exists:discounts,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg'
        ];
    }
     /**
 * Get the error messages for the defined validation rules.
 *
 * @return array<string, string>
    */
    public function messages(): array
    {
        return [
    
            'name.max:50' => 'name is at max length',

           
            'description.max:255' => 'description is at max length',

            
            'price.decimal:2' => 'A price must be decimal of 2 digits',

            
            'stock.integer' => 'A stock must be integer',

            
            'category_id.exists:categories,id' => 'Category ID does not exist',

            'discount_id.exists:discoubts,id' => 'Discount ID does not exist',

        ];
    }
}

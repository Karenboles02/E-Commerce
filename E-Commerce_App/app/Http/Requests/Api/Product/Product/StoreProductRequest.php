<?php

namespace App\Http\Requests\Api\Product\Product;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends BaseFormRequest
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
            'name'=>'required|max:50',
            'description'=>'required|string|max:255',
            'price'=>'required|decimal:2',
            'stock'=>'required|integer',
            'category_id'=>'required|exists:categories,id',
            'discount_id'=>'required|exists:discounts,id',
            'image' => 'required|image|mimes:jpeg,png,jpg'
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
            'name.required' => 'A name is required',
            'name.max:50' => 'name is at max length',

            'description.required' => 'A description is required',
            'description.max:255' => 'description is at max length',

            'price.required' => 'A price is required',
            'price.decimal:2' => 'A price must be decimal of 2 digits',

            'stock.required' => 'A stock quantity is required',
            'stock.integer' => 'A stock must be integer',

            'category_id.required' => 'A category ID is required',
            'category_id.exists:categories,id' => 'Category ID does not exist',

            'discount_id.required' => 'A discount ID is required',
            'discount_id.exists:discoubts,id' => 'Discount ID does not exist',

        ];
    }
}

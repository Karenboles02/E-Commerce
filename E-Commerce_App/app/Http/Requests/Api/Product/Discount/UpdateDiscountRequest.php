<?php

namespace App\Http\Requests\Api\Product\Discount;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDiscountRequest extends BaseFormRequest
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
            'name'=>'nullable|max:255',
            'percentage'=>'nullable|between:0,0.99',
            'is_active'=>'nullable|boolean',
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
            
            'name.max:255' => 'name is at max length',
           
            'percentage.between:0,0.99'=>'percentage not in valid range (0-0.99)',
           
            'is_active.boolean'=>'is_active is not boolean'
        ];
    }
}

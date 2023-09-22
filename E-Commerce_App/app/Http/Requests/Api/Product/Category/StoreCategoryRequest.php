<?php

namespace App\Http\Requests\Api\Product\Category;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|max:255|unique:categories,name'
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
            'name.max:255' => 'name is at max length',
            'name.unique:categories,name'=>'name is already taken'
        ];
    }
}

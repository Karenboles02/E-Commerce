<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends BaseFormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email',  
            'password'=>'required',
            'telephone'=>'requied | regex:/^01\d{1}-\d{4}-\d{4}$/',
        
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
        'email.required' => 'An email is required',
        'email.email' => 'email not in the suitable form',
        'email.unique:users' => 'email is already taken',
        'password.required'=>'A password is required',
        'telephone.required'=>'A telephone is required',
        'telephone.regex:/^01\d{1}-\d{4}-\d{4}$/'=>" telephone is not in 01#-####_#### form",


    ];
}
}

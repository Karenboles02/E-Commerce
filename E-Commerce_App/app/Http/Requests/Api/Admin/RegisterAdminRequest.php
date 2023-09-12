<?php

namespace App\Http\Requests\Api\Admin;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class RegisterAdminRequest extends BaseFormRequest
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
            'username' => 'required|unique:admins,username|string|min:3| max:30|regex:/^[a-zA-Z0-9_]+$/', 
            'password' => 'required',
        ];
    }

    public function messages(): array
    {
    return [
        
        'username.required' => 'username is required',
        'username.unique:admins' => 'username does not exist',
        'username.string'=>'username is not a string',
        'username.min:3'=>'username is less than 3 characters',
        'username.max:30'=>'username is more than 30 characters',
        'username.regex:/^[a-zA-Z0-9_]+$/'=>'username is not in the suitable form',
        'password.required'=>'a password is required',
        ];
    }  
}

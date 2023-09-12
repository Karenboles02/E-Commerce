<?php

namespace App\Http\Requests\Api\Admin\Auth;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class LoginAdminRequest extends BaseFormRequest
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
            
           'username' => 'required|exists:admins,username', 
            'password' => 'required',
        ];
    }

    public function messages(): array
    {
    return [
        
        'username.required' => 'username is required',
        'username.exists:admins' => 'username does not exist',
        'password.required'=>'a password is required',
        ];
    }  
    
}

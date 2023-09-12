<?php

namespace App\Http\Requests\Api\User\Auth;

use App\Http\Requests\BaseFormRequest;
use Faker\Provider\Base;
use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends BaseFormRequest
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

            'email' => 'required|exists:users,email', 
            'password' => 'required',
        ];
    }

    public function messages(): array
    {
    return [
        
        'email.required' => 'email is required',
        'email.exists:users' => 'email does not exist',
        'password.required'=>'a password is required',
        ];
    }

        
    
}

<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\BaseFormRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends BaseFormRequest
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
            'name' => 'nullable|max:255',
            'email' => 'nullable|unique:users|email',  
            'password'=>'nullable',
            'telephone'=>'nullable | regex:/^01\d{1}-\d{4}-\d{4}$/',
        ];
    }
    public function messages(): array
    {
    return [
        
        'name.max:255' => 'name is at max length',
        'email.email' => 'email not in the suitable form',
        'email.unique:users' => 'email is already taken',
        'telephone.regex:/^01\d{1}-\d{4}-\d{4}$/'=>" telephone is not in 01#-####_#### form",
        ];
    }
}
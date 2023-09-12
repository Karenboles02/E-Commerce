<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseFormRequest extends FormRequest
{
    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $res = [

            'code' => 422, //Code Error
            'message' => 'Validation error', //Massage Return in Response Data Field
            'status'=>'failed',
            'error' => $validator->errors()->first() //Validator Errors
           
        ];
            throw new HttpResponseException(response()->json($res
        , 422));
    }
}

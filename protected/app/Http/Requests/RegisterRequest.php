<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username'=>'required|min:2|max:30|regex:/^[a-z0-9._-]*$/',
            'password'=>'required|min:8|max:16|regex:/^(?=.*[A-Z])(?=.*[@#$%])(?=.*[0-9])(?=.*[a-z])/',
            'pin'=>'string|required|min:6',
            'referal_code'=>'',
            'kewarganegaraan'=>'string|required',
            'name'=>'string|required',
            'pertanyaan'=>'string|required',
            'jawaban'=>'string|required'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }  
}

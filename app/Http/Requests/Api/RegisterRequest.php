<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:5',
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('api/fields.name'),
            'email' => __('front/fields.email'),
            'password' => __('front/fields.phone'),
        ];
    }

    protected function failedValidation(Validator $validator) {
        $response = [
            'message' => $validator->errors()->first(),
            'errors' => $validator->errors()
        ];
        throw new HttpResponseException(response()->error('Error occurred',$response));
    }
}

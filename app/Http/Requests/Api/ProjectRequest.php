<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProjectRequest extends FormRequest
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
            'title' => 'required|min:4',
            'description' => 'required',
            'user_id' => 'required,exist:users'
        ];
    }

    public function attributes()
    {
        return [
            'title' => __('api/project.fields.title'),
            'description' => __('front/project.fields.description'),
            'user_id' => __('front/project.fields.user_id'),
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

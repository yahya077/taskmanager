<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TaskRequest extends FormRequest
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
            'assigned_to' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id'

        ];
    }

    public function attributes()
    {
        return [
            'title' => __('api/task.fields.title'),
            'description' => __('api/task.fields.description'),
            'assigned_to' => __('api/task.fields.assigned_to'),
            'project_id' => __('api/task.fields.project_id'),
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

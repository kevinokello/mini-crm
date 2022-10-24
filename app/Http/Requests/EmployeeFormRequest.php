<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeFormRequest extends FormRequest
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
        $rules = [
            'first_name' => [
                'required',
                'string',
                'max:200'
            ],
            'last_name' => [
                'required',
                'string',
                'max:200'
            ],
            'company_id' => [
                'nullable',
                'integer'
            ],
            'email' => [
                'required',
                'string',
                'max:200'
            ],
            'phone' => [
                'required',
                'integer'
            ],
            'branch' => [
                'required',
                'string',
                'max:200'
            ],
            'department' => [
                'required',
                'string',
                'max:200'
            ],

        ];
        return $rules;
    }
}

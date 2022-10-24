<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyFormRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:200'
            ],
            'email' => [
                'required',
                'string',
                'max:200'
            ],
            'branch' => [
                'required'
            ],
            'department' => [
                'required'
            ],
            'website' => [
                'required'
            ],
            'logo' => [
                'nullable',
                // 'mimes: jpeg,jpg,png,svg'
            ],
        ];
        return $rules;
    }
}

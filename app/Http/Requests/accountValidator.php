<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class accountValidator extends FormRequest
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
          'name' => 'required',
          'desc' => 'required'
        ];
    }

    public function messages()
    {
        return [
          'name.required' => 'We need to know your name.',
          'desc.required' => 'The description field is required.'
        ];
    }
}

<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('country');

        $commonRules = [
            'shortname' => [
                'required',
                'min:2',
                'max:2',
                'unique:countries,shortname' . ($id ? ',' . $id : ''),
                'regex:/^[a-zA-Z]+$/',
            ],
            'name' => [
                'required',
                'min:3',
                'unique:countries,name' . ($id ? ',' . $id : ''),
                'regex:/^[a-zA-Z]+$/',
            ],
        ];

        return $commonRules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Name field is required.',
            'name.unique'   => 'The country has already been taken.',
            'name.regex'    => 'Please enter only alphabets.',
        ];
    }
}

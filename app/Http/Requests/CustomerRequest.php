<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
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
        $id = $this->route('customer');
        $rules = [
            'company_name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:255',
            'customer_type' => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'company_name.required'  => 'The company name field is required',
            'company_name.regex'  => 'The company name format is invalid. Add Only letters, numbers or both',
            'customer_type.required'  => 'The type field is required.',
        ];
    }
}

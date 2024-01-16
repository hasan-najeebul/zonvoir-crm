<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeTypeRequest extends FormRequest
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
        $id = $this->route('employee_type');

        $commonRules = [
            'name' => [
                'required',
                'unique:employee_types,name' . ($id ? ',' . $id : ''),
            ],
        ];

        return $commonRules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Name field is required.',
            'name.unique'   => 'The employee type has already been taken.',
        ];
    }
}

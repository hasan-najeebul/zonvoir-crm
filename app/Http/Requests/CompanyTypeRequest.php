<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyTypeRequest extends FormRequest
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
        $id = $this->route('company_type');
        return [
            'name' => "required|unique:company_types,name,{$id},id,deleted_at,NULL|regex:/^[\pL\s\-]+$/u",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name field is required',
            'name.regex' => 'The company type format is invalid. Add only letters',
        ];
    }
}

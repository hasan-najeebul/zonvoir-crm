<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResignationStatusRequest extends FormRequest
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
        $id = $this->route('resignation_status');

        $commonRules = [
            'name' => [
                'required',
                'unique:resignation_statuses,name' . ($id ? ',' . $id : ''),
            ],
        ];

        return $commonRules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Name field is required.',
            'name.unique'   => 'The resignation status has already been taken.',
        ];
    }
}

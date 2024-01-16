<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
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
        $id = $this->route('skill');

        $commonRules = [
            'name' => [
                'required',
                'unique:skills,name' . ($id ? ',' . $id : ''),
            ],
        ];

        return $commonRules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Name field is required.',
            'name.unique'   => 'The skill has already been taken.',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SourceRequest extends FormRequest
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
        $id = $this->route('source');
        return [
            'name' => "required|unique:sources,name,{$id},id,deleted_at,NULL|regex:/^[\pL\s]+$/u",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Source name field is required',
            'name.regex' => 'The source format is invalid. Add only letters',

        ];
    }
}

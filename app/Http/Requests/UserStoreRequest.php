<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
        return [
            'role_id'  => 'required',
            'password'  => 'required',
            'email'     => 'required|email|unique:users',
            'gender_id'  => 'required',
            'last_name'  => 'required',
            'first_name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First name field is required.',
            'last_name.required'  => 'Last name field is required.',
            'gender_id.required'  => 'Gender field is required.',
            'email.required'  => 'Email name field is required.',
            'password.required'  => 'Password name field is required.',
            'role_id.required'  => 'Role name field is required.',
        ];
    }
}

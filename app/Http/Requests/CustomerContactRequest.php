<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerContactRequest extends FormRequest
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
        $id = $this->route('customer_contact');
        $rules =  [
            'first_name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:255',
            'last_name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:255',
            'email' => 'required|email:rfc,dns|unique:contacts,email,'.$id,
            'password' => $id ? 'nullable' : 'required',
            'profile_image' => 'nullable|extensions:jpg,png,jpeg',
        ];
        return $rules;
    }
}

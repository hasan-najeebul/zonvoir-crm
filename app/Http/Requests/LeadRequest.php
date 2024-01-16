<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LeadRequest extends FormRequest
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
        $leadId = $this->route('lead') ?? null;

        return [
            'name'  => 'required',
            'address'  => 'required',
            'title'     => 'required',
            'city'  => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('leads')->ignore($leadId),
            ],
            'state' => 'required',
            'website' => 'required',
            'country' => 'required',
            'phonenumber' => 'required',
            'zip' => 'required',
            'lead_value' => 'required',
            'default_language' => 'required',
            'company' => 'required',
            'description' => 'required',
        ];
    }



    public function messages()
    {
        return [
            'name.required' => 'The name field is required',
            'address.required' => 'The address field is required',
            'title.required' => 'The position field is required',
            'city.required' => 'The city field is required',
            'email.required' => 'The email field is required',
            'email.email' => 'The email must be a valid email address',
            'email.unique' => 'The email has already been taken',
            'state.required' => 'The state field is required',
            'website.required' => 'The website field is required',
            'country.required' => 'The country field is required',
            'phonenumber.required' => 'The phone number field is required',
            'zip.required' => 'The zip field is required',
            'lead_value.required' => 'The lead value field is required',
            'default_language.required' => 'The default language field is required',
            'company.required' => 'The company field is required',
            'description.required' => 'The description field is required',
        ];
    }

}

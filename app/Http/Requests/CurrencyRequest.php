<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CurrencyRequest extends FormRequest
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
        $id = $this->route('currency');
        $rules = [
            'currency_name' => "required|unique:currencies,currency_name,{$id},id,deleted_at,NULL|regex:/^[\pL\s]+$/u",
            'currency_code' => "required|unique:currencies,currency_code,{$id},id,deleted_at,NULL|alpha:ascii",
            'currency_symbol' => "required|unique:currencies,currency_symbol,{$id},id,deleted_at,NULL",
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'currency_name.required' => 'The currency name field is required.',
            'currency_code.required' => 'The currency code field is required.',
            'currency_symbol.required' => 'The currency symbol field is required.',
            'currency_name.regex' => 'The currency name format is invalid. Add only letters',
            'currency_code.alpha' => 'The currency code format is invalid. Add only letters',
        ];
    }
}

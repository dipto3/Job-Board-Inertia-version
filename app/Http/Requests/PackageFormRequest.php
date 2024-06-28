<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageFormRequest extends FormRequest
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
            'name' => 'required',
            'limit' => 'required',
            'price' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'limit.required' => 'The limit field is required.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price field must be a number.',
        ];
    }
}

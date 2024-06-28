<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobFormRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'title' => 'required',
            'tags' => 'required',
            'location' => 'required',
            'published' => 'required|date',
            'deadline' => 'required|date',
            'salary' => 'required',
            'employment_type' => 'required',
            'experience' => 'required',
            'gender' => 'required',
            'link' => 'required|url',
            'description' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'The category is required.',
            'category_id.exists' => 'The category is required.',
            'title.required' => 'The title is required.',
            'tags.required' => 'The tags field is required.',
            'location.required' => 'The location field is required.',
            'published.required' => 'The published date is required.',
            'published.date' => 'The published date must be a valid date.',
            'deadline.required' => 'The deadline is required.',
            'deadline.date' => 'The deadline must be a valid date.',
            'salary.required' => 'The salary field is required.',
            'employment_type.required' => 'The employment type field is required.',
            'experience.required' => 'The experience field is required.',
            'gender.required' => 'The gender field is required.',
            'link.required' => 'The link field is required.',
            'link.url' => 'The link must be a valid URL.',
            'description.required' => 'The description field is required.',
            'status.required' => 'The status field is required.',
        ];
    }
}

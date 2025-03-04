<?php

namespace App\Http\Requests\Admin\Services;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'name.en' => ['required', 'string', 'max:255'],
            'name.ar' => ['required', 'string', 'max:255'],
            'description.en' => ['required', 'string', 'max:1000'],
            'description.ar' => ['required', 'string', 'max:1000'],
            'meta_title.en' => ['required', 'string', 'max:1000'],
            'meta_title.ar' => ['required', 'string', 'max:1000'],
            'meta_description.en' => ['required', 'string', 'max:1000'],
            'meta_description.ar' => ['required', 'string', 'max:1000'],
            'icon' => 'nullable|image|mimes:png,svg,ico,jpg',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
        ];
    }
}

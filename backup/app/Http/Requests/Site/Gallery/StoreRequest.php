<?php

namespace App\Http\Requests\Site\Gallery;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title_ar' => 'required|unique:site_photos,title->ar',
            'title_en' => 'required|unique:site_photos,title->en',
            'main_image' => 'required|mimes:jpg,jpeg,png',
            'images.*' => 'required|mimes:jpg,jpeg,png',
        ];
    }
}

<?php

namespace App\Http\Requests\Admin\about_us;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'our_mission_ar' => 'required|string',
            'our_mission_en' => 'required|string',
            'our_vision_ar' => 'required|string',
            'our_vision_en' => 'required|string',
            'our_experience_en' => 'required|string',
            'our_experience_ar' => 'required|string',
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'button_text_ar' => 'nullable|string|max:255',
            'button_text_en' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:8048',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'meta_title_ar' => 'nullable|string|max:255',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_keywords_ar' => 'nullable|string',
            'meta_keywords_en' => 'nullable|string',
            'meta_description_ar' => 'nullable|string',
            'meta_description_en' => 'nullable|string',
            'notes_ar' => 'required|string',
            'notes_en' => 'required|string',
        ];
    }
}

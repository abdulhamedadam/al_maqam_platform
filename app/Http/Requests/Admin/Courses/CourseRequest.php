<?php

namespace App\Http\Requests\Admin\Courses;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'seo_head_keyword.en' => ['required', 'string', 'max:255'],
            'seo_head_keyword.ar' => ['required', 'string', 'max:255'],
            'seo_head_description.en' => ['required', 'string', 'max:1000'],
            'seo_head_description.ar' => ['required', 'string', 'max:1000'],
            'min_age' => ['required', 'integer', 'min:0'],
            'max_age' => ['required', 'integer', 'gt:min_age'],
            'status' => ['required', 'boolean'],
            'unique' => ['required', 'boolean'],
            'section_id' => ['required', 'exists:sections,id'],
//            'lectures.*.num_of_minutes' => ['required', 'integer'],
//            'lectures.*.lecture_price' => ['required', 'numeric'],
//            'lectures.*.num_of_lectures' => ['required', 'integer'],
//            'lectures.*.lectures_in_week' => ['required', 'integer', 'min:0', 'max:255'],
//            'lectures.*.total_price' => ['required', 'numeric'],
//            'lectures.*.for_group' => ['nullable'],//because in update page in case 0 it returns null, and in controller i convert null to 0
//            'lectures.*.max_in_group' => ['required_if:for_group,1', 'integer']
        ];
    }
}

<?php

namespace App\Http\Requests\Admin\Teachers;

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->route('teacher'),
            'phone' => 'required|string|max:20',
            'birthday' => 'required|date',
            'gender' => 'required|string|in:m,f',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'password_confirmation' => 'required_with:password',
            'admission_terms' => 'required|array|min:1',
            'education' => 'nullable|string|max:255',
            'azhar' => 'required|string|in:yazhar,nazhar',
            'quran_license' => 'required|string|in:ylicense,nlicense',
            'other_license' => 'required|string|in:yotherlicense,notherlicense',
            'other_license_details' => 'required_if:other_license,yotherlicense|string|max:255|nullable',
            'teaching_online' => 'required|string|in:yteachingonline,nteachingonline',
            'communication_platforms' => 'required|array|min:1',
            'teaching_kids' => 'required|string|in:yteachingkids,nteachingkids',
            'teaching_subjects' => 'required|array|min:1',
            'working_hours' => 'required|array|min:1',
            // 'other_working_hours' => [
            //     function ($attribute, $value, $fail) {
            //         if (request()->has('working_hours') && in_array('other', request()->input('working_hours')) && empty($value)) {
            //             $fail('The other working hours field is required when "Other" is selected.');
            //         }
            //     },
            //     'string',
            //     'max:255',
            //     'nullable',
            // ],
            'work_shifts' => 'required|array|min:1',
            'fri_sat_work' => 'required|string|in:yfri-sat,nfri-sat',
        ];
    }
}

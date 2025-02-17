<?php

namespace App\Http\Requests\Hr\operation;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'emp_id' => 'required',
            'date_permission' => 'required',
            'start_permission' => 'required',
            'end_permission' => 'required',
            'reason' => 'required',

        ];
    }
}

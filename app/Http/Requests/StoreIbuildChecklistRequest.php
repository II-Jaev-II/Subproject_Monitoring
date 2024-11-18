<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIbuildChecklistRequest extends FormRequest
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
            'vcriReviewDate' => 'required',
            'vcriAccreditedDistance' => 'file|mimes:png,jpg,pdf,docx'
        ];
    }

    public function messages(): array
    {
        return [
            'vcriReviewDate.required' => 'Please select a date of review.',
            'vcriAccreditedDistance.mimes' => 'JPG,PNG,PDF, & DOCX are the only supported file types.',
        ];
    }
}

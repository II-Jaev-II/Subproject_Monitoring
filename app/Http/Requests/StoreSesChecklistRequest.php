<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSesChecklistRequest extends FormRequest
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
            'reviewDate' => 'required',
            'socialAssesment' => 'required',
            'environmentalAssesment' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'reviewDate.required' => 'Please select a date.',
            'socialAssesment.required' => 'Please enter an input in social assesment field.',
            'environmentalAssesment.required' => 'Please enter an input in environmental assesment field.',
        ];
    }
}

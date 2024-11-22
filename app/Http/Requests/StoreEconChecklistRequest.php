<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEconChecklistRequest extends FormRequest
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
            'summary' => 'required',
            'status' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'reviewDate.required' => 'Please select the date of review.',
            'summary.required' => 'Please enter an input in summary field.',
            'status.required' => 'Please select a status.',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGGUChecklistRequest extends FormRequest
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
            'kmzFile' => 'required',
            'gguReport' => 'required|mimes:pdf',
            'status' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'reviewDate.required' => 'Please select the date of review.',
            'kmzFile.required' => 'Please attach a KMZ File.',
            'gguReport.required' => 'Please attach a report.',
            'gguReport.mimes' => 'You can only attach a PDF file.',
            'status.required' => 'Please select a status of the validation.',
        ];
    }
}

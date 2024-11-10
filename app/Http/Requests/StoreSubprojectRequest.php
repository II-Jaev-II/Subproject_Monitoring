<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubprojectRequest extends FormRequest
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
            'proponent' => 'required',
            'province' => 'required',
            'municipality' => 'required',
            'barangay' => 'required',
            'projectName' => 'required|max:255',
            'projectType' => 'required',
            'projectCategory' => 'required',
            'letterOfInterest' => 'max:10000|mimes:jpg,png,pdf,docx',
            'letterOfRequest' => 'max:10000|mimes:jpg,png,pdf,docx',
            'letterOfEndorsement' => 'max:10000|mimes:jpg,png,pdf,docx',
        ];
    }

    public function messages()
    {
        return [
            'proponent' => 'Please select a proponent.',
            'province' => 'Please select a province.',
            'municipality' => 'Please select a municipality.',
            'barangay' => 'Please select a barangay.',
            'projectName' => 'Please enter a project name.',
            'projectName.max' => 'The project name is too long.',
            'projectType' => 'Please select a project type.',
            'projectCategory' => 'Please select a project category.',
            'letterOfInterest.max' => 'The file should not be more than 10 MB.',
            'letterOfInterest.mimes' => 'The following file type are only supported: jpg,png,pdf, and docx',
            'letterOfRequest.max' => 'The file should not be more than 10 MB.',
            'letterOfRequest.mimes' => 'The following file type are only supported: jpg,png,pdf, and docx',
            'letterOfEndorsement.max' => 'The file should not be more than 10 MB.',
            'letterOfEndorsement.mimes' => 'The following file type are only supported: jpg,png,pdf, and docx',
        ];
    }
}

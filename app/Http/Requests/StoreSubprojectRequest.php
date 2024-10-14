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
            'cluster' => 'required',
            'region' => 'required',
            'province' => 'required',
            'municipality' => 'required',
            'barangay' => 'required',
            'projectName' => 'required|max:255',
            'projectType' => 'required',
            'projectCategory' => 'required',
            'fundSource' => 'required',
            'indicativeCost' => 'required|numeric',
            'letterOfInterest' => 'required|max:10000|mimes:jpg,png,pdf,docx',
            'commodity' => 'required',
            'commodityReport' => 'required|max:10000|mimes:jpg,png,pdf,docx',
        ];
    }

    public function messages()
    {
        return [
            'proponent' => 'Please select a proponent.',
            'cluster' => 'Please select a cluster.',
            'region' => 'Please select a region.',
            'province' => 'Please select a province.',
            'municipality' => 'Please select a municipality.',
            'barangay' => 'Please select a barangay.',
            'projectName' => 'Please enter a project name.',
            'projectName.max' => 'The project name is too long.',
            'projectType' => 'Please select a project type.',
            'projectCategory' => 'Please select a project category.',
            'fundSource' => 'Please select a fund source.',
            'indicativeCost' => 'Please enter an indicative cost.',
            'letterOfInterest' => 'Please insert the letter of interest/request/endorsement.',
            'letterOfInterest.max' => 'The file should not be more than 10 MB.',
            'letterOfInterest.mimes' => 'The following file type are only supported: jpg,png,pdf, and docx',
            'commodity' => 'Please select a commodity.',
            'commodityReport' => 'Please insert the report.',
            'commodityReport.max' => 'The file should not be more than 10 MB.',
            'commodityReport.mimes' => 'The following file type are only supported: jpg,png,pdf, and docx',
        ];
    }
}

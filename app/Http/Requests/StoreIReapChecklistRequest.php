<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIReapChecklistRequest extends FormRequest
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
            'authenticatedCopy' => 'file|mimes:docx,pdf,jpg,png',
            'byLaws' => 'file|mimes:docx,pdf,jpg,png',
            'certificateOfRegistration' => 'file|mimes:docx,pdf,jpg,png',
            'certificateRegistry' => 'file|mimes:docx,pdf,jpg,png',
            'certificates' => 'file|mimes:docx,pdf,jpg,png',
            'accomplishmentReports.*' => 'file|mimes:docx,pdf,jpg,png',
            'photographs.*' => 'file|mimes:docx,pdf,jpg,png',
            'existingOrganizationalStructure' => 'file|mimes:docx,pdf,jpg,png',
            'secretaryCertificate' => 'file|mimes:docx,pdf,jpg,png',
            'fcaMembersProfile.*' => 'file|mimes:docx,pdf,jpg,png',
            'photocopyReceipt' => 'file|mimes:docx,pdf,jpg,png',
            'latestFinancialReport' => 'file|mimes:docx,pdf,jpg,png',
            'swornAffidavit' => 'file|mimes:docx,pdf,jpg,png',
            'moa' => 'file|mimes:docx,pdf,jpg,png',
            'releaseOfFunds' => 'file|mimes:docx,pdf,jpg,png',
            'status' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'reviewDate.required' => 'Please select a date.',
            'authenticatedCopy.mimes' => 'JPG,PNG,PDF, & DOCX are the only supported file types.',
            'byLaws.mimes' => 'JPG,PNG,PDF, & DOCX are the only supported file types.',
            'certificateOfRegistration.mimes' => 'JPG,PNG,PDF, & DOCX are the only supported file types.',
            'certificateRegistry.mimes' => 'JPG,PNG,PDF, & DOCX are the only supported file types.',
            'certificates.mimes' => 'JPG,PNG,PDF, & DOCX are the only supported file types.',
            'accomplishmentReports.*.mimes' => 'JPG,PNG,PDF, & DOCX are the only supported file types.',
            'photographs.*.mimes' => 'JPG,PNG,PDF, & DOCX are the only supported file types.',
            'existingOrganizationalStructure.mimes' => 'JPG,PNG,PDF, & DOCX are the only supported file types.',
            'secretaryCertificate.mimes' => 'JPG,PNG,PDF, & DOCX are the only supported file types.',
            'fcaMembersProfile.*.mimes' => 'JPG,PNG,PDF, & DOCX are the only supported file types.',
            'photocopyReceipt.mimes' => 'JPG,PNG,PDF, & DOCX are the only supported file types.',
            'latestFinancialReport.mimes' => 'JPG,PNG,PDF, & DOCX are the only supported file types.',
            'swornAffidavit.mimes' => 'JPG,PNG,PDF, & DOCX are the only supported file types.',
            'moa.mimes' => 'JPG,PNG,PDF, & DOCX are the only supported file types.',
            'releaseOfFunds.mimes' => 'JPG,PNG,PDF, & DOCX are the only supported file types.',
            'status.required' => 'Please select a status.',
        ];
    }
}

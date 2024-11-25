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
        $rules = [
            'subprojectId' => 'required|integer',
            'projectType' => 'required|string',
        ];

        if ($this->get('projectType') === 'VCRI') {
            $rules += [
                'vcriReviewDate' => 'required|date',
                'vcriAccreditedDistance' => 'nullable|file|mimes:pdf,jpg,docx,png',
            ];
        } elseif (in_array($this->get('projectType'), ['FMR', 'Bridge'])) {
            $rules += [
                'bridgeFmrReviewDate' => 'required|date',
                'connectedAllWeather' => 'required|string',
                'fmrBridgeAccreditedDistance' => 'nullable|file|mimes:pdf,jpg,docx,png',
                'trafficCount' => 'nullable|file|mimes:pdf,jpg,docx,png',
            ];
        } elseif (in_array($this->get('projectType'), ['CIS', 'PWS'])) {
            $rules += [
                'pwsCisReviewDate' => 'required|date',
                'pwsCisAccreditedDistance' => 'nullable|file|mimes:pdf,jpg,docx,png',
            ];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'vcriReviewDate.required' => 'Please select a date of review.',
            'bridgeFmrReviewDate.required' => 'Please select a date of review.',
            'connectedAllWeather.required' => 'Please select between yes or no.',
            'vcriAccreditedDistance.mimes' => 'JPG,PNG,PDF, & DOCX are the only supported file types.',
            'fmrBridgeAccreditedDistance.mimes' => 'JPG,PNG,PDF, & DOCX are the only supported file types.',
            'trafficCount.mimes' => 'JPG,PNG,PDF, & DOCX are the only supported file types.',
        ];
    }
}

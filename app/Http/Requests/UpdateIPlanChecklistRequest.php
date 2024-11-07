<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIPlanChecklistRequest extends FormRequest
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
            'justificationFile' => 'mimes:png,jpg',
            'pageMatrixVca' => 'mimes:png,jpg',
            'pageMatrixPcip' => 'mimes:png,jpg',
            'sensitivity' => 'required',
            'exposure' => 'required',
            'adaptiveCapacity' => 'required',
            'overallVulnerability' => 'required',
            'recommendation' => 'required',
            'reviewDate' => 'required',
            'generalRecommendation' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'justificationFile.mimes' => 'JPG & PNG are the only supported file types.',
            'pageMatrixVca.required' => 'Please attach a file.',
            'pageMatrixVca.mimes' => 'JPG & PNG are the only supported file types.',
            'pageMatrixPcip.mimes' => 'JPG & PNG are the only supported file types.',
            'sensitivity.required' => 'Please fill in the sensitivity field.',
            'exposure.required' => 'Please fill in the exposure field.',
            'adaptiveCapacity.required' => 'Please fill in the adaptive capacity field.',
            'overallVulnerability.required' => 'Please fill in the overall vulnerability field.',
            'recommendation.required' => 'Please fill in the recommendation field.',
            'reviewDate.required' => 'Please select a date of review.',
            'generalRecommendation.required' => 'Please fill in the general recommendations field.',
        ];
    }
}

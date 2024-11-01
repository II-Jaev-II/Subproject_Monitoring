<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIplanChecklistRequest extends FormRequest
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
            'commodities' => 'required|array|min:1',
            'commodities.*' => 'string',
            'linkedVca' => 'required',
            'pcip' => 'required',
            'sensitivity' => 'required',
            'exposure' => 'required',
            'adaptiveCapacity' => 'required',
            'overallVulnerability' => 'required',
            'recommendation' => 'required',
            'justificationFile' => 'file|mimes:jpg,png',
            'pageMatrixVca' => 'file|mimes:jpg,png',
            'pageMatrixPcip' => 'file|mimes:jpg,png',
        ];
    }

    public function messages(): array
    {
        return [
            'commodities.required' => 'You must select at least one commodity.',
            'commodities.min' => 'You must select at least one commodity.',
            'pcip.required' => 'Please select between yes or no.',
            'sensitivity.required' => 'Please fill in the sensitivity field.',
            'exposure.required' => 'Please fill in the exposure field.',
            'adaptiveCapacity.required' => 'Please fill in the adaptive capacity field.',
            'overallVulnerability.required' => 'Please fill in the overall vulnerability field.',
            'recommendation.required' => 'Please fill in the recommendation field.',
            'justificationFile.mimes' => 'JPG & PNG are the only supported file types.',
            'pageMatrixVca.mimes' => 'JPG & PNG are the only supported file types.',
            'pageMatrixPcip.mimes' => 'JPG & PNG are the only supported file types.',
        ];
    }
}

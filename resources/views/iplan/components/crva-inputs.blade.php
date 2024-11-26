<div>
    <label for="sensitivity" class="dark:text-green-600 text-sm">Sensitivity <span class="text-red-500">*</span></label>
    <select name="sensitivity" id="sensitivity"
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">
        <option value="" disabled {{ old('sensitivity') ? '' : 'selected' }}></option>
        <option value="-0.50 - -1.00 - Gain" {{ old('sensitivity') == '-0.50 - -1.00 - Gain' ? 'selected' : '' }}>-0.50 -
            -1.00 - Gain</option>
        <option value="-0.25 - -0.50 - Gain" {{ old('sensitivity') == '-0.25 - -0.50 - Gain' ? 'selected' : '' }}>-0.25 -
            -0.50 - Gain</option>
        <option value="-0.05 - -0.25 - Gain" {{ old('sensitivity') == '-0.05 - -0.25 - Gain' ? 'selected' : '' }}>-0.05 -
            -0.25 - Gain</option>
        <option value="0 - No Change" {{ old('sensitivity') == '0 - No Change' ? 'selected' : '' }}>0 - No Change
        </option>
        <option value="0.05 - 0.25 - Loss" {{ old('sensitivity') == '0.05 - 0.25 - Loss' ? 'selected' : '' }}>0.05 -
            0.25 - Loss</option>
        <option value="0.25 - 0.50 - Loss" {{ old('sensitivity') == '0.25 - 0.50 - Loss' ? 'selected' : '' }}>0.25 -
            0.50 - Loss</option>
        <option value="0.50 - 1.00 - Loss" {{ old('sensitivity') == '0.50 - 1.00 - Loss' ? 'selected' : '' }}>0.50 -
            1.00 - Loss</option>
    </select>
    @if ($errors->has('sensitivity'))
    <div class="text-red-600 mt-2 mb-2">
        {{ $errors->first('sensitivity') }}
    </div>
    @endif
</div>
<div>
    <label for="exposure" class="dark:text-green-600 text-sm">Exposure <span class="text-red-500">*</span></label>
    <select name="exposure" id="exposure"
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">
        <option value="" disabled {{ old('exposure') ? '' : 'selected' }}></option>
        <option value="0.00 - 0.20 Very Low" {{ old('exposure') == '0.00 - 0.20 Very Low' ? 'selected' : '' }}>0.00 -
            0.20 Very Low</option>
        <option value="0.20 - 0.40 Low" {{ old('exposure') == '0.20 - 0.40 Low' ? 'selected' : '' }}>0.20 - 0.40 Low
        </option>
        <option value="0.40 - 0.60 Moderate" {{ old('exposure') == '0.40 - 0.60 Moderate' ? 'selected' : '' }}>0.40 -
            0.60 Moderate</option>
        <option value="0.60 - 0.80 High" {{ old('exposure') == '0.60 - 0.80 High' ? 'selected' : '' }}>0.60 - 0.80 High
        </option>
        <option value="0.80 - 1.00 Very High" {{ old('exposure') == '0.80 - 1.00 Very High' ? 'selected' : '' }}>0.80 -
            1.00 Very High</option>
    </select>
    @if ($errors->has('exposure'))
    <div class="text-red-600 mt-2 mb-2">
        {{ $errors->first('exposure') }}
    </div>
    @endif
</div>
<div>
    <label for="adaptiveCapacity" class="dark:text-green-600 text-sm">Adaptive Capacity <span
            class="text-red-500">*</span></label>
    <select name="adaptiveCapacity" id="adaptiveCapacity"
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">
        <option value="" disabled {{ old('adaptiveCapacity') ? '' : 'selected' }}></option>
        <option value="0.00 - 0.20 Very Low" {{ old('adaptiveCapacity') == '0.00 - 0.20 Very Low' ? 'selected' : '' }}>
            0.00 - 0.20 Very Low</option>
        <option value="0.20 - 0.40 Low" {{ old('adaptiveCapacity') == '0.20 - 0.40 Low' ? 'selected' : '' }}>0.20 -
            0.40 Low</option>
        <option value="0.40 - 0.60 Moderate" {{ old('adaptiveCapacity') == '0.40 - 0.60 Moderate' ? 'selected' : '' }}>
            0.40 - 0.60 Moderate</option>
        <option value="0.60 - 0.80 High" {{ old('adaptiveCapacity') == '0.60 - 0.80 High' ? 'selected' : '' }}>0.60 -
            0.80 High</option>
        <option value="0.80 - 1.00 Very High"
            {{ old('adaptiveCapacity') == '0.80 - 1.00 Very High' ? 'selected' : '' }}>0.80 - 1.00 Very High</option>
    </select>
    @if ($errors->has('adaptiveCapacity'))
    <div class="text-red-600 mt-2 mb-2">
        {{ $errors->first('adaptiveCapacity') }}
    </div>
    @endif
</div>
<div>
    <label for="overallVulnerability" class="dark:text-green-600 text-sm">Overall Vulnerability <span
            class="text-red-500">*</span></label>
    <select name="overallVulnerability" id="overallVulnerability"
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">
        <option value="" disabled {{ old('overallVulnerability') ? '' : 'selected' }}></option>
        <option value="0.00 - 0.20 Very Low"
            {{ old('overallVulnerability') == '0.00 - 0.20 Very Low' ? 'selected' : '' }}>0.00 - 0.20 Very Low</option>
        <option value="0.20 - 0.40 Low" {{ old('overallVulnerability') == '0.20 - 0.40 Low' ? 'selected' : '' }}>0.20 -
            0.40 Low</option>
        <option value="0.40 - 0.60 Moderate"
            {{ old('overallVulnerability') == '0.40 - 0.60 Moderate' ? 'selected' : '' }}>0.40 - 0.60 Moderate</option>
        <option value="0.60 - 0.80 High" {{ old('overallVulnerability') == '0.60 - 0.80 High' ? 'selected' : '' }}>0.60
            - 0.80 High</option>
        <option value="0.80 - 1.00 Very High"
            {{ old('overallVulnerability') == '0.80 - 1.00 Very High' ? 'selected' : '' }}>0.80 - 1.00 Very High
        </option>
    </select>
    @if ($errors->has('overallVulnerability'))
    <div class="text-red-600 mt-2 mb-2">
        {{ $errors->first('overallVulnerability') }}
    </div>
    @endif
</div>
<div>
    <label for="recommendation" class="dark:text-green-600 text-sm">Recommendation <span class="text-red-500">*</span></label>
    <textarea name="recommendation" id="recommendation" rows="4"
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">{{ old('recommendation') }}</textarea>
    @if ($errors->has('recommendation'))
    <div class="text-red-600 mt-2 mb-2">
        {{ $errors->first('recommendation') }}
    </div>
    @endif
</div>
<div>
    <label for="generalRecommendation" class="dark:text-green-600 text-sm">General Recommendations <span
            class="text-red-500">*</span></label>
    <textarea name="generalRecommendation" id="generalRecommendation" rows="4"
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">{{ old('generalRecommendation') }}</textarea>
    @if ($errors->has('generalRecommendation'))
    <div class="text-red-600 mt-2 mb-2">
        {{ $errors->first('generalRecommendation') }}
    </div>
    @endif
</div>
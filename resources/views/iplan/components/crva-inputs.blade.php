<div>
    <label for="sensitivity" class="dark:text-green-600">Sensitivity <span class="dark:text-red-500">*</span></label>
    <input type="text" name="sensitivity" id="sensitivity" value="{{ old('sensitivity') }}"
        class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1">
    @if ($errors->has('sensitivity'))
        <div class="text-red-600 mt-2 mb-2">
            {{ $errors->first('sensitivity') }}
        </div>
    @endif
</div>
<div>
    <label for="exposure" class="dark:text-green-600">Exposure <span class="dark:text-red-500">*</span></label>
    <input type="text" name="exposure" id="exposure" value="{{ old('exposure') }}"
        class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1">
    @if ($errors->has('exposure'))
        <div class="text-red-600 mt-2 mb-2">
            {{ $errors->first('exposure') }}
        </div>
    @endif
</div>
<div>
    <label for="adaptiveCapacity" class="dark:text-green-600">Adaptive Capacity <span
            class="dark:text-red-500">*</span></label>
    <input type="text" name="adaptiveCapacity" id="adaptiveCapacity" value="{{ old('adaptiveCapacity') }}"
        class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1">
    @if ($errors->has('adaptiveCapacity'))
        <div class="text-red-600 mt-2 mb-2">
            {{ $errors->first('adaptiveCapacity') }}
        </div>
    @endif
</div>
<div>
    <label for="overallVulnerability" class="dark:text-green-600">Overall Vulnerability <span
            class="dark:text-red-500">*</span></label>
    <input type="text" name="overallVulnerability" id="overallVulnerability"
        value="{{ old('overallVulnerability') }}"
        class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1">
    @if ($errors->has('overallVulnerability'))
        <div class="text-red-600 mt-2 mb-2">
            {{ $errors->first('overallVulnerability') }}
        </div>
    @endif
</div>
<div>
    <label for="recommendation" class="dark:text-green-600">Recommendation <span
            class="dark:text-red-500">*</span></label>
    <textarea name="recommendation" id="recommendation" rows="4"
        class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1">{{ old('recommendation') }}</textarea>
    @if ($errors->has('recommendation'))
        <div class="text-red-600 mt-2 mb-2">
            {{ $errors->first('recommendation') }}
        </div>
    @endif
</div>
<div>
    <label for="generalRecommendation" class="dark:text-green-600 text-2xl">General Recommendations <span class="dark:text-red-500">*</span></label>
    <textarea name="generalRecommendation" id="generalRecommendation" rows="4"
        class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1">{{ old('generalRecommendation') }}</textarea>
        @if ($errors->has('generalRecommendation'))
        <div class="text-red-600 mt-2 mb-2">
            {{ $errors->first('generalRecommendation') }}
        </div>
    @endif
</div>

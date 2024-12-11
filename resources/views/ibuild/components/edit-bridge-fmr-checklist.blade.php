<div>
    <input type="text" name="subprojectId" value="{{ $subproject->id }}" hidden>
    <input type="text" name="projectType" value="{{ $subproject->projectType }}" hidden>

    <div class="flex items-center space-x-4 mb-6">
        <label for="bridgeFmrReviewDate" class="dark:text-green-600 text-black text-sm md:text-base">Date of Review <span
                class="text-red-500">*</span></label>
        <input type="date" name="bridgeFmrReviewDate" id="bridgeFmrReviewDate" value="{{ old('bridgeFmrReviewDate') }}"
            class="dark:bg-gray-900 rounded-md dark:[color-scheme:dark]">
        @if ($errors->has('bridgeFmrReviewDate'))
        <div class="text-red-600 mt-2 mb-2">
            {{ $errors->first('bridgeFmrReviewDate') }}
        </div>
        @endif
    </div>

    <label for="connectedAllWeatherLabel" class="dark:text-green-600 text-black text-sm md:text-base">Connected
        to an
        All-Weather Road? <span class="text-red-500">*</span></label>
    <div class="flex items-center gap-2">
        @foreach (['Yes', 'No'] as $option)
        <div class="flex items-center gap-2">
            <input class="dark:bg-gray-800" type="radio"
                {{ isset($subproject->connectedAllWeather) && $subproject->connectedAllWeather === $option ? 'checked' : '' }}
                disabled>
            <input type="hidden" name="connectedAllWeather" class="dark:bg-gray-800"
                value="{{ $subproject->connectedAllWeather }}">
            <label for="vca{{ $option }}">{{ $option }}</label>
        </div>
        @endforeach
        @if ($errors->has('connectedAllWeather'))
        <div class="text-red-600 mt-2 mb-2">
            {{ $errors->first('connectedAllWeather') }}
        </div>
        @endif
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mt-3 mb-4">

        <div>
            <label for="accessibility" class="dark:text-green-600 text-sm md:text-base">Accesibility</label>
            <input
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                type="text" value="{{ old('accessibility', $subproject->fmrAccessibility) }}" name="accessibility" id="accessibility">
        </div>

        <div>
            <label for="maximumFloodLevel" class="dark:text-green-600 text-sm md:text-base">Maximum flood level for the
                past 20 years</label>
            <input
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                type="text" value="{{ old('maximumFloodLevel', $subproject->fmrMaximumFloodLevel) }}" name="maximumFloodLevel" id="maximumFloodLevel">
        </div>

        <div>
            <label for="existingRow" class="dark:text-green-600 text-sm md:text-base">Existing ROW</label>
            <input
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                type="text" value="{{ old('existingRow', $subproject->existingRow) }}" name="existingRow" id="existingRow">
        </div>

        @if($subproject->fmrBridgeAccreditedDistance)
        <div x-data="{ showFileInput: false }" class="">
            <label for="fmrBridgeAccreditedDistanceInput" class="dark:text-green-600 text-sm md:text-base">Distance from accredited DPWH quarry
                site</label>
            <div class="flex items-center mt-1 rounded-md overflow-hidden">
                <button type="button"
                    @click="showFileInput = !showFileInput"
                    class="flex items-center justify-center px-3 py-2 bg-blue-400 dark:bg-sky-500 text-gray-700 dark:text-white text-sm font-medium hover:bg-blue-500 dark:hover:bg-sky-600 transition ease-in-out duration-150 h-full">
                    <img src="/images/pencil-square.svg" alt="Edit" width="22" height="22">
                </button>

                <input
                    id="fmrBridgeAccreditedDistanceInput"
                    type="file"
                    name="fmrBridgeAccreditedDistance"
                    x-show="showFileInput"
                    class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-md w-full"
                    style="display: none;">

                <a
                    x-show="!showFileInput"
                    class="flex items-center gap-2 border-l px-3 py-2 text-sm font-medium rounded-r-md text-white dark:text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 h-full"
                    href="{{ asset($subproject->fmrBridgeAccreditedDistance) }}"
                    target="_blank">
                    <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">
                    View File
                </a>
            </div>
            @if ($errors->has('fmrBridgeAccreditedDistance'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('fmrBridgeAccreditedDistance') }}
            </div>
            @endif
        </div>
        @else
        <div>
            <label for="fmrBridgeAccreditedDistance" class="dark:text-green-600 text-sm md:text-base">Distance from accredited DPWH quarry
                site</label>
            <input
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
                type="file" name="fmrBridgeAccreditedDistance" id="fmrBridgeAccreditedDistance">
            @if ($errors->has('fmrBridgeAccreditedDistance'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('fmrBridgeAccreditedDistance') }}
            </div>
            @endif
        </div>
        @endif

        @if($subproject->trafficCount)
        <div x-data="{ showFileInput: false }" class="">
            <label for="trafficCountInput" class="dark:text-green-600 text-sm md:text-base">Average daily traffic
                count</label>
            <div class="flex items-center mt-1 rounded-md overflow-hidden">
                <button type="button"
                    @click="showFileInput = !showFileInput"
                    class="flex items-center justify-center px-3 py-2 bg-blue-400 dark:bg-sky-500 text-gray-700 dark:text-white text-sm font-medium hover:bg-blue-500 dark:hover:bg-sky-600 transition ease-in-out duration-150 h-full">
                    <img src="/images/pencil-square.svg" alt="Edit" width="22" height="22">
                </button>

                <input
                    id="trafficCountInput"
                    type="file"
                    name="trafficCount"
                    x-show="showFileInput"
                    class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-md w-full"
                    style="display: none;">

                <a
                    x-show="!showFileInput"
                    class="flex items-center gap-2 border-l px-3 py-2 text-sm font-medium rounded-r-md text-white dark:text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 h-full"
                    href="{{ asset($subproject->trafficCount) }}"
                    target="_blank">
                    <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">
                    View File
                </a>
            </div>
            @if ($errors->has('trafficCount'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('trafficCount') }}
            </div>
            @endif
        </div>
        @else
        <div>
            <label for="trafficCount" class="dark:text-green-600 text-sm md:text-base">Average daily traffic
                count</label>
            <input
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
                type="file" name="trafficCount" id="trafficCount">
            @if ($errors->has('trafficCount'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('trafficCount') }}
            </div>
            @endif
        </div>
        @endif

        <div>
            <label for="roadCategory" class="dark:text-green-600 text-sm md:text-base">Road Category</label>
            <select name="roadCategory" id="roadCategory"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2">
                <option {{ old('roadCategory') ? '' : 'selected' }}>{{ $subproject->roadCategory }}</option>
                <option value="Barangay" {{ old('roadCategory') == 'Barangay' ? 'selected' : '' }}>
                    Barangay
                </option>
                <option value="Municipal" {{ old('roadCategory') == 'Municipal' ? 'selected' : '' }}>Municipal
                </option>
                <option value="Provincial" {{ old('roadCategory') == 'Provincial' ? 'selected' : '' }}>Provincial
                </option>
                <option value="National Road" {{ old('roadCategory') == 'National Road' ? 'selected' : '' }}>National
                    Road
                </option>
            </select>
        </div>
    </div>

    <div class="flex justify-end">
        <button type="submit"
            class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white dark:text-white bg-green-500 dark:bg-lime-500 hover:text-gray-200 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2">
            <img src="/images/check2-square.svg" alt="Save" width="22" height="22">
            Update Subproject
        </button>
    </div>
</div>
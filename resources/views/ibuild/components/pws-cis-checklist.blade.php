<div>
    <input type="text" name="subprojectId" value="{{ $subproject->id }}" hidden>

    <div class="flex items-center space-x-4 mb-6">
        <label for="reviewDate" class="dark:text-green-600 text-black">Date of Review <span
                class="text-red-500">*</span></label>
        <input type="date" name="reviewDate" id="reviewDate" value="{{ old('reviewDate') }}"
            class="dark:bg-gray-900 rounded-md dark:[color-scheme:dark]">
        @if ($errors->has('reviewDate'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('reviewDate') }}
            </div>
        @endif
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-3 mb-4">
        <div>
            <label for="waterSource" class="dark:text-green-600">Water Source</label>
            <select name="waterSource" id="waterSource"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2">
                <option value="" disabled selected>Select Water Source</option>
                <option value="Volume" {{ old('waterSource') == 'Volume' ? 'selected' : '' }}>
                    Volume
                </option>
                <option value="Recharge Rate" {{ old('waterSource') == 'Recharge Rate' ? 'selected' : '' }}>Recharge
                    Rate
                </option>
                <option value="Potability" {{ old('waterSource') == 'Potability' ? 'selected' : '' }}>Potability
                </option>
            </select>
        </div>

        <div>
            <label for="waterSourceElevation" class="dark:text-green-600">Water Source Elevation</label>
            <input
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                type="text" value="{{ old('waterSourceElevation') }}" name="waterSourceElevation"
                id="waterSourceElevation">
        </div>

        <div>
            <label for="serviceArea" class="dark:text-green-600">Service Area Topographic Data</label>
            <input
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                type="text" value="{{ old('serviceArea') }}" name="serviceArea" id="serviceArea">
        </div>

        <div>
            <label for="accreditedDistance" class="dark:text-green-600">Distance from accredited DPWH quarry
                site</label>
            <input
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
                type="file" name="accreditedDistance" id="accreditedDistance">
            @if ($errors->has('accreditedDistance'))
                <div class="text-red-600 mt-2 mb-2">
                    {{ $errors->first('accreditedDistance') }}
                </div>
            @endif
        </div>
    </div>

    <div class="flex justify-end">
        <button type="submit"
            class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white dark:text-white bg-green-500 dark:bg-lime-500 hover:text-gray-200 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2">
            <img src="/images/check2-square.svg" alt="Save" width="22" height="22">
            Validate Subproject
        </button>
    </div>
</div>

<div>
    <input type="text" name="subprojectId" value="{{ $subproject->id }}" hidden>
    <input type="text" name="projectType" value="{{ $subproject->projectType }}" hidden>

    <div class="flex items-center space-x-4 mb-6">
        <label for="vcriReviewDate" class="dark:text-green-600 text-black text-sm md:text-base">Date of Review <span
                class="text-red-500">*</span></label>
        <input type="date" name="vcriReviewDate" id="vcriReviewDate" value="{{ old('vcriReviewDate') }}"
            class="dark:bg-gray-900 rounded-md dark:[color-scheme:dark]">
        @if ($errors->has('vcriReviewDate'))
        <div class="text-red-600 mt-2 mb-2">
            {{ $errors->first('vcriReviewDate') }}
        </div>
        @endif
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-3 mb-4">

        <div>
            <label for="accessibility" class="dark:text-green-600 text-sm md:text-base">Accesibility</label>
            <input
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                type="text" value="{{ old('accessibility') }}" name="accessibility" id="accessibility">
        </div>

        <div>
            <label for="lotDescription" class="dark:text-green-600 text-sm md:text-base">Lot Description</label>
            <input
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                type="text" value="{{ old('lotDescription') }}" name="lotDescription" id="lotDescription">
        </div>

        <div>
            <label for="maximumFloodLevel" class="dark:text-green-600 text-sm md:text-base">Maximum flood level for the
                past 20 years</label>
            <input
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                type="text" value="{{ old('maximumFloodLevel') }}" name="maximumFloodLevel" id="maximumFloodLevel">
        </div>

        <div>
            <label for="vcriAccreditedDistance" class="dark:text-green-600 text-sm md:text-base">Distance from accredited DPWH quarry
                site</label>
            <input
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
                type="file" name="vcriAccreditedDistance" id="vcriAccreditedDistance">
            @if ($errors->has('vcriAccreditedDistance'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('vcriAccreditedDistance') }}
            </div>
            @endif
        </div>

        <div>
            <label for="status" class="dark:text-green-600 text-sm md:text-base">Status</label>
            <select name="status" id="status" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-1/4 mt-1 py-1 px-2">
                <option value="" disabled selected></option>
                <option value="OK" {{ old('status') == 'OK' ? 'selected' : '' }}>OK</option>
                <option value="Failed" {{ old('status') == 'Failed' ? 'selected' : '' }}>Failed</option>
                <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
            </select>
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
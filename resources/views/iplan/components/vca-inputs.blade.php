<div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2">
    <div>
        <label for="valueChainSegment" class="dark:text-green-600 text-sm md:text-base">Value Chain Segment <span
                class="text-red-500">*</span></label>
        <input
            class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
            type="text" value="{{ old('valueChainSegment') }}" x-ref="valueChainSegment" name="valueChainSegment"
            id="valueChainSegment" :required="linkedVca.includes('Yes')">
    </div>
    <div>
        <label for="opportunity" class="dark:text-green-600 text-sm md:text-base">Opportunity or Constraint Being Addressed <span
                class="text-red-500">*</span></label>
        <input
            class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
            type="text" value="{{ old('opportunity') }}" x-ref="opportunity" name="opportunity" id="opportunity"
            :required="linkedVca.includes('Yes')">
    </div>
    <div>
        <label for="specificIntervention" class="dark:text-green-600 text-sm md:text-base">Specific Intervention <span
                class="text-red-500">*</span></label>
        <input
            class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
            type="text" value="{{ old('specificIntervention') }}" x-ref="specificIntervention"
            name="specificIntervention" id="specificIntervention" :required="linkedVca.includes('Yes')">
    </div>
    <div class="flex flex-wrap items-center gap-4 mt-2">
        <div class="flex flex-col md:flex-row items-center gap-2">
            <label for="pageMatrixVca" class="dark:text-green-600 text-sm md:text-base">
                Page of VCA <span class="text-red-500">*</span>
            </label>
            <input
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full md:w-48 mt-1 md:mt-0 py-1 px-2"
                type="file" name="pageMatrixVca" id="pageMatrixVca" :required="linkedVca.includes('Yes')">
        </div>
        @if ($errors->has('pageMatrixVca'))
        <div class="text-red-600 mt-2 mb-2">
            {{ $errors->first('pageMatrixVca') }}
        </div>
        @endif

        <div class="flex flex-col md:flex-row items-center gap-2">
            <label for="pageVca" class="dark:text-green-600 text-sm md:text-base">
                Page <span class="dark:text-red-500">*</span>
            </label>
            <input
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full md:w-32 mt-1 md:mt-0 py-1 px-2"
                value="{{ old('pageVca') }}" x-ref="pageVca" type="text" name="pageVca"
                id="pageVca" :required="linkedVca.includes('Yes')" step="1" min="0"
                inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
        </div>
        @if ($errors->has('pageVca'))
        <div class="text-red-600 mt-2 mb-2">
            {{ $errors->first('pageVca') }}
        </div>
        @endif
    </div>
</div>
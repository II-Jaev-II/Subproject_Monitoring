<div class="grid grid-cols-2 gap-2 mt-2">
    <div>
        <label for="valueChainSegment" class="dark:text-green-600">Value Chain Segment <span
                class="text-red-500">*</span></label>
        <input
            class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
            type="text" value="{{ old('valueChainSegment') }}" x-ref="valueChainSegment" name="valueChainSegment"
            id="valueChainSegment" :required="linkedVca.includes('Yes')">
    </div>
    <div>
        <label for="opportunity" class="dark:text-green-600">Opportunity or Constraint Being Addressed <span
                class="text-red-500">*</span></label>
        <input
            class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
            type="text" value="{{ old('opportunity') }}" x-ref="opportunity" name="opportunity" id="opportunity"
            :required="linkedVca.includes('Yes')">
    </div>
    <div>
        <label for="specificIntervention" class="dark:text-green-600">Specific Intervention <span
                class="text-red-500">*</span></label>
        <input
            class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
            type="text" value="{{ old('specificIntervention') }}" x-ref="specificIntervention"
            name="specificIntervention" id="specificIntervention" :required="linkedVca.includes('Yes')">
    </div>
    <div>
        <label for="pageMatrixVca" class="dark:text-green-600">Page of VCA <span class="text-red-500">*</span></label>
        <input
            class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
            type="file" name="pageMatrixVca" id="pageMatrixVca" :required="linkedVca.includes('Yes')">
        @if ($errors->has('pageMatrixVca'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('pageMatrixVca') }}
            </div>
        @endif
    </div>
</div>

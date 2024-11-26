@if($sesChecklists && $sesChecklists->reviewDate)
<div class="flex items-center space-x-4 mb-2">
    <label for="reviewDate" class="dark:text-lime-500 text-sm md:text-lg">Date of Review</label>
    <input type="text" name="reviewDate" id="reviewDate" value="{{ $formattedReviewDateSes }}" class="dark:bg-gray-900 rounded-md dark:[color-scheme:dark]" readonly>
</div>
@endif

@if($sesChecklists->reason)
<div class="mb-6">
    <div class="flex items-start space-x-3">
        <label for="reason" class="dark:text-green-600 text-xs md:text-lg leading-tight flex-1">
            This subproject is deemed ineligible because of the following reasons.
        </label>
    </div>
    <div class="mt-2 mb-2">
        <textarea class="block border dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 rounded-md w-full mt-1 p-2" rows="6" readonly>{{ $sesChecklists->reason }}</textarea>
    </div>
</div>
@endif

@if($sesChecklists->requirementCompliance)
<div class="mb-6">
    <div class="flex items-start space-x-3">
        <label for="requirements" class="dark:text-green-600 text-xs md:text-lg leading-tight flex-1">
            This subproject is not yet cleared of safeguards requirements pending compliance of the following.
        </label>
    </div>
    <div class="mt-2 mb-2">
        <textarea class="block border dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 rounded-md w-full mt-1 p-2" rows="6" readonly>{{ $sesChecklists->requirementCompliance }}</textarea>
    </div>
</div>
@endif

@if($sesRequirements->isNotEmpty())
<div class="mb-6">
    <div class="flex items-start space-x-3">
        <label for="requirementsTable" class="dark:text-green-600 text-xs md:text-lg leading-tight flex-1">
            This subproject is given conditional clearance and may proceed to implementation subject to the compliance of the following requirements on or before the specified deadlines.
        </label>
    </div>
    <div class="mt-2 mb-6">
        @include('ses.components.requirements-table')
    </div>
</div>
@endif

@if($sesChecklists->cleared)
<div class="mb-6">
    <div class="flex items-start space-x-3">
        <label for="cleared" class="dark:text-green-600 text-xs md:text-lg leading-tight flex-1">
            This subproject is cleared of safeguards requirements and may proceed with subproject preparation.
        </label>
    </div>
    <div class="mt-2 mb-2">
        <textarea class="block border dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 rounded-md w-full mt-1 p-2" rows="6" readonly>{{ $sesChecklists->cleared }}</textarea>
    </div>
</div>
@endif

<div class="mb-6">
    <label for="socialAssesment" class="dark:text-green-600 text-xs md:text-lg leading-tight flex-1">
        Social Assesment
    </label>
    <div class="mt-2 mb-2">
        <textarea class="block border dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 rounded-md w-full mt-1 p-2" rows="6" readonly>{{ $sesChecklists->socialAssesment }}</textarea>
    </div>
</div>

<div class="mb-6">
    <label for="environmentalAssesment" class="dark:text-green-600 text-xs md:text-lg leading-tight flex-1">
        Environmental Assesment
    </label>
    <div class="mt-2 mb-2">
        <textarea class="block border dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 rounded-md w-full mt-1 p-2" rows="6" readonly>{{ $sesChecklists->environmentalAssesment }}</textarea>
    </div>
</div>
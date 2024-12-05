<div class="flex items-center space-x-4 mb-2">
    <label for="reviewDate" class="dark:text-lime-500 text-sm md:text-base">Date of Review</label>
    <input type="text" name="reviewDate" id="reviewDate" value="{{ $formattedReviewDateEcon }}" class="dark:bg-gray-900 rounded-md dark:[color-scheme:dark]" readonly>
</div>

<div class="flex items-center space-x-4 mb-2">
    <label for="econReport" class="dark:text-green-600 text-xs md:text-base">Report</label>
    <a class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2 w-fit mt-1"
        href="{{ asset($econChecklists->econReport) }}" target="_blank">
        <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">View File</a>
</div>

<div class="mb-2">
    <label for="summary" class="dark:text-green-600 text-sm md:text-base">Summary</label>
    <textarea
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
        rows="4" readonly>{{ $econChecklists->summary }}</textarea>
</div>

<div class="mb-2">
    <label for="status" class="dark:text-green-600 text-sm md:text-base">Status</label>
    <input
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-1/4 mt-1"
        rows="4" value="{{ $econChecklists->status }}" readonly></input>
</div>
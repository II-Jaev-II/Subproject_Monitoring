@if($gguChecklists && $gguChecklists->reviewDate)
<div class="flex items-center space-x-4 mb-2">
    <label for="reviewDate" class="dark:text-lime-500 text-sm md:text-base">Date of Review</label>
    <input type="text" name="reviewDate" id="reviewDate" value="{{ $formattedReviewDateGgu }}" class="dark:bg-gray-900 rounded-md dark:[color-scheme:dark]" readonly>
</div>
@endif

<div class="flex items-center space-x-4 mb-2">
    <label for="kmzFile" class="dark:text-green-600 text-xs md:text-base">KMZ File</label>
    <a class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2 w-fit mt-1"
        href="{{ asset($gguChecklists->kmzFile) }}" id="kmzFileLink" target="_blank">
        <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">Download File</a>
</div>

<div x-show="selectedComponent === 'GGU'" id="map" style="width: 100%; height: 500px; border: 1px solid #ccc;" class="mb-4"></div>

<label for="reviewDate" class="dark:text-green-600 text-xs md:text-base">Report</label>
<div class="flex items-center justify-center mb-4">
    <object class="border-2 border-lime-500 rounded-md" data="{{ asset($gguReport) }}" type="application/pdf" width="1200" height="800">
        <p>Your browser does not support PDFs. <a href="{{ asset($gguReport) }}">Download the PDF</a>.</p>
    </object>
</div>

<div class="mb-2">
    <label for="remarks" class="dark:text-green-600 text-xs md:text-base">Remarks</label>
    <textarea
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
        rows="4" readonly>{{ $gguChecklists->remarks }}</textarea>
</div>
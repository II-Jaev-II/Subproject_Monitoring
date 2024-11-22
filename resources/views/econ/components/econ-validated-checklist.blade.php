<div class="flex items-center space-x-4 mb-2">
    <label for="reviewDate" class="dark:text-lime-500">Date of Review</label>
    <input type="text" name="reviewDate" id="reviewDate" value="{{ $formattedReviewDateEcon }}" class="dark:bg-gray-900 rounded-md dark:[color-scheme:dark]" readonly>
</div>

<div class="mb-2">
    <label for="summary" class="dark:text-lime-500">Summary</label>
    <textarea
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
        rows="4" readonly>{{ $econChecklists->summary }}</textarea>
</div>
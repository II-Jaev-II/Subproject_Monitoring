@if ($subprojectType === 'Bridge' || $subprojectType === 'FMR')
<div>
    <div class="flex items-center space-x-4 mb-2">
        <label for="reviewDate" class="dark:text-green-600">Date of Review</label>
        <input type="text" value="{{ $formattedReviewDateIBuildFmrBridge }}" class="dark:bg-gray-900 rounded-md dark:[color-scheme:dark]" readonly>
    </div>

    <label for="connectedAllWeatherLabel" class="dark:text-green-600 text-black text-lg">Connected
        to an
        All-Weather Road?</label>
    <div class="flex items-center gap-2">
        <div class="flex items-center gap-2">
            <input class="dark:bg-gray-800" type="radio" {{ isset($fmrBridgeChecklists->connectedAllWeather) && $fmrBridgeChecklists->connectedAllWeather === 'Yes' ? 'checked' : '' }}
                disabled>
            <label for="connectedAllWeatherYes">Yes</label>
        </div>
        <div class="flex items-center gap-2">
            <input class="dark:bg-gray-800" type="radio" {{ isset($fmrBridgeChecklists->connectedAllWeather) && $fmrBridgeChecklists->connectedAllWeather === 'No' ? 'checked' : '' }}
                disabled>
            <label for="connectedAllWeatherNo">No</label>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mt-3 mb-4">

        @if($fmrBridgeChecklists->accessibility)
        <div>
            <label for="accessibility" class="dark:text-green-600">Accesibility</label>
            <input
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                type="text" value="{{ $fmrBridgeChecklists->accessibility }}" readonly>
        </div>
        @else
        <div>
            <label for="accessibility" class="dark:text-green-600">Accesibility</label>
            <div
                class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                    <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                </svg>
                Pending
                <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                </span>
            </div>
        </div>
        @endif

        @if($fmrBridgeChecklists->maximumFloodLevel)
        <div>
            <label for="maximumFloodLevel" class="dark:text-green-600">Maximum flood level for the
                past 20 years</label>
            <input
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                type="text" value="{{ $fmrBridgeChecklists->maximumFloodLevel }}" readonly>
        </div>
        @else
        <div>
            <label for="maximumFloodLevel" class="dark:text-green-600">Maximum flood level for the past 20 years</label>
            <div
                class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                    <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                </svg>
                Pending
                <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                </span>
            </div>
        </div>
        @endif

        @if($fmrBridgeChecklists->existingRow)
        <div>
            <label for="existingRow" class="dark:text-green-600">Existing ROW</label>
            <input
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                type="text" value="{{ $fmrBridgeChecklists->existingRow }}" readonly>
        </div>
        @else
        <div>
            <label for="existingRow" class="dark:text-green-600">Existing Row</label>
            <div
                class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                    <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                </svg>
                Pending
                <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                </span>
            </div>
        </div>
        @endif

        @if($fmrBridgeChecklists->fmrBridgeAccreditedDistance)
        <div>
            <label for="fmrBridgeAccreditedDistance" class="dark:text-green-600">Distance from accredited DPWH quarry
                site</label>
            <a class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2 w-fit mt-1"
                href="{{ asset($fmrBridgeChecklists->fmrBridgeAccreditedDistance) }}" target="_blank">
                <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">View File</a>
        </div>
        @else
        <div>
            <label for="fmrBridgeAccreditedDistance" class="dark:text-green-600">Distance from accredited DPWN quarry site</label>
            <div
                class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                    <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                </svg>
                Pending File
                <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                </span>
            </div>
        </div>
        @endif

        @if($fmrBridgeChecklists->trafficCount)
        <div>
            <label for="trafficCount" class="dark:text-green-600">Average daily traffic
                count</label>
            <a class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2 w-fit mt-1"
                href="{{ asset($fmrBridgeChecklists->trafficCount) }}" target="_blank">
                <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">View File</a>
        </div>
        @else
        <div>
            <label for="trafficCount" class="dark:text-green-600">Average daily traffic count</label>
            <div
                class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                    <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                </svg>
                Pending File
                <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                </span>
            </div>
        </div>
        @endif

        @if($fmrBridgeChecklists->roadCategory)
        <div>
            <label for="roadCategory" class="dark:text-green-600">Road Category</label>
            <input
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                type="text" value="{{ $fmrBridgeChecklists->roadCategory }}" readonly>
        </div>
        @else
        <div>
            <label for="roadCategory" class="dark:text-green-600">Road Category</label>
            <div
                class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                    <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                </svg>
                Pending
                <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                </span>
            </div>
        </div>
        @endif
    </div>
    <div>
        @elseif ($subprojectType === 'VCRI')
        <div>
            <div class="flex items-center space-x-4 mb-2">
                <label for="reviewDate" class="dark:text-green-600">Date of Review</label>
                <input type="text" value="{{ $formattedReviewDateIBuildVcri }}" class="dark:bg-gray-900 rounded-md dark:[color-scheme:dark]" readonly>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-3 mb-4">

                @if($vcriChecklists->accessibility)
                <div>
                    <label for="accessibility" class="dark:text-green-600">Accesibility</label>
                    <input
                        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                        type="text" value="{{ $vcriChecklists->accessibility }}" readonly>
                </div>
                @else
                <div>
                    <label for="accessibility" class="dark:text-green-600">Accesibility</label>
                    <div
                        class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                            <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                        </svg>
                        Pending
                        <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                        </span>
                    </div>
                </div>
                @endif

                @if($vcriChecklists->lotDescription)
                <div>
                    <label for="lotDescription" class="dark:text-green-600">Lot Description</label>
                    <input
                        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                        type="text" value="{{ $vcriChecklists->lotDescription }}" readonly>
                </div>
                @else
                <div>
                    <label for="lotDescription" class="dark:text-green-600">Lot Description</label>
                    <div
                        class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                            <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                        </svg>
                        Pending
                        <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                        </span>
                    </div>
                </div>
                @endif

                @if($vcriChecklists->maximumFloodLevel)
                <div>
                    <label for="maximumFloodLevel" class="dark:text-green-600">Maximum flood level for the
                        past 20 years</label>
                    <input
                        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                        type="text" value="{{ $vcriChecklists->maximumFloodLevel }}" readonly>
                </div>
                @else
                <div>
                    <label for="maximumFloodLevel" class="dark:text-green-600">Maximum flood level for the past 20 years</label>
                    <div
                        class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                            <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                        </svg>
                        Pending
                        <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                        </span>
                    </div>
                </div>
                @endif

                @if($vcriChecklists->vcriAccreditedDistance)
                <div>
                    <label for="vcriAccreditedDistance" class="dark:text-green-600">Distance from accredited DPWH quarry
                        site</label>
                    <a class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2 w-fit mt-1"
                        href="{{ asset($vcriChecklists->vcriAccreditedDistance) }}" target="_blank">
                        <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">View File</a>
                </div>
                @else
                <div>
                    <label for="vcriAccreditedDistance" class="dark:text-green-600">Distance from the accredited DPWH quarry site</label>
                    <div
                        class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                            <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                        </svg>
                        Pending File
                        <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                        </span>
                    </div>
                </div>
                @endif
            </div>
        </div>
        @elseif ($subprojectType === 'PWS' || $subprojectType === 'CIS')
        <div>
            <div class="flex items-center space-x-4 mb-2">
                <label for="reviewDate" class="dark:text-green-600">Date of Review</label>
                <input type="text" value="{{ $formattedReviewDateIBuildPwsCis }}" class="dark:bg-gray-900 rounded-md dark:[color-scheme:dark]" readonly>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-3 mb-4">
                @if($pwsCisChecklists->waterSource)
                <div>
                    <label for="waterSource" class="dark:text-green-600">Water Source</label>
                    <input
                        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                        type="text" value="{{ $pwsCisChecklists->waterSource }}" readonly>
                </div>
                @else
                <div>
                    <label for="waterSource" class="dark:text-green-600">Water Source</label>
                    <div
                        class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                            <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                        </svg>
                        Pending
                        <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                        </span>
                    </div>
                </div>
                @endif

                @if($pwsCisChecklists->waterSourceElevation)
                <div>
                    <label for="waterSourceElevation" class="dark:text-green-600">Water Source Elevation</label>
                    <input
                        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                        type="text" value="{{ $pwsCisChecklists->waterSourceElevation }}" readonly>
                </div>
                @else
                <div>
                    <label for="waterSourceElevation" class="dark:text-green-600">Water Source Elevation</label>
                    <div
                        class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                            <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                        </svg>
                        Pending
                        <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                        </span>
                    </div>
                </div>
                @endif

                @if($pwsCisChecklists->serviceArea)
                <div>
                    <label for="serviceArea" class="dark:text-green-600">Service Area Topographic Data</label>
                    <input
                        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                        type="text" value="{{ $pwsCisChecklists->serviceArea }}" readonly>
                </div>
                @else
                <div>
                    <label for="serviceArea" class="dark:text-green-600">Service Area Topographic Data</label>
                    <div
                        class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                            <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                        </svg>
                        Pending
                        <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                        </span>
                    </div>
                </div>
                @endif

                @if($pwsCisChecklists->pwsCisAccreditedDistance)
                <div>
                    <label for="pwsCisAccreditedDistance" class="dark:text-green-600">Distance from accredited DPWH quarry
                        site</label>
                    <a class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2 w-fit mt-1"
                        href="{{ asset($pwsCisChecklists->pwsCisAccreditedDistance) }}" target="_blank">
                        <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">View File</a>
                </div>
                @else
                <div>
                    <label for="waterSource" class="dark:text-green-600">Water Source</label>
                    <div
                        class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2 mt-2 w-fit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                            <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                        </svg>
                        Pending File
                        <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                        </span>
                    </div>
                </div>
                @endif
            </div>
        </div>
        @endif
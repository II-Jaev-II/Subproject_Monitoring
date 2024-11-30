<div x-data="{
    hasLetterFile: {{ $subprojects->letterOfInterest ? 'true' : 'false' }},
    hasRequestFile: {{ $subprojects->letterOfRequest ? 'true' : 'false' }},
    hasEndorsementFile: {{ $subprojects->letterOfEndorsement ? 'true' : 'false' }},
    originalData: {
        indicativeCost: '{{ number_format($subprojects->indicativeCost, 2) }}',
    }
}">
    <div class="flex justify-between items-center">
        <h1 class="dark:text-lime-500 text-xl mt-4 mb-4">Subproject Profile</h1>
    </div>
    <hr class="border-2 border-green-500 dark:border-lime-500 mb-2">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
        <div>
            <label for="projectName" class="dark:text-green-600">Project Name</label>
            <input type="text"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                value="{{ $subprojects->projectName }}" readonly>
        </div>
        <div>
            <label for="projectType" class="dark:text-green-600">Project Type</label>
            <input type="text"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                value="{{ $subprojects->projectType }}" readonly>
        </div>
        <div>
            <label for="projectCategory" class="dark:text-green-600">Project Category</label>
            <input type="text"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                value="{{ $subprojects->projectCategory }}" readonly>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-3 mb-4">
        <div>
            <label for="fundSource" class="dark:text-green-600">Fund Source</label>
            <input type="text"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                value="{{ $subprojects->fundSource }}" readonly>
        </div>
        <div>
            <label for="indicativeCost" class="dark:text-green-600">Indicative Cost</label>
            <input type="text"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                value="{{ number_format($subprojects->indicativeCost, 2) }}" readonly>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mt-3 mb-4">
        <!-- Section Template -->
        <template
            x-for="file in [
{ label: 'Letter of Interest', id: 'letterOfInterest', hasFile: hasLetterFile, link: '{{ asset($subprojects->letterOfInterest) }}' },
{ label: 'Letter of Request', id: 'letterOfRequest', hasFile: hasRequestFile, link: '{{ asset($subprojects->letterOfRequest) }}' },
{ label: 'Letter of Endorsement', id: 'letterOfEndorsement', hasFile: hasEndorsementFile, link: '{{ asset($subprojects->letterOfEndorsement) }}' }
]"
            :key="file.id">
            <div class="flex flex-col items-start">
                <label :for="file.id" class="dark:text-green-600 text-sm md:text-base"
                    x-text="file.label"></label>
                <div class="flex items-center gap-4 mt-2">
                    <!-- Pending File Message -->
                    <div x-show="!file.hasFile"
                        class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                            <path
                                d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                        </svg>
                        Pending File
                        <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                        </span>
                    </div>

                    <!-- File View Link -->
                    <a x-show="file.hasFile" :href="file.link" target="_blank"
                        class="flex items-center gap-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 px-3 py-2">
                        <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">
                        View File
                    </a>
                </div>
            </div>
        </template>
    </div>

    <div class="flex justify-between items-center mb-4">
        <h1 class="dark:text-lime-500 text-xl">Proponent & Location</h1>
    </div>
    <hr class="border-2 border-green-500 dark:border-lime-500 mb-2">

    <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
        <div>
            <label for="proponent" class="dark:text-green-600">Proponent</label>
            <input type="text"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                value="{{ $subprojects->proponent }}" readonly>
        </div>
        <div>
            <label for="cluster" class="dark:text-green-600">Cluster</label>
            <input type="text"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                value="{{ $subprojects->cluster }}" readonly>
        </div>
        <div>
            <label for="region" class="dark:text-green-600">Region</label>
            <input type="text"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                value="{{ $subprojects->region }}" readonly>
        </div>
        <div>
            <label for="province" class="dark:text-green-600">Province</label>
            <input type="text"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                value="{{ $address->province_name }}" readonly>
        </div>
        <div>
            <label for="municipality" class="dark:text-green-600">Municipality</label>
            <input type="text"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                value="{{ $address->municipality_name }}" readonly>
        </div>
        <div>
            <label for="barangay" class="dark:text-green-600">Barangay</label>
            <input type="text"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                value="{{ $address->barangay_name }}" readonly>
        </div>
    </div>
</div>

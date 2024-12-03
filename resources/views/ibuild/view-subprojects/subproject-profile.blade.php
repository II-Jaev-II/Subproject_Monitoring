<div x-data="{
    isEditing: false,
    hasLetterFile: {{ $subprojects->letterOfInterest ? 'true' : 'false' }},
    hasRequestFile: {{ $subprojects->letterOfRequest ? 'true' : 'false' }},
    hasEndorsementFile: {{ $subprojects->letterOfEndorsement ? 'true' : 'false' }},
    originalData: {
        indicativeCost: '{{ number_format($subprojects->indicativeCost, 2) }}',
    },
    enableEdit() {
        this.isEditing = true;
    },
    cancelEdit() {
        this.isEditing = false;
        // Revert fields to original values
        $refs.indicativeCost.value = this.originalData.indicativeCost;
    },
    saveChanges() {
        this.isEditing = false;
        $refs.form.submit(); // Submit the form
    }
}">

    @if ($errors->any())
    <div class="text-red-500">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session()->has('updated'))
    <div class="bg-green-500 text-white dark:bg-green-900 rounded-md px-3 py-2 mb-2 w-full">
        {{ session('updated') }}
    </div>
    @endif
    <div class="flex justify-between items-center">
        <h1 class="dark:text-lime-500 text-xl mt-4 mb-4">Subproject Profile</h1>
        <!-- Buttons -->
        <div class="flex justify-end">
            <button
                x-show="!isEditing"
                @click="enableEdit"
                class="flex items-center justify-center gap-2 text-white text-center bg-blue-500 hover:bg-blue-700 font-medium rounded-md px-2 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                </svg>
                <span>Edit</span>
            </button>
            <div style="display: none !important;" x-cloak x-show="isEditing" class="flex space-x-2">
                <button
                    @click="saveChanges"
                    class="flex items-center justify-center gap-2 text-white bg-lime-500 hover:bg-lime-700 font-medium rounded-md px-2 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy2-fill" viewBox="0 0 16 16">
                        <path d="M12 2h-2v3h2z" />
                        <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v13A1.5 1.5 0 0 0 1.5 16h13a1.5 1.5 0 0 0 1.5-1.5V2.914a1.5 1.5 0 0 0-.44-1.06L14.147.439A1.5 1.5 0 0 0 13.086 0zM4 6a1 1 0 0 1-1-1V1h10v4a1 1 0 0 1-1 1zM3 9h10a1 1 0 0 1 1 1v5H2v-5a1 1 0 0 1 1-1" />
                    </svg>
                    <span>Save</span>
                </button>
                <button
                    @click="cancelEdit"
                    class="flex items-center justify-center gap-2 text-white bg-red-500 hover:bg-red-700 font-medium rounded-md px-2 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                    </svg>
                    <span>Cancel</span>
                </button>
            </div>
        </div>
    </div>
    <hr class="border-2 border-green-500 dark:border-lime-500 mb-2">

    <form x-ref="form" action="{{ route('ibuild.update-subproject-profile', $subprojects->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="subprojectId" value="{{ $subprojects->id }}" hidden>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
            <div>
                <label for="projectName" class="dark:text-green-600 text-sm md:text-base">Project Name</label>
                <input type="text" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                    value="{{ $subprojects->projectName }}" readonly>
            </div>
            <div>
                <label for="projectType" class="dark:text-green-600 text-sm md:text-base">Project Type</label>
                <input type="text" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                    value="{{ $subprojects->projectType }}" readonly>
            </div>
            <div>
                <label for="projectCategory" class="dark:text-green-600 text-sm md:text-base">Project Category</label>
                <input type="text" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                    value="{{ $subprojects->projectCategory }}" readonly>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-3 mb-4">
            <div>
                <label for="fundSource" class="dark:text-green-600 text-sm md:text-base">Fund Source</label>
                <input type="text" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                    value="{{ $subprojects->fundSource }}" readonly>
            </div>
            <div>
                <div x-data="{
            number: '{{ number_format($subprojects->indicativeCost, 2) }}', // Initialize with backend value
            formatNumber() {
                // Remove commas to get raw number
                let cleanedValue = this.number.replace(/,/g, '');
                if (!isNaN(cleanedValue) && cleanedValue !== '') {
                    const [integerPart, decimalPart] = cleanedValue.split('.');
                    // Format integer part with commas
                    this.number = Number(integerPart).toLocaleString('en-US') +
                        (decimalPart !== undefined ? '.' + decimalPart.slice(0, 2) : '');
                } else {
                    this.number = ''; // Handle invalid input
                }
            }
        }"
                    x-init="formatNumber()"> <!-- Format the number on initialization -->
                    <label for="indicativeCost" class="dark:text-green-600 text-sm md:text-base">Indicative Cost</label>
                    <input type="text" name="indicativeCost" id="indicativeCost" :readonly="!isEditing"
                        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                        x-model="number"
                        @input="formatNumber"
                        @focus="number = number.replace(/,/g, '')"
                        @blur="formatNumber()">
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mt-3 mb-4">
            <!-- Section Template -->
            <template x-for="file in [
        { label: 'Letter of Interest', id: 'letterOfInterest', hasFile: hasLetterFile, link: '{{ asset($subprojects->letterOfInterest) }}' },
        { label: 'Letter of Request', id: 'letterOfRequest', hasFile: hasRequestFile, link: '{{ asset($subprojects->letterOfRequest) }}' },
        { label: 'Letter of Endorsement', id: 'letterOfEndorsement', hasFile: hasEndorsementFile, link: '{{ asset($subprojects->letterOfEndorsement) }}' }
    ]" :key="file.id">
                <div class="flex flex-col items-start">
                    <label :for="file.id" class="dark:text-green-600 text-sm md:text-base" x-text="file.label"></label>
                    <div class="flex items-center gap-4 mt-2">
                        <!-- Pending File Message -->
                        <div x-show="!file.hasFile && !isEditing"
                            class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 px-2 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                                <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
                            </svg>
                            Pending File
                            <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                            </span>
                        </div>

                        <!-- File Input -->
                        <div x-data="{ showFileInput: false }">
                            <div class="flex items-center mt-1 rounded-md overflow-hidden">
                                <button x-show="isEditing" x-cloak style="display: none !important;" type="button"
                                    @click="showFileInput = !showFileInput"
                                    class="flex items-center justify-center px-3 py-2 bg-blue-400 dark:bg-sky-500 text-gray-700 dark:text-white text-sm font-medium hover:bg-blue-500 dark:hover:bg-sky-600 transition ease-in-out duration-150 h-full">
                                    <img src="/images/pencil-square.svg" alt="Edit" width="22" height="22">
                                </button>

                                <input
                                    :id="file.id"
                                    type="file"
                                    :name="file.id"
                                    x-show="showFileInput && isEditing"
                                    class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-md w-full"
                                    style="display: none;">

                                <a
                                    x-show="!showFileInput && isEditing && file.hasFile" :href="file.link" target="_blank"
                                    class="flex items-center gap-2 border-l px-3 py-2 text-sm font-medium rounded-r-md text-white dark:text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 h-full">
                                    <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">
                                    View File
                                </a>
                            </div>
                        </div>

                        <!-- File View Link -->
                        <a x-show="!isEditing && file.hasFile" :href="file.link" target="_blank"
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
                <label for="proponent" class="dark:text-green-600 text-sm md:text-base">Proponent</label>
                <input type="text" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                    value="{{ $subprojects->proponent }}" readonly>
            </div>
            <div>
                <label for="cluster" class="dark:text-green-600 text-sm md:text-base">Cluster</label>
                <input type="text" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                    value="{{ $subprojects->cluster }}" readonly>
            </div>
            <div>
                <label for="region" class="dark:text-green-600 text-sm md:text-base">Region</label>
                <input type="text" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                    value="{{ $subprojects->region }}" readonly>
            </div>
            <div>
                <label for="province" class="dark:text-green-600 text-sm md:text-base">Province</label>
                <input type="text" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                    value="{{ $address->province_name }}" readonly>
            </div>
            <div>
                <label for="municipality" class="dark:text-green-600 text-sm md:text-base">Municipality</label>
                <input type="text" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                    value="{{ $address->municipality_name }}" readonly>
            </div>
            <div>
                <label for="barangay" class="dark:text-green-600 text-sm md:text-base">Barangay</label>
                <input type="text" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                    value="{{ $address->barangay_name }}" readonly>
            </div>
        </div>
    </form>
</div>
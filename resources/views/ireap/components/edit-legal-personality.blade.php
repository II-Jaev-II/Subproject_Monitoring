@if ($iReapChecklist->authenticatedCopy)
    <div x-data="{ showFileInput: false }" class="mt-2">
        <label for="authenticatedCopyInput" class="dark:text-green-600 text-sm md:text-base">Authenticated copy of latest
            Articles of Incorporation/Articles of Cooperation</label>
        <div class="flex items-center mt-1 rounded-md overflow-hidden">
            <button type="button" @click="showFileInput = !showFileInput"
                class="flex items-center justify-center px-3 py-2 bg-blue-400 dark:bg-sky-500 text-gray-700 dark:text-white text-sm font-medium hover:bg-blue-500 dark:hover:bg-sky-600 transition ease-in-out duration-150 h-full">
                <img src="/images/pencil-square.svg" alt="Edit" width="22" height="22">
            </button>

            <input id="authenticatedCopyInput" type="file" name="authenticatedCopy" x-show="showFileInput"
                class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-md w-full" style="display: none;">

            <a x-show="!showFileInput"
                class="flex items-center gap-2 border-l px-3 py-2 text-sm font-medium rounded-r-md text-white dark:text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 h-full"
                href="{{ asset($iReapChecklist->authenticatedCopy) }}" target="_blank">
                <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">
                View File
            </a>
        </div>
        @if ($errors->has('authenticatedCopy'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('authenticatedCopy') }}
            </div>
        @endif
    </div>
@else
    <div class="mt-2">
        <label for="authenticatedCopy" class="dark:text-green-600 text-sm md:text-base">Authenticated copy of latest
            Articles of Incorporation/Articles of Cooperation</label>
        <input
            class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
            type="file" name="authenticatedCopy" id="authenticatedCopy">
        @if ($errors->has('authenticatedCopy'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('authenticatedCopy') }}
            </div>
        @endif
    </div>
@endif

@if ($iReapChecklist->byLaws)
    <div x-data="{ showFileInput: false }" class="mt-2">
        <label for="byLawsInput" class="dark:text-green-600 text-sm md:text-base">By Laws</label>
        <div class="flex items-center mt-1 rounded-md overflow-hidden">
            <button type="button" @click="showFileInput = !showFileInput"
                class="flex items-center justify-center px-3 py-2 bg-blue-400 dark:bg-sky-500 text-gray-700 dark:text-white text-sm font-medium hover:bg-blue-500 dark:hover:bg-sky-600 transition ease-in-out duration-150 h-full">
                <img src="/images/pencil-square.svg" alt="Edit" width="22" height="22">
            </button>

            <input id="byLawsInput" type="file" name="byLaws" x-show="showFileInput"
                class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-md w-full" style="display: none;">

            <a x-show="!showFileInput"
                class="flex items-center gap-2 border-l px-3 py-2 text-sm font-medium rounded-r-md text-white dark:text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 h-full"
                href="{{ asset($iReapChecklist->byLaws) }}" target="_blank">
                <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">
                View File
            </a>
        </div>
        @if ($errors->has('byLaws'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('byLaws') }}
            </div>
        @endif
    </div>
@else
    <div class="mt-2">
        <label for="byLaws" class="dark:text-green-600 text-sm md:text-base">By Laws</label>
        <input
            class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
            type="file" name="byLaws" id="byLaws">
        @if ($errors->has('byLaws'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('byLaws') }}
            </div>
        @endif
    </div>
@endif

@if ($iReapChecklist->certificateOfRegistration)
    <div x-data="{ showFileInput: false }" class="mt-2">
        <label for="certificateOfRegistrationInput" class="dark:text-green-600 text-sm md:text-base">Certificate of
            Registration</label>
        <div class="flex items-center mt-1 rounded-md overflow-hidden">
            <button type="button" @click="showFileInput = !showFileInput"
                class="flex items-center justify-center px-3 py-2 bg-blue-400 dark:bg-sky-500 text-gray-700 dark:text-white text-sm font-medium hover:bg-blue-500 dark:hover:bg-sky-600 transition ease-in-out duration-150 h-full">
                <img src="/images/pencil-square.svg" alt="Edit" width="22" height="22">
            </button>

            <input id="certificateOfRegistrationInput" type="file" name="certificateOfRegistration"
                x-show="showFileInput" class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-md w-full"
                style="display: none;">

            <a x-show="!showFileInput"
                class="flex items-center gap-2 border-l px-3 py-2 text-sm font-medium rounded-r-md text-white dark:text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 h-full"
                href="{{ asset($iReapChecklist->certificateOfRegistration) }}" target="_blank">
                <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">
                View File
            </a>
        </div>
        @if ($errors->has('certificateOfRegistration'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('certificateOfRegistration') }}
            </div>
        @endif
    </div>
@else
    <div class="mt-2">
        <label for="certificateOfRegistration" class="dark:text-green-600 text-sm md:text-base">Certificate of
            Registration</label>
        <input
            class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
            type="file" name="certificateOfRegistration" id="certificateOfRegistration">
        @if ($errors->has('certificateOfRegistration'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('certificateOfRegistration') }}
            </div>
        @endif
    </div>
@endif

@if ($iReapChecklist->certificateRegistry)
    <div x-data="{ showFileInput: false }" class="mt-2">
        <label for="certificateRegistryInput" class="dark:text-green-600 text-sm md:text-base">Certificate from DA on
            its
            registration to the FFEDIS Registry</label>
        <div class="flex items-center mt-1 rounded-md overflow-hidden">
            <button type="button" @click="showFileInput = !showFileInput"
                class="flex items-center justify-center px-3 py-2 bg-blue-400 dark:bg-sky-500 text-gray-700 dark:text-white text-sm font-medium hover:bg-blue-500 dark:hover:bg-sky-600 transition ease-in-out duration-150 h-full">
                <img src="/images/pencil-square.svg" alt="Edit" width="22" height="22">
            </button>

            <input id="certificateRegistryInput" type="file" name="certificateRegistry" x-show="showFileInput"
                class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-md w-full" style="display: none;">

            <a x-show="!showFileInput"
                class="flex items-center gap-2 border-l px-3 py-2 text-sm font-medium rounded-r-md text-white dark:text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 h-full"
                href="{{ asset($iReapChecklist->certificateRegistry) }}" target="_blank">
                <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">
                View File
            </a>
        </div>
        @if ($errors->has('certificateRegistry'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('certificateRegistry') }}
            </div>
        @endif
    </div>
@else
    <div class="mt-2">
        <label for="certificateRegistry" class="dark:text-green-600 text-sm md:text-base">Certificate from DA on its
            registration to the FFEDIS Registry</label>
        <input
            class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
            type="file" name="certificateRegistry" id="certificateRegistry">
        @if ($errors->has('certificateRegistry'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('certificateRegistry') }}
            </div>
        @endif
    </div>
@endif

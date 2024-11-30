@if ($iReapChecklist->swornAffidavit)
    <div x-data="{ showFileInput: false }" class="mt-2 mb-4">
        <label for="swornAffidavitInput" class="dark:text-green-600 text-sm md:text-base">Sworn Affidavit of the Secretary
            of
            the NGO/PO</label>
        <div class="flex items-center mt-1 rounded-md overflow-hidden">
            <button type="button" @click="showFileInput = !showFileInput"
                class="flex items-center justify-center px-3 py-2 bg-blue-400 dark:bg-sky-500 text-gray-700 dark:text-white text-sm font-medium hover:bg-blue-500 dark:hover:bg-sky-600 transition ease-in-out duration-150 h-full">
                <img src="/images/pencil-square.svg" alt="Edit" width="22" height="22">
            </button>

            <input id="swornAffidavitInput" type="file" name="swornAffidavit" x-show="showFileInput"
                class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-md w-full" style="display: none;">

            <a x-show="!showFileInput"
                class="flex items-center gap-2 border-l px-3 py-2 text-sm font-medium rounded-r-md text-white dark:text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 h-full"
                href="{{ asset($iReapChecklist->swornAffidavit) }}" target="_blank">
                <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">
                View File
            </a>
        </div>
        @if ($errors->has('swornAffidavit'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('swornAffidavit') }}
            </div>
        @endif
    </div>
@else
    <div>
        <label for="swornAffidavit" class="dark:text-green-600 text-sm md:text-base">Sworn Affidavit of the Secretary of
            the NGO/PO</label>
        <input
            class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
            type="file" name="swornAffidavit" id="swornAffidavit">
        @if ($errors->has('swornAffidavit'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('swornAffidavit') }}
            </div>
        @endif
    </div>
@endif

@if ($iReapChecklist->moa)
    <div x-data="{ showFileInput: false }" class="mt-2 mb-4">
        <label for="moaInput" class="dark:text-green-600 text-sm md:text-base">MOA</label>
        <div class="flex items-center mt-1 rounded-md overflow-hidden">
            <button type="button" @click="showFileInput = !showFileInput"
                class="flex items-center justify-center px-3 py-2 bg-blue-400 dark:bg-sky-500 text-gray-700 dark:text-white text-sm font-medium hover:bg-blue-500 dark:hover:bg-sky-600 transition ease-in-out duration-150 h-full">
                <img src="/images/pencil-square.svg" alt="Edit" width="22" height="22">
            </button>

            <input id="moaInput" type="file" name="moa" x-show="showFileInput"
                class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-md w-full" style="display: none;">

            <a x-show="!showFileInput"
                class="flex items-center gap-2 border-l px-3 py-2 text-sm font-medium rounded-r-md text-white dark:text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 h-full"
                href="{{ asset($iReapChecklist->moa) }}" target="_blank">
                <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">
                View File
            </a>
        </div>
        @if ($errors->has('moa'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('moa') }}
            </div>
        @endif
    </div>
@else
    <div>
        <label for="moa" class="dark:text-green-600 text-sm md:text-base">MOA</label>
        <input
            class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
            type="file" name="moa" id="moa">
        @if ($errors->has('moa'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('moa') }}
            </div>
        @endif
    </div>
@endif

@if ($iReapChecklist->releaseOfFunds)
    <div x-data="{ showFileInput: false }" class="mt-2 mb-4">
        <label for="releaseOfFundsInput" class="dark:text-green-600 text-sm md:text-base">Release of Funds Sworn
            Affidavit
            of the
            Secretary of the NGO/PO</label>
        <div class="flex items-center mt-1 rounded-md overflow-hidden">
            <button type="button" @click="showFileInput = !showFileInput"
                class="flex items-center justify-center px-3 py-2 bg-blue-400 dark:bg-sky-500 text-gray-700 dark:text-white text-sm font-medium hover:bg-blue-500 dark:hover:bg-sky-600 transition ease-in-out duration-150 h-full">
                <img src="/images/pencil-square.svg" alt="Edit" width="22" height="22">
            </button>

            <input id="releaseOfFundsInput" type="file" name="releaseOfFunds" x-show="showFileInput"
                class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-md w-full" style="display: none;">

            <a x-show="!showFileInput"
                class="flex items-center gap-2 border-l px-3 py-2 text-sm font-medium rounded-r-md text-white dark:text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 h-full"
                href="{{ asset($iReapChecklist->releaseOfFunds) }}" target="_blank">
                <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">
                View File
            </a>
        </div>
        @if ($errors->has('releaseOfFunds'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('releaseOfFunds') }}
            </div>
        @endif
    </div>
@else
    <div>
        <label for="releaseOfFunds" class="dark:text-green-600 text-sm md:text-base">Release of Funds Sworn Affidavit of
            the Secretary of the NGO/PO</label>
        <input
            class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
            type="file" name="releaseOfFunds" id="releaseOfFunds">
        @if ($errors->has('releaseOfFunds'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('releaseOfFunds') }}
            </div>
        @endif
    </div>
@endif

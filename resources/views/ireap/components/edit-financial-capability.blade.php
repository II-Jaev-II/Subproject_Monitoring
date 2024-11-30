@if ($iReapChecklist->photocopyReceipt)
    <div x-data="{ showFileInput: false }" class="mt-2 mb-4">
        <label for="photocopyReceiptInput" class="dark:text-green-600 text-sm md:text-base">Photocopy of Official
            Receipt(OR)</label>
        <div class="flex items-center mt-1 rounded-md overflow-hidden">
            <button type="button" @click="showFileInput = !showFileInput"
                class="flex items-center justify-center px-3 py-2 bg-blue-400 dark:bg-sky-500 text-gray-700 dark:text-white text-sm font-medium hover:bg-blue-500 dark:hover:bg-sky-600 transition ease-in-out duration-150 h-full">
                <img src="/images/pencil-square.svg" alt="Edit" width="22" height="22">
            </button>

            <input id="photocopyReceiptInput" type="file" name="photocopyReceipt" x-show="showFileInput"
                class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-md w-full" x-cloak style="display: none;">

            <a x-show="!showFileInput"
                class="flex items-center gap-2 border-l px-3 py-2 text-sm font-medium rounded-r-md text-white dark:text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 h-full"
                href="{{ asset($iReapChecklist->photocopyReceipt) }}" target="_blank">
                <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">
                View File
            </a>
        </div>
        @if ($errors->has('photocopyReceipt'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('photocopyReceipt') }}
            </div>
        @endif
    </div>
@else
    <div>
        <label for="photocopyReceipt" class="dark:text-green-600 text-sm md:text-base">Photocopy of Official
            Receipt(OR)</label>
        <input
            class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
            type="file" name="photocopyReceipt" id="photocopyReceipt">
        @if ($errors->has('photocopyReceipt'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('photocopyReceipt') }}
            </div>
        @endif
    </div>
@endif

@if ($iReapChecklist->latestFinancialReport)
    <div x-data="{ showFileInput: false }" class="mt-2 mb-4">
        <label for="latestFinancialReportInput" class="dark:text-green-600 text-sm md:text-base">Latest Audited
            Financial
            Report
            for the past year</label>
        <div class="flex items-center mt-1 rounded-md overflow-hidden">
            <button type="button" @click="showFileInput = !showFileInput"
                class="flex items-center justify-center px-3 py-2 bg-blue-400 dark:bg-sky-500 text-gray-700 dark:text-white text-sm font-medium hover:bg-blue-500 dark:hover:bg-sky-600 transition ease-in-out duration-150 h-full">
                <img src="/images/pencil-square.svg" alt="Edit" width="22" height="22">
            </button>

            <input id="latestFinancialReportInput" type="file" name="latestFinancialReport" x-show="showFileInput"
                class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-md w-full" x-cloak style="display: none;">

            <a x-show="!showFileInput"
                class="flex items-center gap-2 border-l px-3 py-2 text-sm font-medium rounded-r-md text-white dark:text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 h-full"
                href="{{ asset($iReapChecklist->latestFinancialReport) }}" target="_blank">
                <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">
                View File
            </a>
        </div>
        @if ($errors->has('latestFinancialReport'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('latestFinancialReport') }}
            </div>
        @endif
    </div>
@else
    <div>
        <label for="latestFinancialReport" class="dark:text-green-600 text-sm md:text-base">Latest Audited Financial
            Report for the past year</label>
        <input
            class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
            type="file" name="latestFinancialReport" id="latestFinancialReport">
        @if ($errors->has('latestFinancialReport'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('latestFinancialReport') }}
            </div>
        @endif
    </div>
@endif

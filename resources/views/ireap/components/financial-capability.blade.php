<div>
    <label for="photocopyReceipt" class="dark:text-green-600 text-sm md:text-base">Photocopy of Official Receipt(OR)</label>
    <input
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
        type="file" name="photocopyReceipt" id="photocopyReceipt">
    @if ($errors->has('photocopyReceipt'))
    <div class="text-red-600 mt-2 mb-2">
        {{ $errors->first('photocopyReceipt') }}
    </div>
    @endif
</div>

<div>
    <label for="latestFinancialReport" class="dark:text-green-600 text-sm md:text-base">Latest Audited Financial Report for the past year</label>
    <input
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
        type="file" name="latestFinancialReport" id="latestFinancialReport">
    @if ($errors->has('latestFinancialReport'))
    <div class="text-red-600 mt-2 mb-2">
        {{ $errors->first('latestFinancialReport') }}
    </div>
    @endif
</div>
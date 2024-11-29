<div>
    <label for="swornAffidavit" class="dark:text-green-600 text-sm md:text-base">Sworn Affidavit of the Secretary of the NGO/PO</label>
    <input
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
        type="file" name="swornAffidavit" id="swornAffidavit">
    @if ($errors->has('swornAffidavit'))
    <div class="text-red-600 mt-2 mb-2">
        {{ $errors->first('swornAffidavit') }}
    </div>
    @endif
</div>

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

<div>
    <label for="releaseOfFunds" class="dark:text-green-600 text-sm md:text-base">Release of Funds Sworn Affidavit of the Secretary of the NGO/PO</label>
    <input
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
        type="file" name="releaseOfFunds" id="releaseOfFunds">
    @if ($errors->has('releaseOfFunds'))
    <div class="text-red-600 mt-2 mb-2">
        {{ $errors->first('releaseOfFunds') }}
    </div>
    @endif
</div>
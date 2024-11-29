<div class="mt-2">
    <label for="authenticatedCopy" class="dark:text-green-600 text-sm md:text-base">Authenticated copy of latest Articles of Incorporation/Articles of Cooperation</label>
    <input
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
        type="file" name="authenticatedCopy" id="authenticatedCopy">
    @if ($errors->has('authenticatedCopy'))
    <div class="text-red-600 mt-2 mb-2">
        {{ $errors->first('authenticatedCopy') }}
    </div>
    @endif
</div>

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

<div class="mt-2">
    <label for="certificateOfRegistration" class="dark:text-green-600 text-sm md:text-base">Certificate of Registration</label>
    <input
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
        type="file" name="certificateOfRegistration" id="certificateOfRegistration">
    @if ($errors->has('certificateOfRegistration'))
    <div class="text-red-600 mt-2 mb-2">
        {{ $errors->first('certificateOfRegistration') }}
    </div>
    @endif
</div>

<div class="mt-2">
    <label for="certificateRegistry" class="dark:text-green-600 text-sm md:text-base">Certificate from DA on its registration to the FFEDIS Registry</label>
    <input
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
        type="file" name="certificateRegistry" id="certificateRegistry">
    @if ($errors->has('certificateRegistry'))
    <div class="text-red-600 mt-2 mb-2">
        {{ $errors->first('certificateRegistry') }}
    </div>
    @endif
</div>
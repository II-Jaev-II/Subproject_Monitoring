<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border border-gray-300 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('econ.store-subproject') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="subprojectId" value="{{ $subproject->id }}" hidden>

                        <div class="flex items-center space-x-4 mb-6">
                            <label for="reviewDate" class="dark:text-green-600 text-black text-sm md:text-base">Date of Review <span
                                    class="text-red-500">*</span></label>
                            <input type="date" name="reviewDate" id="reviewDate" value="{{ old('reviewDate') }}"
                                class="dark:bg-gray-900 rounded-md dark:[color-scheme:dark]">
                            @if ($errors->has('reviewDate'))
                            <div class="text-red-600 mt-2 mb-2">
                                {{ $errors->first('reviewDate') }}
                            </div>
                            @endif
                        </div>



                        <div class="mb-4">
                            <label for="summary" class="dark:text-green-600 text-sm md:text-base">Summary <span
                                    class="dark:text-red-500">*</span></label>
                            <textarea name="summary" id="summary" rows="4"
                                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">{{ old('summary') }}</textarea>
                            @if ($errors->has('summary'))
                            <div class="text-red-600 mt-2 mb-2">
                                {{ $errors->first('summary') }}
                            </div>
                            @endif
                        </div>

                        <div>
                            <label for="status" class="dark:text-green-600 text-sm md:text-base">Status <span
                                    class="dark:text-red-500">*</span></label>
                            <select name="status" id="status" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-36 mt-1 py-1 px-2">
                                <option value="" disabled selected></option>
                                <option value="OK" {{ old('status') == 'OK' ? 'selected' : '' }}>OK</option>
                                <option value="Failed" {{ old('status') == 'Failed' ? 'selected' : '' }}>Failed</option>
                                <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                            </select>
                            @if ($errors->has('status'))
                            <div class="text-red-600 mt-2 mb-2">
                                {{ $errors->first('status') }}
                            </div>
                            @endif
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white dark:text-white bg-gray-400 dark:bg-lime-500 hover:text-gray-200 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2">
                                <img src="/images/check2-square.svg" alt="Save" width="22" height="22">
                                Validate Subproject
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
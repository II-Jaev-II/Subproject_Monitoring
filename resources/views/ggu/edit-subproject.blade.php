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
                    <form action="{{ route('ggu.update-subproject', $subproject->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="checklistId" value="{{ $gguChecklist->id }}" hidden>
                        <input type="text" name="subprojectId" value="{{ $subproject->id }}" hidden>
                        <div class="mb-4">
                            <h1 for="iplanChecklist" class="dark:text-lime-500 text-2xl">Edit GGU Checklist</h1>
                            <hr class="border-2 border-green-600 dark:border-lime-500 mb-2">
                        </div>

                        <div class="flex items-center space-x-4 mb-6">
                            <label for="reviewDate" class="dark:text-lime-500">Date of Review <span class="text-red-500">*</span></label>
                            <input type="date" name="reviewDate" id="reviewDate" value="{{ old('reviewDate') }}" class="dark:bg-gray-900 rounded-md dark:[color-scheme:dark]">
                            @if ($errors->has('reviewDate'))
                            <div class="text-red-600 mt-2 mb-2">
                                {{ $errors->first('reviewDate') }}
                            </div>
                            @endif
                        </div>

                        <div class="flex items-center space-x-6">
                            <!-- KMZ File Section -->
                            <div x-data="{ showFileInput: false }" class="">
                                <label for="kmzFileInput" class="dark:text-green-600">KMZ File</label>
                                <div class="flex items-center mt-1 rounded-md overflow-hidden">
                                    <button type="button"
                                        @click="showFileInput = !showFileInput"
                                        class="flex items-center justify-center px-3 py-2 bg-blue-400 dark:bg-sky-500 text-gray-700 dark:text-white text-sm font-medium hover:bg-blue-500 dark:hover:bg-sky-600 transition ease-in-out duration-150 h-full">
                                        <img src="/images/pencil-square.svg" alt="Edit" width="22" height="22">
                                    </button>

                                    <input
                                        id="kmzFileInput"
                                        type="file"
                                        name="kmzFile"
                                        x-show="showFileInput"
                                        class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-md"
                                        style="display: none;">

                                    <a
                                        x-show="!showFileInput"
                                        class="flex items-center gap-2 border-l px-3 py-2 text-sm font-medium rounded-r-md text-white dark:text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 h-full"
                                        href="{{ asset($gguChecklist->kmzFile) }}"
                                        target="_blank">
                                        <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">
                                        View File
                                    </a>
                                </div>
                            </div>

                            <!-- Report Section -->
                            <div x-data="{ showFileInput: false }" class="">
                                <label for="gguReportInput" class="dark:text-green-600">Report</label>
                                <div class="flex items-center mt-1 rounded-md overflow-hidden">
                                    <button type="button"
                                        @click="showFileInput = !showFileInput"
                                        class="flex items-center justify-center px-3 py-2 bg-blue-400 dark:bg-sky-500 text-gray-700 dark:text-white text-sm font-medium hover:bg-blue-500 dark:hover:bg-sky-600 transition ease-in-out duration-150 h-full">
                                        <img src="/images/pencil-square.svg" alt="Edit" width="22" height="22">
                                    </button>

                                    <input
                                        id="gguReportInput"
                                        type="file"
                                        name="gguReport"
                                        x-show="showFileInput"
                                        class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-md"
                                        style="display: none;">

                                    <a
                                        x-show="!showFileInput"
                                        class="flex items-center gap-2 border-l px-3 py-2 text-sm font-medium rounded-r-md text-white dark:text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 h-full"
                                        href="{{ asset($gguChecklist->gguReport) }}"
                                        target="_blank">
                                        <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">
                                        View File
                                    </a>
                                </div>
                            </div>

                            <!-- Status Section -->
                            <div class="flex-1">
                                <label for="status" class="dark:text-green-600">Status</label>
                                <select name="status" id="status" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-32 mt-1 py-1 px-2">
                                    <option {{ old('status') ? '' : 'selected' }}>{{ $gguChecklist->ggu }}</option>
                                    @if ($gguChecklist->ggu === 'Passed')
                                    @elseif ($gguChecklist->ggu === 'Failed')
                                    @else
                                    <option value="Passed" {{ old('status') == 'Passed' ? 'selected' : '' }}>Passed</option>
                                    <option value="Failed" {{ old('status') == 'Failed' ? 'selected' : '' }}>Failed</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="mb-4 mt-4">
                            <label for="remarks" class="dark:text-green-600 text-2xl">Remarks</label>
                            <textarea name="remarks" id="remarks" rows="4"
                                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">{{ old('remarks',$gguChecklist->remarks) }}</textarea>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2">
                                <img src="/images/check2-square.svg" alt="Save" width="22" height="22">
                                Update Subproject
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>
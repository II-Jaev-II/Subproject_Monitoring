<x-alpine-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-20">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="bg-gray-50 border border-gray-300 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('ses.store-subproject') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="subprojectId" value="{{ $subproject->id }}" hidden>

                        <div class="flex items-center space-x-4 mb-6">
                            <label for="reviewDate" class="dark:text-lime-500 text-sm">Date of Review <span class="text-red-500">*</span></label>
                            <input type="date" name="reviewDate" id="reviewDate" value="{{ old('reviewDate') }}" class="dark:bg-gray-900 rounded-md dark:[color-scheme:dark]">
                            @if ($errors->has('reviewDate'))
                            <div class="text-red-600 mt-2 mb-2">
                                {{ $errors->first('reviewDate') }}
                            </div>
                            @endif
                        </div>


                        <div x-data="{ selectedCheckbox: {{ old('checkboxReason') ? 'true' : 'false' }} }" x-cloak class="mb-6">
                            <div class="flex items-start space-x-3">
                                <input
                                    type="checkbox"
                                    name="checkboxReason"
                                    class="dark:bg-gray-800 rounded-sm mt-1"
                                    x-model="selectedCheckbox"
                                    {{ old('checkboxReason') ? 'checked' : '' }}>
                                <label for="reason" class="dark:text-lime-500 leading-tight flex-1 text-sm">
                                    This subproject is deemed ineligible because of the following reasons.
                                    <span class="block text-sm mt-1 text-gray-400">[State valid reasons]</span>
                                </label>
                            </div>
                            <div style="display: none !important;" x-cloak x-show="selectedCheckbox" x-transition class="mt-2 mb-2"
                                x-effect="if (!selectedCheckbox) { $refs.reasonTextarea.value = '' }">
                                <textarea x-ref="reasonTextarea" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1" name="reason" id="reason" rows="6" :required="selectedCheckbox">{{ old('reason') }}</textarea>
                            </div>
                        </div>

                        <div x-data="{ selectedCheckbox: {{ old('checkboxRequirements') ? 'true' : 'false' }} }" x-cloak class="mb-6">
                            <div class="flex items-start space-x-3">
                                <input type="checkbox" name="checkboxRequirements" class="dark:bg-gray-800 rounded-sm mt-1" x-model="selectedCheckbox" {{ old('checkboxRequirements') ? 'checked' : '' }}>
                                <label for="requirements" class="dark:text-lime-500 text-sm leading-tight flex-1">
                                    This subproject is not yet cleared of safeguards requirements pending compliance of the following.
                                    <span class="block text-sm mt-1 text-gray-400">[Write down pending requirements and sign with initials of the reviewing officer]</span>
                                </label>
                            </div>
                            <div style="display: none !important;" x-cloak x-show="selectedCheckbox" x-transition class="mt-2 mb-2" x-effect="if (!selectedCheckbox) { $refs.requirementsTextArea.value = '' }">
                                <textarea x-ref="requirementsTextArea" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1" name="requirementCompliance" id="requirementCompliance" rows="6" :required="selectedCheckbox">{{ old('requirementCompliance') }}</textarea>
                            </div>
                        </div>

                        <div x-data="{ selectedCheckbox: false }" x-cloak class="mb-6">
                            <div class="flex items-start space-x-3">
                                <input
                                    type="checkbox"
                                    class="dark:bg-gray-800 rounded-sm mt-1"
                                    x-model="selectedCheckbox"
                                    name="requirementsCheckbox">
                                <label for="requirementsTable" class="dark:text-lime-500 text-sm leading-tight flex-1">
                                    This subproject is given conditional clearance and may proceed to implementation subject to the compliance of the following requirements on or before the specified deadlines.
                                    <span class="block text-sm mt-1 text-gray-400">[Write down requirements and their agreed deadlines. Note that this option should only be resorted to when the pending requirements are already underway and will not have implications on the implementation of the subproject]: Requirement Deadline</span>
                                </label>
                            </div>
                            <div x-show="selectedCheckbox" x-transition class="mt-2 mb-6">
                                <livewire:requirements-table />
                            </div>
                        </div>

                        <div x-data="{ selectedCheckbox: {{ old('checkboxCleared') ? 'true' : 'false' }} }" x-cloak class="mb-6">
                            <div class="flex items-start space-x-3">
                                <input type="checkbox" name="checkboxCleared" class="dark:bg-gray-800 rounded-sm mt-1" x-model="selectedCheckbox" {{ old('checkboxCleared') ? 'checked' : '' }}>
                                <label for="cleared" class="dark:text-lime-500 text-sm leading-tight flex-1">
                                    This subproject is cleared of safeguards requirements and may proceed with subproject preparation.
                                </label>
                            </div>
                            <div style="display: none !important;" x-cloak x-show="selectedCheckbox" x-transition class="mt-2 mb-2" x-effect="if (!selectedCheckbox) { $refs.clearedTextArea.value = '' }">
                                <textarea x-ref="clearedTextArea" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1" name="cleared" id="cleared" rows="6" :required="selectedCheckbox">{{ old('cleared') }}</textarea>
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="socialAssesment" class="dark:text-lime-500 text-sm md:text-lg leading-tight flex-1">
                                Social Assesment <span class="text-red-500">*</span>
                            </label>
                            <div class="mt-2 mb-2">
                                <textarea class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1" name="socialAssesment" id="socialAssesment" rows="6">{{ old('socialAssesment') }}</textarea>
                            </div>
                            @if ($errors->has('socialAssesment'))
                            <div class="text-red-600 mt-2 mb-2">
                                {{ $errors->first('socialAssesment') }}
                            </div>
                            @endif
                        </div>

                        <div class="mb-6">
                            <label for="environmentalAssesment" class="dark:text-lime-500 text-sm md:text-lg leading-tight flex-1">
                                Environmental Assesment <span class="text-red-500">*</span>
                            </label>
                            <div class="mt-2 mb-2">
                                <textarea class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1" name="environmentalAssesment" id="environmentalAssesment" rows="6">{{ old('environmentalAssesment') }}</textarea>
                            </div>
                            @if ($errors->has('environmentalAssesment'))
                            <div class="text-red-600 mt-2 mb-2">
                                {{ $errors->first('environmentalAssesment') }}
                            </div>
                            @endif
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2">
                                <img src="/images/check2-square.svg" alt="Save" width="22" height="22">
                                Validate Subproject
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-alpine-layout>
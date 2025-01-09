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
                    <form action="{{ route('iplan.rpab-store-validation', $subproject->id) }}" method="POST">
                        @csrf
                        <input type="text" name="subprojectId" value="{{ $subproject->id }}" hidden>

                        <div x-data="{ 
                                            step: 1,
                                            showError: false,
                                            showDateError: false,
                                            showPercentageError: false,
                                            errorFields: [],

                                            validateStep() {
                                                this.showError = false;
                                                this.errorFields = [];
                                                let failedValidation = false;

                                                this.$root.querySelectorAll('[x-data]').forEach(section => {
                                                    let selectedOption = section.querySelector('input[type=radio]:checked');
                                                    let textarea = section.querySelector('textarea');

                                                    if (selectedOption && selectedOption.value === 'notComplied' && textarea) {
                                                        if (!textarea.value.trim()) {
                                                            this.showError = true;
                                                            this.errorFields.push(textarea.id);
                                                            failedValidation = true;
                                                        }
                                                    }
                                                });

                                                return !failedValidation;
                                            },

                                            validatePercentage() {
                                                this.showPercentageError = false;
                                                let percentageInput = document.querySelector('#percentageAccomplishment');

                                                if (!percentageInput.value.trim() || isNaN(percentageInput.value) || percentageInput.value < 0 || percentageInput.value > 100) {
                                                    this.showPercentageError = true;
                                                    return false;
                                                }
                                                return true;
                                            },

                                            nextStep() {
                                                if (this.validateStep()) {
                                                    this.step++;
                                                }
                                            },

                                            prevStep() {
                                                if (this.validateStep()) {
                                                    this.step--;
                                                }
                                            },

                                            submitForm() {
                                                this.showDateError = false;
                                                let dateInput = document.querySelector('#reviewDate');

                                                if (!dateInput.value.trim()) {
                                                    this.showDateError = true;
                                                    return;
                                                }

                                                if (this.validateStep() && this.validatePercentage()) {
                                                    this.$root.closest('form').submit();
                                                }
                                            }
                                    }">

                            <div x-show="step === 1">

                                <div class="flex justify-center mb-2">
                                    <h1 class="dark:text-lime-500 text-md md:text-2xl">Municipal or Provincial Background</h1>
                                </div>
                                @include('iplan.rpab.checklists.municipal-provincial-background-checklist')
                            </div>

                            <div x-show="step === 2" x-cloak style="display: none !important;">
                                <div class="flex justify-center mb-2">
                                    <h1 class="dark:text-lime-500 text-md md:text-2xl">Demographics</h1>
                                </div>
                                @include('iplan.rpab.checklists.demographics-checklist')
                            </div>

                            <div x-show="step === 3" x-cloak style="display: none !important;">
                                <div class="flex justify-center mb-2">
                                    <h1 class="dark:text-lime-500 text-md md:text-2xl">Economy</h1>
                                </div>
                                @include('iplan.rpab.checklists.economy-checklist')
                            </div>

                            <div x-show="step === 4" x-cloak style="display: none !important;">
                                <div class="flex justify-center mb-2">
                                    <h1 class="dark:text-lime-500 text-md md:text-2xl">Agriculture & Rural Development Sectors</h1>
                                </div>
                                @include('iplan.rpab.checklists.agriculture-and-rural-development-sectors-checklist')
                            </div>

                            <div x-show="step === 5" x-cloak style="display: none !important;">
                                <div class="flex justify-center mb-2">
                                    <h1 class="dark:text-lime-500 text-md md:text-2xl">Project Identification & Prioritization Profile</h1>
                                </div>
                                @include('iplan.rpab.checklists.project-identification-checklist')
                            </div>

                            <div x-show="step === 6" x-cloak style="display: none !important;">
                                <div class="flex justify-center mb-2">
                                    <h1 class="dark:text-lime-500 text-md md:text-2xl">The Subproject</h1>
                                </div>
                                @include('iplan.rpab.checklists.the-subproject-checklist')
                                <div class="flex items-center space-x-4 mt-4 mb-6">
                                    <label for="reviewDate" class="dark:text-green-600 text-black text-sm md:text-base">Date of Review <span
                                            class="text-red-500">*</span></label>
                                    <input type="date" id="reviewDate" name="reviewDate" class="dark:bg-gray-900 rounded-md dark:[color-scheme:dark]" required>
                                    <div x-show="showDateError" class="text-red-600 mt-2" x-cloak style="display: none !important;">
                                        Please select a date before submitting.
                                    </div>

                                    <label for="percentageAccomplishment" class="dark:text-green-600 text-black text-sm md:text-base">Percentage of Accomplishments <span class="text-red-500">*</span></label>
                                    <input type="text" id="percentageAccomplishment" name="percentageAccomplishment" class="dark:bg-gray-900 rounded-md w-32" step="1" min="0" max="100"
                                        inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                                    <div x-show="showPercentageError" class="text-red-600 mt-2" x-cloak style="display: none !important;">
                                        Please enter a valid percentage between 0 and 100.
                                    </div>
                                </div>
                            </div>

                            <div x-show="showError" class="text-red-600 mt-2" x-cloak style="display: none !important;">
                                Please fill in the textareas of selected checkboxes.
                            </div>

                            <div class="mt-6 flex justify-between">
                                <button
                                    type="button"
                                    x-show="step > 1"
                                    @click="prevStep()"
                                    class="px-4 py-2 bg-gray-500 hover:bg-gray-600 rounded">
                                    Back
                                </button>

                                <button
                                    type="button"
                                    x-show="step < 6"
                                    @click="nextStep()"
                                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
                                    Next
                                </button>

                                <button
                                    type="submit"
                                    x-show="step === 6"
                                    @click.prevent="submitForm()"
                                    class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded">
                                    Submit
                                </button>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
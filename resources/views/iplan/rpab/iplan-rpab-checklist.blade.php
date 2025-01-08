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
                    <form action="" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="subprojectId" value="{{ $subproject->id }}" hidden>

                        <div x-data="{ step: 1,
                                            showError: false,
                                            errorFields: [],
                                            
                                            validateStep() {
                                                this.showError = false;
                                                this.errorFields = [];
                                                let failedValidation = false;

                                                // Scope validation to the current Alpine component
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

                                            nextStep() {
                                                if (this.validateStep()) {
                                                    this.step++;
                                                }
                                            },

                                            prevStep() {
                                                if (this.validateStep()) {
                                                    this.step--;
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
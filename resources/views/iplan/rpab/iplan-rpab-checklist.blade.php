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

                        <div class="flex justify-center mb-2">
                            <h1 class="dark:text-lime-500 text-md md:text-2xl">Municipal or Provincial Background</h1>
                        </div>

                        <div x-data="{ selectedCheckbox: {{ old('checkboxGeography') ? 'true' : 'false' }} }" x-cloak>
                            <div class="flex items-start space-x-3">
                                <input
                                    type="checkbox"
                                    name="checkboxGeography"
                                    class="dark:bg-gray-800 rounded-sm mt-1"
                                    x-model="selectedCheckbox"
                                    {{ old('checkboxGeography') ? 'checked' : '' }}>
                                <label for="checkboxGeography" class="dark:text-green-600 leading-tight flex-1 text-sm md:text-base">
                                    Geography
                                </label>
                            </div>
                            <div style="display: none !important;" x-cloak x-show="selectedCheckbox" x-transition class="mt-2 mb-2"
                                x-effect="if (!selectedCheckbox) { $refs.geographyTextbox.value = '' }">
                                <textarea x-ref="geographyTextbox" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1" rows="2" name="geography" id="geography">{{ old('geography') }}</textarea>
                            </div>
                        </div>

                        <div x-data="{ selectedCheckbox: {{ old('checkboxlandAreaDescription') ? 'true' : 'false' }} }" x-cloak>
                            <div class="flex items-start space-x-3">
                                <input
                                    type="checkbox"
                                    name="checkboxlandAreaDescription"
                                    class="dark:bg-gray-800 rounded-sm mt-1"
                                    x-model="selectedCheckbox"
                                    {{ old('checkboxlandAreaDescription') ? 'checked' : '' }}>
                                <label for="checkboxlandAreaDescription" class="dark:text-green-600 leading-tight flex-1 text-sm md:text-base">
                                    Land Area & Description
                                </label>
                            </div>
                            <div style="display: none !important;" x-cloak x-show="selectedCheckbox" x-transition class="mt-2 mb-2"
                                x-effect="if (!selectedCheckbox) { $refs.landAreaDescriptionTextbox.value = '' }">
                                <textarea x-ref="landAreaDescriptionTextbox" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1" rows="2" name="landAreaDescription" id="landAreaDescription">{{ old('landAreaDescription') }}</textarea>
                            </div>
                        </div>

                        <div x-data="{ selectedCheckbox: {{ old('checkboxIncomeClassification') ? 'true' : 'false' }} }" x-cloak>
                            <div class="flex items-start space-x-3">
                                <input
                                    type="checkbox"
                                    name="checkboxIncomeClassification"
                                    class="dark:bg-gray-800 rounded-sm mt-1"
                                    x-model="selectedCheckbox"
                                    {{ old('checkboxIncomeClassification') ? 'checked' : '' }}>
                                <label for="checkboxIncomeClassification" class="dark:text-green-600 leading-tight flex-1 text-sm md:text-base">
                                    DILG Income Classification
                                </label>
                            </div>
                            <div style="display: none !important;" x-cloak x-show="selectedCheckbox" x-transition class="mt-2 mb-2"
                                x-effect="if (!selectedCheckbox) { $refs.incomeClassificationTextbox.value = '' }">
                                <textarea x-ref="incomeClassificationTextbox" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1" rows="2" name="incomeClassification" id="incomeClassification">{{ old('incomeClassification') }}</textarea>
                            </div>
                        </div>

                        <div x-data="{ selectedCheckbox: {{ old('checkboxInterestingFacts') ? 'true' : 'false' }} }" x-cloak>
                            <div class="flex items-start space-x-3">
                                <input
                                    type="checkbox"
                                    name="checkboxInterestingFacts"
                                    class="dark:bg-gray-800 rounded-sm mt-1"
                                    x-model="selectedCheckbox"
                                    {{ old('checkboxInterestingFacts') ? 'checked' : '' }}>
                                <label for="checkboxInterestingFacts" class="dark:text-green-600 leading-tight flex-1 text-sm md:text-base">
                                    What is the place known for? (interesting facts)
                                </label>
                            </div>
                            <div style="display: none !important;" x-cloak x-show="selectedCheckbox" x-transition class="mt-2 mb-2"
                                x-effect="if (!selectedCheckbox) { $refs.interestingFactsTextbox.value = '' }">
                                <textarea x-ref="interestingFactsTextbox" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1" rows="2" name="interestingFacts" id="interestingFacts">{{ old('interestingFacts') }}</textarea>
                            </div>
                        </div>

                        <div x-data="{ selectedCheckbox: {{ old('checkboxBriefRural') ? 'true' : 'false' }} }" x-cloak>
                            <div class="flex items-start space-x-3">
                                <input
                                    type="checkbox"
                                    name="checkboxBriefRural"
                                    class="dark:bg-gray-800 rounded-sm mt-1"
                                    x-model="selectedCheckbox"
                                    {{ old('checkboxBriefRural') ? 'checked' : '' }}>
                                <label for="checkboxBriefRural" class="dark:text-green-600 leading-tight flex-1 text-sm md:text-base">
                                    Brief rural & economic situationer (relative to other municipalities or provinces)
                                </label>
                            </div>
                            <div style="display: none !important;" x-cloak x-show="selectedCheckbox" x-transition class="mt-2 mb-2"
                                x-effect="if (!selectedCheckbox) { $refs.briefRuralTextbox.value = '' }">
                                <textarea x-ref="briefRuralTextbox" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1" rows="2" name="briefRural" id="briefRural">{{ old('briefRural') }}</textarea>
                            </div>
                        </div>

                        <div x-data="{ selectedCheckbox: {{ old('checkboxAwards') ? 'true' : 'false' }} }" x-cloak>
                            <div class="flex items-start space-x-3">
                                <input
                                    type="checkbox"
                                    name="checkboxAwards"
                                    class="dark:bg-gray-800 rounded-sm mt-1"
                                    x-model="selectedCheckbox"
                                    {{ old('checkboxAwards') ? 'checked' : '' }}>
                                <label for="checkboxAwards" class="dark:text-green-600 leading-tight flex-1 text-sm md:text-base">
                                    SGLG, notable awards, or other distinguishing traits
                                </label>
                            </div>
                            <div style="display: none !important;" x-cloak x-show="selectedCheckbox" x-transition class="mt-2 mb-2"
                                x-effect="if (!selectedCheckbox) { $refs.awardsTextbox.value = '' }">
                                <textarea x-ref="awardsTextbox" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1" rows="2" name="awards" id="awards">{{ old('awards') }}</textarea>
                            </div>
                        </div>

                        <div x-data="{ selectedCheckbox: {{ old('checkboxVisionAgriculture') ? 'true' : 'false' }} }" x-cloak>
                            <div class="flex items-start space-x-3">
                                <input
                                    type="checkbox"
                                    name="checkboxVisionAgriculture"
                                    class="dark:bg-gray-800 rounded-sm mt-1"
                                    x-model="selectedCheckbox"
                                    {{ old('checkboxVisionAgriculture') ? 'checked' : '' }}>
                                <label for="checkboxVisionAgriculture" class="dark:text-green-600 leading-tight flex-1 text-sm md:text-base">
                                    Vision in Agriculture
                                </label>
                            </div>
                            <div style="display: none !important;" x-cloak x-show="selectedCheckbox" x-transition class="mt-2 mb-2"
                                x-effect="if (!selectedCheckbox) { $refs.visionAgricultureTextbox.value = '' }">
                                <textarea x-ref="visionAgricultureTextbox" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1" rows="2" name="visionAgriculture" id="visionAgriculture">{{ old('visionAgriculture') }}</textarea>
                            </div>
                        </div>

                        <div class="mt-2">
                            <p class="dark:text-lime-500 text-lg">&#x2022; Demographics</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                            <div x-data="{ selectedCheckbox: {{ old('checkboxTotalPopulation') ? 'true' : 'false' }} }" x-cloak>
                                <div class="flex items-start space-x-3">
                                    <input
                                        type="checkbox"
                                        name="checkboxTotalPopulation"
                                        class="dark:bg-gray-800 rounded-sm mt-1"
                                        x-model="selectedCheckbox"
                                        {{ old('checkboxTotalPopulation') ? 'checked' : '' }}>
                                    <label for="checkboxTotalPopulation" class="dark:text-green-600 leading-tight flex-1 text-sm md:text-base">
                                        Total Population
                                    </label>
                                </div>
                                <div style="display: none !important;" x-cloak x-show="selectedCheckbox" x-transition class="mt-2 mb-2"
                                    x-effect="if (!selectedCheckbox) { $refs.totalPopulationTextbox.value = '' }">
                                    <input type="text" x-ref="totalPopulationTextbox" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1" name="totalPopulation" id="totalPopulation">
                                </div>
                            </div>

                            <div x-data="{ selectedCheckbox: {{ old('checkboxAverageHousehold') ? 'true' : 'false' }} }" x-cloak>
                                <div class="flex items-start space-x-3">
                                    <input
                                        type="checkbox"
                                        name="checkboxAverageHousehold"
                                        class="dark:bg-gray-800 rounded-sm mt-1"
                                        x-model="selectedCheckbox"
                                        {{ old('checkboxAverageHousehold') ? 'checked' : '' }}>
                                    <label for="checkboxAverageHousehold" class="dark:text-green-600 leading-tight flex-1 text-sm md:text-base">
                                        Average Household Size
                                    </label>
                                </div>
                                <div style="display: none !important;" x-cloak x-show="selectedCheckbox" x-transition class="mt-2 mb-2"
                                    x-effect="if (!selectedCheckbox) { $refs.averageHouseholdTextbox.value = '' }">
                                    <input x-ref="averageHouseholdTextbox" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1" name="averageHousehold" id="averageHousehold">
                                </div>
                            </div>

                            <div x-data="{ selectedCheckbox: {{ old('checkboxEducationPopulation') ? 'true' : 'false' }} }" x-cloak>
                                <div class="flex items-start space-x-3">
                                    <input
                                        type="checkbox"
                                        name="checkboxEducationPopulation"
                                        class="dark:bg-gray-800 rounded-sm mt-1"
                                        x-model="selectedCheckbox"
                                        {{ old('checkboxEducationPopulation') ? 'checked' : '' }}>
                                    <label for="checkboxEducationPopulation" class="dark:text-green-600 leading-tight flex-1 text-sm md:text-base">
                                        Education of Population <span class="italic text-sm dark:text-gray-400">(if available)</span>
                                    </label>
                                </div>
                                <div style="display: none !important;" x-cloak x-show="selectedCheckbox" x-transition class="mt-2 mb-2"
                                    x-effect="if (!selectedCheckbox) { $refs.educationPopulationTextbox.value = '' }">
                                    <input x-ref="educationPopulationTextbox" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1" name="educationPopulation" id="educationPopulation">
                                </div>
                            </div>
                        </div>

                        <div class="mt-2" x-data="{ selectedCheckbox: {{ old('checkboxPopulation') ? 'true' : 'false' }} }" x-cloak>
                            <div class="flex items-start space-x-3">
                                <input
                                    type="checkbox"
                                    name="checkboxPopulation"
                                    class="dark:bg-gray-800 rounded-sm mt-1"
                                    x-model="selectedCheckbox"
                                    {{ old('checkboxPopulation') ? 'checked' : '' }}>
                                <label for="checkboxPopulation" class="dark:text-green-600 leading-tight flex-1 text-sm md:text-base">
                                    Barangays, classifications, land area, no. of household, population
                                </label>
                            </div>
                            <div style="display: none !important;" x-cloak x-show="selectedCheckbox" x-transition class="mt-2 mb-2"
                                x-effect="if (!selectedCheckbox) { $refs.populationTextbox.value = '' }">
                                <textarea x-ref="populationTextbox" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1" rows="2" name="population" id="population">{{ old('population') }}</textarea>
                            </div>
                        </div>

                        <div class="mt-2">
                            <p class="dark:text-lime-500 text-lg">&#x2022; Economy</p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
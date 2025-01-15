<div x-data="{
    selectedOptionGeography: '{{ $iPlanRpabChecklist->geographyStatus ?? '' }}',
    geography: '{{ $iPlanRpabChecklist->geographyComments ?? '' }}'
}" x-cloak>

    <div class="flex items-center space-x-3">
        <label for="geography" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Geography
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`geography-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionGeography === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`geography-${option.id}`" name="geographyStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionGeography" @click="selectedOptionGeography === option.id ? selectedOptionGeography = '' : selectedOptionGeography = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionGeography" x-transition class="mt-3"
        x-effect="if (!selectedOptionGeography) { geography = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionGeography === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionGeography === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-model="geography" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="geography" id="geography"></textarea>
    </div>
</div>

<div x-data="{ selectedOptionLandArea: '{{ $iPlanRpabChecklist->landAreaDescriptionStatus ?? '' }}',
    landAreaDescription: '{{ $iPlanRpabChecklist->landAreaDescriptionComments ?? '' }}' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="landAreaDescription" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Land Area & Description
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`landAreaDescription-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionLandArea === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`landAreaDescription-${option.id}`" name="landAreaDescriptionStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionLandArea" @click="selectedOptionLandArea === option.id ? selectedOptionLandArea = '' : selectedOptionLandArea = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionLandArea" x-transition class="mt-3"
        x-effect="if (!selectedOptionLandArea) { landAreaDescription = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionLandArea === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionLandArea === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-model="landAreaDescription" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="landAreaDescription" id="landAreaDescription"></textarea>
    </div>
</div>

<div x-data="{ selectedOptionIncomeClassification: '{{ $iPlanRpabChecklist->incomeClassificationStatus ?? '' }}',
incomeClassification: '{{ $iPlanRpabChecklist->incomeClassificationComments ?? '' }}' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="incomeClassification" class="dark:text-green-600 leading-tight text-sm md:text-base">
            DILG Income Classification
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`incomeClassification-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionIncomeClassification === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`incomeClassification-${option.id}`" name="incomeClassificationStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionIncomeClassification" @click="selectedOptionIncomeClassification === option.id ? selectedOptionIncomeClassification = '' : selectedOptionIncomeClassification = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionIncomeClassification" x-transition class="mt-3"
        x-effect="if (!selectedOptionIncomeClassification) { incomeClassification = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionIncomeClassification === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionIncomeClassification === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-model="incomeClassification" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="incomeClassification" id="incomeClassification"></textarea>
    </div>
</div>

<div x-data="{ selectedOptionInterestingFacts: '{{ $iPlanRpabChecklist->interestingFactsStatus ?? '' }}',
interestingFacts: '{{ $iPlanRpabChecklist->interestingFactsComments ?? '' }}' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="interestingFacts" class="dark:text-green-600 leading-tight text-sm md:text-base">
            What is the place known for? (interesting facts)
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`interestingFacts-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionInterestingFacts === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`interestingFacts-${option.id}`" name="interestingFactsStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionInterestingFacts" @click="selectedOptionInterestingFacts === option.id ? selectedOptionInterestingFacts = '' : selectedOptionInterestingFacts = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionInterestingFacts" x-transition class="mt-3"
        x-effect="if (!selectedOptionInterestingFacts) { interestingFacts = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionInterestingFacts === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionInterestingFacts === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-model="interestingFacts" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="interestingFacts" id="interestingFacts"></textarea>
    </div>
</div>

<div x-data="{ selectedOptionBriefRural: '{{ $iPlanRpabChecklist->briefRuralStatus ?? '' }}',
briefRural: '{{ $iPlanRpabChecklist->briefRuralComments ?? '' }}' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="briefRural" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Brief rural & economic situationer (relative to other municipalities or provinces)
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`briefRural-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionBriefRural === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`briefRural-${option.id}`" name="briefRuralStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionBriefRural" @click="selectedOptionBriefRural === option.id ? selectedOptionBriefRural = '' : selectedOptionBriefRural = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionBriefRural" x-transition class="mt-3"
        x-effect="if (!selectedOptionBriefRural) { briefRural = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionBriefRural === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionBriefRural === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-model="briefRural" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="briefRural" id="briefRural"></textarea>
    </div>
</div>

<div x-data="{ selectedOptionAwards: '{{ $iPlanRpabChecklist->awardsStatus ?? '' }}',
awards: '{{ $iPlanRpabChecklist->awardsComments ?? '' }}' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="awards" class="dark:text-green-600 leading-tight text-sm md:text-base">
            SGLG, notable awards, or other distinguishing traits
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`awards-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionAwards === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`awards-${option.id}`" name="awardsStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionAwards" @click="selectedOptionAwards === option.id ? selectedOptionAwards = '' : selectedOptionAwards = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionAwards" x-transition class="mt-3"
        x-effect="if (!selectedOptionAwards) { awards = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionAwards === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionAwards === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-model="awards" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="awards" id="awards"></textarea>
    </div>
</div>

<div x-data="{ selectedOptionVisionAgriculture: '{{ $iPlanRpabChecklist->visionAgricultureStatus ?? '' }}',
visionAgriculture: '{{ $iPlanRpabChecklist->visionAgricultureComments ?? '' }}' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="visionAgriculture" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Vision in agriculture
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`visionAgriculture-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionVisionAgriculture === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`visionAgriculture-${option.id}`" name="visionAgricultureStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionVisionAgriculture" @click="selectedOptionVisionAgriculture === option.id ? selectedOptionVisionAgriculture = '' : selectedOptionVisionAgriculture = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionVisionAgriculture" x-transition class="mt-3"
        x-effect="if (!selectedOptionVisionAgriculture) { visionAgriculture = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionVisionAgriculture === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionVisionAgriculture === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-model="visionAgriculture" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="visionAgriculture" id="visionAgriculture"></textarea>
    </div>
</div>
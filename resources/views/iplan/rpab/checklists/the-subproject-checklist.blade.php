<label for="roadInfluenceArea" class="dark:text-lime-500 leading-tight flex-1 text-sm md:text-base">
    The Road Influence Area
</label>
<br>
<label for="demographics" class="dark:text-lime-500 leading-tight flex-1 text-sm md:text-base">
    &#x2022; Demogprahics
</label>

<div x-data="{
    selectedOptionBeneficiariesDemographics: '{{ $iPlanRpabChecklist->beneficiariesDemographicsStatus ?? '' }}',
    beneficiariesDemographics: '{{ $iPlanRpabChecklist->beneficiariesDemographicsComments ?? '' }}' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="beneficiariesDemographics" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Beneficiaries' demographics
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`beneficiariesDemographics-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionBeneficiariesDemographics === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`beneficiariesDemographics-${option.id}`" name="beneficiariesDemographicsStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionBeneficiariesDemographics" @click="selectedOptionBeneficiariesDemographics === option.id ? selectedOptionBeneficiariesDemographics = '' : selectedOptionBeneficiariesDemographics = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionBeneficiariesDemographics" x-transition class="mt-3"
        x-effect="if (!selectedOptionBeneficiariesDemographics) { beneficiariesDemographics = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionBeneficiariesDemographics === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionBeneficiariesDemographics === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-model="beneficiariesDemographics" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="beneficiariesDemographics" id="beneficiariesDemographics"></textarea>
    </div>
</div>

<div x-data="{
    selectedOptionNumberHouseholds: '{{ $iPlanRpabChecklist->numberHouseholdsStatus ?? '' }}',
    numberHouseholds: '{{ $iPlanRpabChecklist->numberHouseholdsComments ?? '' }}' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="numberHouseholds" class="dark:text-green-600 leading-tight text-sm md:text-base">
            No. of households
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`numberHouseholds-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionNumberHouseholds === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`numberHouseholds-${option.id}`" name="numberHouseholdsStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionNumberHouseholds" @click="selectedOptionNumberHouseholds === option.id ? selectedOptionNumberHouseholds = '' : selectedOptionNumberHouseholds = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionNumberHouseholds" x-transition class="mt-3"
        x-effect="if (!selectedOptionNumberHouseholds) { numberHouseholds = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionNumberHouseholds === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionNumberHouseholds === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-model="numberHouseholds" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="numberHouseholds" id="numberHouseholds"></textarea>
    </div>
</div>

<div x-data="{
    selectedOptionHighlight: '{{ $iPlanRpabChecklist->highlightStatus ?? '' }}',
    highlight: '{{ $iPlanRpabChecklist->highlightComments ?? '' }}' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="highlight" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Highlight how it will affect IPs (if any), women, children, and those in the marginal sector
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`highlight-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionHighlight === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`highlight-${option.id}`" name="highlightStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionHighlight" @click="selectedOptionHighlight === option.id ? selectedOptionHighlight = '' : selectedOptionHighlight = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionHighlight" x-transition class="mt-3"
        x-effect="if (!selectedOptionHighlight) { highlight = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionHighlight === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionHighlight === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-model="highlight" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="highlight" id="highlight"></textarea>
    </div>
</div>

<label for="majoryEconomy" class="dark:text-lime-500 leading-tight flex-1 text-sm md:text-base">
    &#x2022; Major Economy & Land Use
</label>
<br>
<label for="onFarmData" class="dark:text-lime-500 leading-tight flex-1 text-sm md:text-base">
    On-farm Data
</label>

<div x-data="{
    selectedOptionCommodityArea: '{{ $iPlanRpabChecklist->commodityAreaStatus ?? '' }}',
    commodityArea: '{{ $iPlanRpabChecklist->commodityAreaComments ?? '' }}' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="commodityArea" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Commodity Area
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`commodityArea-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionCommodityArea === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`commodityArea-${option.id}`" name="commodityAreaStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionCommodityArea" @click="selectedOptionCommodityArea === option.id ? selectedOptionCommodityArea = '' : selectedOptionCommodityArea = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionCommodityArea" x-transition class="mt-3"
        x-effect="if (!selectedOptionCommodityArea) { commodityArea = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionCommodityArea === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionCommodityArea === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-model="commodityArea" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="commodityArea" id="commodityArea"></textarea>
    </div>
</div>

<div x-data="{
    selectedOptionPriorityCommoditiesLocation: '{{ $iPlanRpabChecklist->priorityCommoditiesLocationStatus ?? '' }}',
    priorityCommoditiesLocation: '{{ $iPlanRpabChecklist->priorityCommoditiesLocationComments ?? '' }}' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="priorityCommoditiesLocation" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Priority commodities in the location of SP
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`priorityCommoditiesLocation-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionPriorityCommoditiesLocation === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`priorityCommoditiesLocation-${option.id}`" name="priorityCommoditiesLocationStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionPriorityCommoditiesLocation" @click="selectedOptionPriorityCommoditiesLocation === option.id ? selectedOptionPriorityCommoditiesLocation = '' : selectedOptionPriorityCommoditiesLocation = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionPriorityCommoditiesLocation" x-transition class="mt-3"
        x-effect="if (!selectedOptionPriorityCommoditiesLocation) { priorityCommoditiesLocation = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionPriorityCommoditiesLocation === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionPriorityCommoditiesLocation === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-model="priorityCommoditiesLocation" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="priorityCommoditiesLocation" id="priorityCommoditiesLocation"></textarea>
    </div>
</div>

<label for="offFarmData" class="dark:text-lime-500 leading-tight flex-1 text-sm md:text-base">
    Off-farm Data
</label>
<br>
<label for="povertyIncidence" class="dark:text-lime-500 leading-tight flex-1 text-sm md:text-base">
    &#x2022; Poverty Incidence
</label>

<div x-data="{
    selectedOptionPercentageResidents: '{{ $iPlanRpabChecklist->percentageResidentsStatus ?? '' }}',
    percentageResidents: '{{ $iPlanRpabChecklist->percentageResidentsComments ?? '' }}' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="percentageResidents" class="dark:text-green-600 leading-tight text-sm md:text-base">
            What percentage of the residents are living in the area (if available)
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`percentageResidents-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionPercentageResidents === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`percentageResidents-${option.id}`" name="percentageResidentsStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionPercentageResidents" @click="selectedOptionPercentageResidents === option.id ? selectedOptionPercentageResidents = '' : selectedOptionPercentageResidents = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionPercentageResidents" x-transition class="mt-3"
        x-effect="if (!selectedOptionPercentageResidents) { percentageResidents = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionPercentageResidents === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionPercentageResidents === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-model="percentageResidents" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="percentageResidents" id="percentageResidents"></textarea>
    </div>
</div>

<div x-data="{
    selectedOptionLivingConditions: '{{ $iPlanRpabChecklist->livingConditionsStatus ?? '' }}',
    livingConditions: '{{ $iPlanRpabChecklist->livingConditionsComments ?? '' }}' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="livingConditions" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Living conditions of people in poverty
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`livingConditions-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionLivingConditions === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`livingConditions-${option.id}`" name="livingConditionsStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionLivingConditions" @click="selectedOptionLivingConditions === option.id ? selectedOptionLivingConditions = '' : selectedOptionLivingConditions = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionLivingConditions" x-transition class="mt-3"
        x-effect="if (!selectedOptionLivingConditions) { livingConditions = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionLivingConditions === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionLivingConditions === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-model="livingConditions" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="livingConditions" id="livingConditions"></textarea>
    </div>
</div>
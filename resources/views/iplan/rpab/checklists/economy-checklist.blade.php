<div x-data="{ selectedOptionAgricultureIncome: '' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="agricultureIncome" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Percentage of agriculture income & employment or contribution of agricultural sector in the economy
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`agricultureIncome-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionAgricultureIncome === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`agricultureIncome-${option.id}`" name="agricultureIncomeStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionAgricultureIncome" @click="selectedOptionAgricultureIncome === option.id ? selectedOptionAgricultureIncome = '' : selectedOptionAgricultureIncome = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionAgricultureIncome" x-transition class="mt-3"
        x-effect="if (!selectedOptionAgricultureIncome) { $refs.agricultureIncomeTextbox.value = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionAgricultureIncome === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionAgricultureIncome === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-ref="agricultureIncomeTextbox" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="agricultureIncome" id="agricultureIncome"></textarea>
    </div>
</div>

<div x-data="{ selectedOptionIncomeDisaggregation: '' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="incomeDisaggregation" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Income disaggregation by sector
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`incomeDisaggregation-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionIncomeDisaggregation === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`incomeDisaggregation-${option.id}`" name="incomeDisaggregationStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionIncomeDisaggregation" @click="selectedOptionIncomeDisaggregation === option.id ? selectedOptionIncomeDisaggregation = '' : selectedOptionIncomeDisaggregation = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionIncomeDisaggregation" x-transition class="mt-3"
        x-effect="if (!selectedOptionIncomeDisaggregation) { $refs.incomeDisaggregationTextbox.value = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionIncomeDisaggregation === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionIncomeDisaggregation === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-ref="incomeDisaggregationTextbox" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="incomeDisaggregation" id="incomeDisaggregation"></textarea>
    </div>
</div>

<div x-data="{ selectedOptionPovertyIncidence: '' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="povertyIncidence" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Poverty Incidence (2018 or 2021 PSA data)
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`povertyIncidence-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionPovertyIncidence === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`povertyIncidence-${option.id}`" name="povertyIncidenceStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionPovertyIncidence" @click="selectedOptionPovertyIncidence === option.id ? selectedOptionPovertyIncidence = '' : selectedOptionPovertyIncidence = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionPovertyIncidence" x-transition class="mt-3"
        x-effect="if (!selectedOptionPovertyIncidence) { $refs.povertyIncidenceTextbox.value = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionPovertyIncidence === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionPovertyIncidence === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-ref="povertyIncidenceTextbox" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="povertyIncidence" id="povertyIncidence"></textarea>
    </div>
</div>

<div x-data="{ selectedOptionAvailableFacilities: '' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="availableFacilities" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Available Facilities (post-harvest facilities, banks, agri-markets)
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`availableFacilities-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionAvailableFacilities === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`availableFacilities-${option.id}`" name="availableFacilitiesStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionAvailableFacilities" @click="selectedOptionAvailableFacilities === option.id ? selectedOptionAvailableFacilities = '' : selectedOptionAvailableFacilities = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionAvailableFacilities" x-transition class="mt-3"
        x-effect="if (!selectedOptionAvailableFacilities) { $refs.availableFacilitiesTextbox.value = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionAvailableFacilities === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionAvailableFacilities === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-ref="availableFacilitiesTextbox" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="availableFacilities" id="availableFacilities"></textarea>
    </div>
</div>

<div x-data="{ selectedOptionEconomicVision: '' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="availableFacilities" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Economic vision or thrusts
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`economicVision-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionEconomicVision === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`economicVision-${option.id}`" name="economicVisionStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionEconomicVision" @click="selectedOptionEconomicVision === option.id ? selectedOptionEconomicVision = '' : selectedOptionEconomicVision = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionEconomicVision" x-transition class="mt-3"
        x-effect="if (!selectedOptionEconomicVision) { $refs.economicVisionTextbox.value = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionEconomicVision === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionEconomicVision === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-ref="economicVisionTextbox" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="economicVision" id="economicVision"></textarea>
    </div>
</div>

<div x-data="{ selectedOptionEmploymentRate: '' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="availableFacilities" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Employment rate & disaggregation by sector
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`employmentRate-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionEmploymentRate === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`employmentRate-${option.id}`" name="employmentRateStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionEmploymentRate" @click="selectedOptionEmploymentRate === option.id ? selectedOptionEmploymentRate = '' : selectedOptionEmploymentRate = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionEmploymentRate" x-transition class="mt-3"
        x-effect="if (!selectedOptionEmploymentRate) { $refs.employmentRateTextbox.value = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionEmploymentRate === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionEmploymentRate === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-ref="employmentRateTextbox" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="employmentRate" id="employmentRate"></textarea>
    </div>
</div>
<div x-data="{ selectedOptionPriorityCommodities: '' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="priorityCommodities" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Priority commodities (highlight commodity industry where SP will be linked)
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`priorityCommodities-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionPriorityCommodities === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`priorityCommodities-${option.id}`" name="priorityCommoditiesStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionPriorityCommodities" @click="selectedOptionPriorityCommodities === option.id ? selectedOptionPriorityCommodities = '' : selectedOptionPriorityCommodities = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionPriorityCommodities" x-transition class="mt-3"
        x-effect="if (!selectedOptionPriorityCommodities) { $refs.priorityCommoditiesTextbox.value = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionPriorityCommodities === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionPriorityCommodities === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-ref="priorityCommoditiesTextbox" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="priorityCommodities" id="priorityCommodities"></textarea>
    </div>
</div>

<div x-data="{ selectedOptionExistingMarkets: '' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="existingMarkets" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Existing markets (nearby provinces, local, and other major markets even outside the region if applicable)
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`existingMarkets-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionExistingMarkets === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`existingMarkets-${option.id}`" name="existingMarketsStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionExistingMarkets" @click="selectedOptionExistingMarkets === option.id ? selectedOptionExistingMarkets = '' : selectedOptionExistingMarkets = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionExistingMarkets" x-transition class="mt-3"
        x-effect="if (!selectedOptionExistingMarkets) { $refs.existingMarketsTextbox.value = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionExistingMarkets === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionExistingMarkets === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-ref="existingMarketsTextbox" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="existingMarkets" id="existingMarkets"></textarea>
    </div>
</div>

<div x-data="{ selectedOptionSoilDescription: '' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="soilDescription" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Soil description (suitability and characteristics) e.g. sandy, loam, clay, terrain
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`soilDescription-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionSoilDescription === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`soilDescription-${option.id}`" name="soilDescriptionStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionSoilDescription" @click="selectedOptionSoilDescription === option.id ? selectedOptionSoilDescription = '' : selectedOptionSoilDescription = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionSoilDescription" x-transition class="mt-3"
        x-effect="if (!selectedOptionSoilDescription) { $refs.soilDescriptionTextbox.value = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionSoilDescription === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionSoilDescription === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-ref="soilDescriptionTextbox" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="soilDescription" id="soilDescription"></textarea>
    </div>
</div>

<div x-data="{ selectedOptionAgriculturalVision: '' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="agriculturalVision" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Agricultural vision or thrusts (e.g. mechanization, cooperation and association, high-value commodities)
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`agriculturalVision-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionAgriculturalVision === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`agriculturalVision-${option.id}`" name="agriculturalVisionStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionAgriculturalVision" @click="selectedOptionAgriculturalVision === option.id ? selectedOptionAgriculturalVision = '' : selectedOptionAgriculturalVision = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionAgriculturalVision" x-transition class="mt-3"
        x-effect="if (!selectedOptionAgriculturalVision) { $refs.agriculturalVisionTextbox.value = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionAgriculturalVision === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionAgriculturalVision === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-ref="agriculturalVisionTextbox" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="agriculturalVision" id="agriculturalVision"></textarea>
    </div>
</div>

<div x-data="{ selectedOptionWaterResources: '' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="waterResources" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Water resources (e.g. rivers, electric pumps, wells)
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`waterResources-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionWaterResources === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`waterResources-${option.id}`" name="waterResourcesStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionWaterResources" @click="selectedOptionWaterResources === option.id ? selectedOptionWaterResources = '' : selectedOptionWaterResources = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionWaterResources" x-transition class="mt-3"
        x-effect="if (!selectedOptionWaterResources) { $refs.waterResourcesTextbox.value = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionWaterResources === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionWaterResources === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-ref="waterResourcesTextbox" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="waterResources" id="waterResources"></textarea>
    </div>
</div>

<div x-data="{ selectedOptionClimateRainfall: '' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="climateRainfall" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Climate & Rainfall
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`climateRainfall-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionClimateRainfall === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`climateRainfall-${option.id}`" name="climateRainfallStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionClimateRainfall" @click="selectedOptionClimateRainfall === option.id ? selectedOptionClimateRainfall = '' : selectedOptionClimateRainfall = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionClimateRainfall" x-transition class="mt-3"
        x-effect="if (!selectedOptionClimateRainfall) { $refs.climateRainfallTextbox.value = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionClimateRainfall === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionClimateRainfall === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-ref="climateRainfallTextbox" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="climateRainfall" id="climateRainfall"></textarea>
    </div>
</div>

<div x-data="{ selectedOptionEnterprisesAvailable: '' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="enterprisesAvailable" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Enterprises available (e.g. small-scale processing)
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`enterprisesAvailable-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionEnterprisesAvailable === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`enterprisesAvailable-${option.id}`" name="enterprisesAvailableStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionEnterprisesAvailable" @click="selectedOptionEnterprisesAvailable === option.id ? selectedOptionEnterprisesAvailable = '' : selectedOptionEnterprisesAvailable = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionEnterprisesAvailable" x-transition class="mt-3"
        x-effect="if (!selectedOptionEnterprisesAvailable) { $refs.enterprisesAvailableTextbox.value = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionEnterprisesAvailable === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionEnterprisesAvailable === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-ref="enterprisesAvailableTextbox" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="enterprisesAvailable" id="enterprisesAvailable"></textarea>
    </div>
</div>
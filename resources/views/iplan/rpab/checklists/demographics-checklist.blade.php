<div x-data="{
    selectedOptionTotalPopulation: '{{ $iPlanRpabChecklist->totalPopulationStatus ?? '' }}',
    totalPopulation: '{{ $iPlanRpabChecklist->totalPopulationComments ?? '' }}' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="totalPopulation" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Total Population
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`totalPopulation-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionTotalPopulation === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`totalPopulation-${option.id}`" name="totalPopulationStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionTotalPopulation" @click="selectedOptionTotalPopulation === option.id ? selectedOptionTotalPopulation = '' : selectedOptionTotalPopulation = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionTotalPopulation" x-transition class="mt-3"
        x-effect="if (!selectedOptionTotalPopulation) { totalPopulation = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionTotalPopulation === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionTotalPopulation === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-model="totalPopulation" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="totalPopulation" id="totalPopulation"></textarea>
    </div>
</div>

<div x-data="{
    selectedOptionAverageHouseholdSize: '{{ $iPlanRpabChecklist->averageHouseholdSizeStatus ?? '' }}',
    averageHouseholdSize: '{{ $iPlanRpabChecklist->averageHouseholdSizeComments ?? '' }}' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="averageHouseholdSize" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Average Household Size
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`averageHouseholdSize-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionAverageHouseholdSize === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`averageHouseholdSize-${option.id}`" name="averageHouseholdSizeStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionAverageHouseholdSize" @click="selectedOptionAverageHouseholdSize === option.id ? selectedOptionAverageHouseholdSize = '' : selectedOptionAverageHouseholdSize = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionAverageHouseholdSize" x-transition class="mt-3"
        x-effect="if (!selectedOptionAverageHouseholdSize) { averageHouseholdSize = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionAverageHouseholdSize === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionAverageHouseholdSize === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-model="averageHouseholdSize" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="averageHouseholdSize" id="averageHouseholdSize"></textarea>
    </div>
</div>

<div x-data="{
    selectedOptionEducationPopulation: '{{ $iPlanRpabChecklist->educationPopulationStatus ?? '' }}',
    educationPopulation: '{{ $iPlanRpabChecklist->educationPopulationComments ?? '' }}' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="educationPopulation" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Education of Population <span class="italic text-sm dark:text-gray-400">(if available)</span>
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`educationPopulation-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionEducationPopulation === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`educationPopulation-${option.id}`" name="educationPopulationStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionEducationPopulation" @click="selectedOptionEducationPopulation === option.id ? selectedOptionEducationPopulation = '' : selectedOptionEducationPopulation = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionEducationPopulation" x-transition class="mt-3"
        x-effect="if (!selectedOptionEducationPopulation) { educationPopulation = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionEducationPopulation === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionEducationPopulation === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-model="educationPopulation" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="educationPopulation" id="educationPopulation"></textarea>
    </div>
</div>

<div x-data="{
    selectedOptionPopulation: '{{ $iPlanRpabChecklist->populationStatus ?? '' }}',
    population: '{{ $iPlanRpabChecklist->populationComments ?? '' }}' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="population" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Barangays, classifications, land area, no. of household, population
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`population-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionPopulation === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`population-${option.id}`" name="populationStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionPopulation" @click="selectedOptionPopulation === option.id ? selectedOptionPopulation = '' : selectedOptionPopulation = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionPopulation" x-transition class="mt-3"
        x-effect="if (!selectedOptionPopulation) { population = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionPopulation === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionPopulation === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-model="population" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="population" id="population"></textarea>
    </div>
</div>
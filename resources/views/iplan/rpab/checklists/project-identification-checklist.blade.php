<label for="eVsaMaps" class="dark:text-lime-500 leading-tight flex-1 text-sm md:text-base">
    &#x2022; E-VSA Maps and Statistics
</label>

<div x-data="{
    selectedOptionEvsa: '{{ $iPlanRpabChecklist->evsaStatus ?? '' }}',
    evsa: '{{ $iPlanRpabChecklist->evsaComments ?? '' }}' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="evsa" class="dark:text-green-600 leading-tight text-sm md:text-base">
            If low rank in e-VSA, we may discuss strong points on: (1) poverty incidence; (2) land suitability; (3) production; (4) market; (5) number of raisers (6) hogs inventory
            -5-year production area
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`evsa-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionEvsa === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`evsa-${option.id}`" name="evsaStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionEvsa" @click="selectedOptionEvsa === option.id ? selectedOptionEvsa = '' : selectedOptionEvsa = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionEvsa" x-transition class="mt-3"
        x-effect="if (!selectedOptionEvsa) { evsa = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionEvsa === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionEvsa === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-model="evsa" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="evsa" id="evsa"></textarea>
    </div>
</div>

<div x-data="{
    selectedOptionProductionArea: '{{ $iPlanRpabChecklist->productionAreaStatus ?? '' }}',
    productionArea: '{{ $iPlanRpabChecklist->productionAreaComments ?? '' }}' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="productionArea" class="dark:text-green-600 leading-tight text-sm md:text-base">
            5 year production area
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`productionArea-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionProductionArea === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`productionArea-${option.id}`" name="productionAreaStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionProductionArea" @click="selectedOptionProductionArea === option.id ? selectedOptionProductionArea = '' : selectedOptionProductionArea = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionProductionArea" x-transition class="mt-3"
        x-effect="if (!selectedOptionProductionArea) { productionArea = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionProductionArea === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionProductionArea === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-model="productionArea" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="productionArea" id="productionArea"></textarea>
    </div>
</div>

<label for="valueChainSummary" class="dark:text-lime-500 leading-tight flex-1 text-sm md:text-base">
    &#x2022; Value Chain Summary
</label>

<div x-data="{
    selectedOptionDiscussConstraint: '{{ $iPlanRpabChecklist->discussConstraintStatus ?? '' }}',
    discussConstraint: '{{ $iPlanRpabChecklist->discussConstraintComments ?? '' }}' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="discussConstraint" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Discuss constraint and intervention to which SP is linked (To be based on the draft VCA)
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`discussConstraint-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionDiscussConstraint === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`discussConstraint-${option.id}`" name="discussConstraintStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionDiscussConstraint" @click="selectedOptionDiscussConstraint === option.id ? selectedOptionDiscussConstraint = '' : selectedOptionDiscussConstraint = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionDiscussConstraint" x-transition class="mt-3"
        x-effect="if (!selectedOptionDiscussConstraint) { discussConstraint = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionDiscussConstraint === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionDiscussConstraint === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-model="discussConstraint" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="discussConstraint" id="discussConstraint"></textarea>
    </div>
</div>

<label for="commodityProfile" class="dark:text-lime-500 leading-tight flex-1 text-sm md:text-base">
    &#x2022; Commodity Profile
</label>

<div x-data="{
    selectedOptionAvailableProductForm: '{{ $iPlanRpabChecklist->availableProductFormStatus ?? '' }}',
    availableProductForm: '{{ $iPlanRpabChecklist->availableProductFormComments ?? '' }}' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="availableProductForm" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Available product forms
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`availableProductForm-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionAvailableProductForm === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`availableProductForm-${option.id}`" name="availableProductFormStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionAvailableProductForm" @click="selectedOptionAvailableProductForm === option.id ? selectedOptionAvailableProductForm = '' : selectedOptionAvailableProductForm = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionAvailableProductForm" x-transition class="mt-3"
        x-effect="if (!selectedOptionAvailableProductForm) { availableProductForm = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionAvailableProductForm === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionAvailableProductForm === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-model="availableProductForm" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="availableProductForm" id="availableProductForm"></textarea>
    </div>
</div>

<div x-data="{
    selectedOptionDiscussIntervention: '{{ $iPlanRpabChecklist->discussInterventionStatus ?? '' }}',
    discussIntervention: '{{ $iPlanRpabChecklist->discussInterventionComments ?? '' }}' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="discussIntervention" class="dark:text-green-600 leading-tight text-sm md:text-base">
            Discuss constraint and intervention to which SP is linked (see PCIP)
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`discussIntervention-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionDiscussIntervention === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`discussIntervention-${option.id}`" name="discussInterventionStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionDiscussIntervention" @click="selectedOptionDiscussIntervention === option.id ? selectedOptionDiscussIntervention = '' : selectedOptionDiscussIntervention = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionDiscussIntervention" x-transition class="mt-3"
        x-effect="if (!selectedOptionDiscussIntervention) { discussIntervention = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionDiscussIntervention === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionDiscussIntervention === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-model="discussIntervention" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="discussIntervention" id="discussIntervention"></textarea>
    </div>
</div>

<label for="proposedEnterprise" class="dark:text-lime-500 leading-tight flex-1 text-sm md:text-base">
    &#x2022; Proposed/Existing Enterprises to be supported by the Subproject
</label>

<div x-data="{
    selectedOptionValueAddingMechanism: '{{ $iPlanRpabChecklist->valueAddingMechanismStatus ?? '' }}',
    valueAddingMechanism: '{{ $iPlanRpabChecklist->valueAddingMechanismComments ?? '' }}' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="valueAddingMechanism" class="dark:text-green-600 leading-tight text-sm md:text-base">
            How does the SP improve the value-adding mechanism?
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`valueAddingMechanism-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionValueAddingMechanism === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`valueAddingMechanism-${option.id}`" name="valueAddingMechanismStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionValueAddingMechanism" @click="selectedOptionValueAddingMechanism === option.id ? selectedOptionValueAddingMechanism = '' : selectedOptionValueAddingMechanism = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionValueAddingMechanism" x-transition class="mt-3"
        x-effect="if (!selectedOptionValueAddingMechanism) { valueAddingMechanism = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionValueAddingMechanism === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionValueAddingMechanism === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-model="valueAddingMechanism" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="valueAddingMechanism" id="valueAddingMechanism"></textarea>
    </div>
</div>

<div x-data="{
    selectedOptionIncreaseValue: '{{ $iPlanRpabChecklist->increaseValueStatus ?? '' }}',
    increaseValue: '{{ $iPlanRpabChecklist->increaseValueComments ?? '' }}' }" x-cloak>
    <div class="flex items-center space-x-3">
        <label for="increaseValue" class="dark:text-green-600 leading-tight text-sm md:text-base">
            How does this increase value to the commodity?
        </label>
    </div>

    <div class="flex items-center space-x-6 mt-1">
        <template x-for="option in [{ id: 'complied', label: 'Complied', color: 'green' }, { id: 'notComplied', label: 'Not Complied', color: 'red' }]" :key="option.id">
            <label :for="`increaseValue-${option.id}`" class="flex items-center space-x-2 cursor-pointer">
                <div class="w-4 h-4 flex items-center justify-center border-2 rounded-full transition-all duration-300"
                    :class="selectedOptionIncreaseValue === option.id ? `bg-${option.color}-500 border-${option.color}-600 text-white` : 'border-gray-500 text-transparent'">
                </div>
                <input type="radio" :id="`increaseValue-${option.id}`" name="increaseValueStatus" :value="option.id" class="hidden"
                    x-model="selectedOptionIncreaseValue" @click="selectedOptionIncreaseValue === option.id ? selectedOptionIncreaseValue = '' : selectedOptionIncreaseValue = option.id">
                <span class="text-sm md:text-base dark:text-gray-300" x-text="option.label"></span>
            </label>
        </template>
    </div>

    <div x-cloak style="display: none !important;" x-show="selectedOptionIncreaseValue" x-transition class="mt-3"
        x-effect="if (!selectedOptionIncreaseValue) { increaseValue = '' }">
        <label class="block text-sm font-medium"
            :class="selectedOptionIncreaseValue === 'notComplied' ? 'dark:text-gray-300' : 'dark:text-gray-300'"
            x-html="selectedOptionIncreaseValue === 'notComplied'
                                                ? 'Comments <span class=\'italic text-red-500\'>(Required)</span>' 
                                                : 'Comments <span class=\'italic text-gray-500\'>(Optional)</span>'">
        </label>
        <textarea x-model="increaseValue" class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 p-2"
            rows="2" name="increaseValue" id="increaseValue"></textarea>
    </div>
</div>
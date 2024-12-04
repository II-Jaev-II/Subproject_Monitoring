<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="bg-white border border-gray-300 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('iplan.update-subproject', $subproject->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="checklistId" value="{{ $checklistId }}" hidden>
                        <input type="text" name="subprojectId" value="{{ $subproject->id }}" hidden>

                        <div class="flex items-center space-x-4 mb-6">
                            <label for="reviewDate" class="dark:text-lime-500 text-black text-sm md:text-base">Date of Review <span
                                    class="text-red-500">*</span></label>
                            <input type="date" name="reviewDate" id="reviewDate" value="{{ old('reviewDate') }}"
                                class="dark:bg-gray-900 rounded-md dark:[color-scheme:dark]">
                            @if ($errors->has('reviewDate'))
                            <div class="text-red-600 mt-2 mb-2">
                                {{ $errors->first('reviewDate') }}
                            </div>
                            @endif
                        </div>

                        <div class="mb-4">
                            <h1 for="iplanChecklist" class="dark:text-lime-500 text-base md:text-lg">Edit I-PLAN Checklist</h1>
                            <hr class="border-2 dark:border-lime-500 border-green-500 mb-2">
                        </div>

                        <label for="priorityCommodity" class="dark:text-lime-500 text-sm md:text-base">Priority commodity supported by the SP
                            Proposal</label>
                        <div class="flex items-center gap-4 mt-2 mb-2">
                            @foreach ($commodities as $commodity)
                            <div class="flex items-center gap-2">
                                <input class="dark:bg-gray-800 rounded-sm" type="checkbox" name="commodities[]"
                                    value="{{ $commodity }}" checked disabled>
                                <label for="{{ strtolower($commodity) }}">{{ $commodity }}</label>
                            </div>
                            @endforeach
                        </div>

                        <div>
                            @foreach ($selectedCommodities as $commodity)
                            @if (strtolower($commodity) !== 'others')
                            <div class="mt-2 mb-2">
                                <div class="grid grid-cols-2 gap-2">
                                    <div>
                                        <label for="evsaRank{{ $commodity }}" class="dark:text-green-600 text-xs md:text-base">E-VSA
                                            Rank ({{ $commodity }})</label>
                                        <input type="text" name="evsaRank{{ $commodity }}"
                                            id="evsaRank{{ $commodity }}"
                                            value="{{ old('evsaRank' . $commodity, $commodityData[$commodity]['evsaRank'] ?? '') }}"
                                            class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                                            step="1" min="0" inputmode="numeric"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                                    </div>
                                    <div>
                                        <label for="compositeIndex{{ $commodity }}"
                                            class="dark:text-green-600 text-xs md:text-base">Composite Index
                                            ({{ $commodity }})
                                        </label>
                                        <input type="text" name="compositeIndex{{ $commodity }}"
                                            id="compositeIndex{{ $commodity }}"
                                            value="{{ old('compositeIndex' . $commodity, $commodityData[$commodity]['compositeIndex'] ?? '') }}"
                                            class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                                            inputmode="decimal"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')"
                                            required>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>

                        <div x-data="{ selectedCommodities: [] }" x-cloak>
                            <label for="additionalCommodity" class="dark:text-green-600 text-sm md:text-base">
                                Add additional commodity
                            </label>
                            <div class="grid grid-cols-2 md:flex items-center gap-4 mt-2 mb-2">
                                @foreach ($unselectedCommodities as $commodity)
                                <div class="flex items-center gap-2">
                                    <input class="dark:bg-gray-800 rounded-sm" type="checkbox"
                                        name="commodities[]" value="{{ $commodity }}"
                                        x-model="selectedCommodities">
                                    <label for="{{ strtolower($commodity) }}">{{ $commodity }}</label>
                                </div>
                                @endforeach
                            </div>

                            <template x-for="commodity in selectedCommodities" :key="commodity">
                                <div x-cloak x-show="selectedCommodities.includes(commodity)"
                                    x-transition
                                    class="mt-2 mb-2">
                                    <div class="grid grid-cols-2 gap-2">
                                        <template x-if="commodity !== 'Others'">
                                            <div>
                                                <label :for="'evsaRank' + commodity" class="dark:text-green-600 text-xs md:text-base">
                                                    E-VSA Rank <span x-text="commodity"></span>
                                                </label>
                                                <input type="text" :name="'evsaRank' + commodity"
                                                    :id="'evsaRank' + commodity"
                                                    x-ref="'evsaRank' + commodity"
                                                    class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                                                    x-bind:required="commodity !== 'Others' && selectedCommodities.includes(commodity)"
                                                    step="1" min="0" inputmode="numeric"
                                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                            </div>
                                        </template>
                                        <template x-if="commodity !== 'Others'">
                                            <div>
                                                <label :for="'compositeIndex' + commodity"
                                                    class="dark:text-green-600 text-xs md:text-base">
                                                    Composite Index <span x-text="commodity"></span>
                                                </label>
                                                <input type="text" :name="'compositeIndex' + commodity"
                                                    :id="'compositeIndex' + commodity"
                                                    x-ref="'compositeIndex' + commodity"
                                                    class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                                                    x-bind:required="commodity !== 'Others' && selectedCommodities.includes(commodity)"
                                                    inputmode="decimal"
                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')">
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </template>
                        </div>

                        <label for="justification" class="dark:text-lime-500 text-sm md:text-base">Justification if rank is
                            higher
                            than
                            10 and
                            if composite index is below 0.4</label>
                        <div>
                            <div class="flex flex-col mt-2 mb-2">
                                <label for="explanation" class="dark:text-green-600 text-sm md:text-base">Please explain:</label>
                                <textarea name="explanation" id="explanation" rows="4"
                                    class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">{{ $checklist->explanation ?? '' }}</textarea>
                                @if (!$checklist->justificationFile)
                                <div>
                                    <label for="justificationFile" class="dark:text-green-600 text-sm md:text-base">Attach a
                                        File</label>
                                    <input
                                        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full md:w-1/2 mt-1 py-1 px-2"
                                        type="file" name="justificationFile" id="justificationFile">
                                    @if ($errors->has('justificationFile'))
                                    <div class="text-red-600 mt-2 mb-2">
                                        {{ $errors->first('justificationFile') }}
                                    </div>
                                    @endif
                                </div>
                                @else
                                <div x-data="{ showFileInput: false }" class="">
                                    <label for="justificationFileInput" class="dark:text-green-600 text-sm md:text-base">Justification File</label>
                                    <div class="flex items-center mt-1 rounded-md overflow-hidden">
                                        <button type="button"
                                            @click="showFileInput = !showFileInput"
                                            class="flex items-center justify-center px-3 py-2 bg-blue-400 dark:bg-sky-500 text-gray-700 dark:text-white text-sm font-medium hover:bg-blue-500 dark:hover:bg-sky-600 transition ease-in-out duration-150 h-full">
                                            <img src="/images/pencil-square.svg" alt="Edit" width="22" height="22">
                                        </button>

                                        <input
                                            id="justificationFileInput"
                                            type="file"
                                            name="justificationFile"
                                            x-show="showFileInput"
                                            class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-md"
                                            style="display: none;">

                                        <a
                                            x-show="!showFileInput"
                                            class="flex items-center gap-2 border-l px-3 py-2 text-sm font-medium rounded-r-md text-white dark:text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 h-full"
                                            href="{{ asset($checklist->justificationFile) }}"
                                            target="_blank">
                                            <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">
                                            View File
                                        </a>
                                    </div>
                                    @if ($errors->has('justificationFile'))
                                    <div class="text-red-600 mt-2 mb-2">
                                        {{ $errors->first('justificationFile') }}
                                    </div>
                                    @endif
                                </div>
                                @endif
                            </div>
                        </div>
                        <hr class="border-2 dark:border-lime-500 border-green-500 mb-2">
                        <div class="mb-2">
                            <label for="linkedVca" class="dark:text-lime-500 text-sm md:text-base">Linked to VCA?</label>
                            <div class="flex items-center gap-2">
                                @foreach (['Yes', 'No'] as $option)
                                <div class="flex items-center gap-2">
                                    <input class="dark:bg-gray-800" type="radio"
                                        {{ isset($checklist->linkedVca) && $checklist->linkedVca === $option ? 'checked' : '' }}
                                        disabled>
                                    <input type="hidden" name="linkedVca" class="dark:bg-gray-800"
                                        value="{{ $checklist->linkedVca }}">
                                    <label for="vca{{ $option }}">{{ $option }}</label>
                                </div>
                                @endforeach
                            </div>
                            @if (isset($checklist) &&
                            ($checklist->valueChainSegment ||
                            $checklist->opportunity ||
                            $checklist->specificIntervention ||
                            $checklist->pageMatrixVca))
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2">
                                @foreach (['valueChainSegment' => 'Value Chain Segment', 'opportunity' => 'Opportunity or Constraint Being Addressed', 'specificIntervention' => 'Specific Intervention'] as $field => $label)
                                <div>
                                    <label for="{{ $field }}"
                                        class="dark:text-green-600 text-sm md:text-base">{{ $label }}</label>
                                    <input type="text"
                                        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                                        name="{{ $field }}" value="{{ $checklist->$field }}"
                                        required>
                                </div>
                                @endforeach
                                <div x-data="{ showFileInput: false }" class="">
                                    <label for="pageMatrixVcaInput" class="dark:text-green-600 text-sm md:text-base">Page of VCA</label>
                                    <div class="flex items-center mt-1 rounded-md overflow-hidden">
                                        <button type="button"
                                            @click="showFileInput = !showFileInput"
                                            class="flex items-center justify-center px-3 py-2 bg-blue-400 dark:bg-sky-500 text-gray-700 dark:text-white text-sm font-medium hover:bg-blue-500 dark:hover:bg-sky-600 transition ease-in-out duration-150 h-full">
                                            <img src="/images/pencil-square.svg" alt="Edit" width="22" height="22">
                                        </button>

                                        <input
                                            id="pageMatrixVcaInput"
                                            type="file"
                                            name="pageMatrixVca"
                                            x-show="showFileInput"
                                            class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-md w-full"
                                            style="display: none;">

                                        <a
                                            x-show="!showFileInput"
                                            class="flex items-center gap-2 border-l px-3 py-2 text-sm font-medium rounded-r-md text-white dark:text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 h-full"
                                            href="{{ asset($checklist->pageMatrixVca) }}"
                                            target="_blank">
                                            <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">
                                            View File
                                        </a>
                                    </div>
                                    @if ($errors->has('pageMatrixVca'))
                                    <div class="text-red-600 mt-2 mb-2">
                                        {{ $errors->first('pageMatrixVca') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endif
                        </div>
                        <hr class="border-2 dark:border-lime-500 border-green-500 mb-2">
                        <div x-data="{ pcip: '{{ $checklist->pcip ?? old('pcip', '') }}' }" x-cloak class="mb-2 mt-4">
                            <label for="pcip" class="dark:text-lime-500 text-sm md:text-base">Aligned with the
                                PCIP?</label>
                            <div class="flex items-center gap-2 mb-2">
                                @foreach (['Yes', 'No'] as $pcipOption)
                                <div class="flex items-center gap-2">
                                    <input class="dark:bg-gray-800" type="radio" name="pcip"
                                        id="pcip{{ $pcipOption }}" value="{{ $pcipOption }}"
                                        @click="pcip = '{{ $pcipOption }}'"
                                        {{ (isset($checklist->pcip) && $checklist->pcip === $pcipOption) || old('pcip') === $pcipOption ? 'checked' : '' }}>
                                    <label for="pcip{{ $pcipOption }}">{{ $pcipOption }}</label>
                                </div>
                                @endforeach
                            </div>

                            <div x-cloak x-show="pcip === 'Yes'" x-transition
                                x-effect="if (!pcip.includes('Yes')) { $refs.page.value = ''; }">
                                <div class="mb-2">
                                    <label for="page" class="dark:text-green-600 text-sm md:text-base">Page</label>
                                    <input type="text" name="page" id="page"
                                        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-32 mt-1 py-1 px-2"
                                        value="{{ $checklist->page ?? old('page') }}" x-ref="page"
                                        :required="pcip.includes('Yes')" step="1" min="0"
                                        inputmode="numeric"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                    @if ($errors->has('page'))
                                    <div class="text-red-600 mt-2 mb-2">
                                        {{ $errors->first('page') }}
                                    </div>
                                    @endif
                                </div>
                                @if ($checklist->pageMatrixPcip)
                                <div x-data="{ showFileInput: false }">
                                    <label for="pageMatrixPcipInput" class="dark:text-green-600 text-sm md:text-base">Page of VCA</label>
                                    <div class="flex items-center mt-1 rounded-md overflow-hidden">
                                        <button type="button"
                                            @click="showFileInput = !showFileInput"
                                            class="flex items-center justify-center px-3 py-2 bg-blue-400 dark:bg-sky-500 text-gray-700 dark:text-white text-sm font-medium hover:bg-blue-500 dark:hover:bg-sky-600 transition ease-in-out duration-150 h-full">
                                            <img src="/images/pencil-square.svg" alt="Edit" width="22" height="22">
                                        </button>

                                        <input
                                            id="pageMatrixPcipInput"
                                            type="file"
                                            name="pageMatrixPcip"
                                            x-show="showFileInput"
                                            class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-md w-full md:w-1/2"
                                            style="display: none;">

                                        <a
                                            x-show="!showFileInput"
                                            class="flex items-center gap-2 border-l px-3 py-2 text-sm font-medium rounded-r-md text-white dark:text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 h-full"
                                            href="{{ asset($checklist->pageMatrixPcip) }}"
                                            target="_blank">
                                            <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">
                                            View File
                                        </a>
                                    </div>
                                    @if ($errors->has('pageMatrixPcip'))
                                    <div class="text-red-600 mt-2 mb-2">
                                        {{ $errors->first('pageMatrixPcip') }}
                                    </div>
                                    @endif
                                </div>
                                @else
                                <input
                                    class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-1/4 mt-1 py-1 px-2"
                                    type="file" name="pageMatrixPcip" id="pageMatrixPcip"
                                    x-bind:required="pcip === 'Yes'">
                                @endif
                            </div>
                            @if ($errors->has('pcip'))
                            <div class="text-red-600 mt-2 mb-2">
                                {{ $errors->first('pcip') }}
                            </div>
                            @endif
                        </div>
                        <hr class="border-2 dark:border-lime-500 border-green-500 mb-2">
                        <label for="crva" class="dark:text-lime-500 text-sm md:text-base">CRVA</label>

                        <div class="mb-2">
                            <label for="sensitivity" class="dark:text-green-600 text-sm md:text-base">Sensitivity <span
                                    class="text-red-500">*</span></label>
                            <select name="sensitivity" id="sensitivity"
                                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">
                                <option {{ old('sensitivity') ? '' : 'selected' }}>{{ $checklist->sensitivity }}
                                </option>
                                <option value="-0.50 - -1.00 - Gain"
                                    {{ old('sensitivity') == '-0.50 - -1.00 - Gain' ? 'selected' : '' }}>-0.50 -
                                    -1.00 - Gain</option>
                                <option value="-0.25 - -0.50 - Gain"
                                    {{ old('sensitivity') == '-0.25 - -0.50 - Gain' ? 'selected' : '' }}>-0.25 -
                                    -0.50 - Gain</option>
                                <option value="-0.05 - -0.25 - Gain"
                                    {{ old('sensitivity') == '-0.05 - -0.25 - Gain' ? 'selected' : '' }}>-0.05 -
                                    -0.25 - Gain</option>
                                <option value="0 - No Change"
                                    {{ old('sensitivity') == '0 - No Change' ? 'selected' : '' }}>0 - No Change
                                </option>
                                <option value="0.05 - 0.25 - Loss"
                                    {{ old('sensitivity') == '0.05 - 0.25 - Loss' ? 'selected' : '' }}>0.05 - 0.25
                                    - Loss</option>
                                <option value="0.25 - 0.50 - Loss"
                                    {{ old('sensitivity') == '0.25 - 0.50 - Loss' ? 'selected' : '' }}>0.25 - 0.50
                                    - Loss</option>
                                <option value="0.50 - 1.00 - Loss"
                                    {{ old('sensitivity') == '0.50 - 1.00 - Loss' ? 'selected' : '' }}>0.50 - 1.00
                                    - Loss</option>
                            </select>
                            @if ($errors->has('sensitivity'))
                            <div class="text-red-600 mt-2 mb-2">
                                {{ $errors->first('sensitivity') }}
                            </div>
                            @endif
                        </div>
                        <div class="mb-2">
                            <label for="exposure" class="dark:text-green-600 text-sm md:text-base">Exposure <span
                                    class="text-red-500">*</span></label>
                            <select name="exposure" id="exposure"
                                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">
                                <option {{ old('exposure') ? '' : 'selected' }}>{{ $checklist->exposure }}
                                </option>
                                <option value="0.00 - 0.20 Very Low"
                                    {{ old('exposure') == '0.00 - 0.20 Very Low' ? 'selected' : '' }}>0.00 - 0.20
                                    Very Low</option>
                                <option value="0.20 - 0.40 Low"
                                    {{ old('exposure') == '0.20 - 0.40 Low' ? 'selected' : '' }}>0.20 - 0.40 Low
                                </option>
                                <option value="0.40 - 0.60 Moderate"
                                    {{ old('exposure') == '0.40 - 0.60 Moderate' ? 'selected' : '' }}>0.40 - 0.60
                                    Moderate</option>
                                <option value="0.60 - 0.80 High"
                                    {{ old('exposure') == '0.60 - 0.80 High' ? 'selected' : '' }}>0.60 - 0.80 High
                                </option>
                                <option value="0.80 - 1.00 Very High"
                                    {{ old('exposure') == '0.80 - 1.00 Very High' ? 'selected' : '' }}>0.80 - 1.00
                                    Very High</option>
                            </select>
                            @if ($errors->has('exposure'))
                            <div class="text-red-600 mt-2 mb-2">
                                {{ $errors->first('exposure') }}
                            </div>
                            @endif
                        </div>
                        <div class="mb-2">
                            <label for="adaptiveCapacity" class="dark:text-green-600 text-sm md:text-base">Adaptive Capacity <span
                                    class="text-red-500">*</span></label>
                            <select name="adaptiveCapacity" id="adaptiveCapacity"
                                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">
                                <option {{ old('adaptiveCapacity') ? '' : 'selected' }}>
                                    {{ $checklist->adaptiveCapacity }}
                                </option>
                                <option value="0.00 - 0.20 Very Low"
                                    {{ old('adaptiveCapacity') == '0.00 - 0.20 Very Low' ? 'selected' : '' }}>0.00
                                    - 0.20 Very Low</option>
                                <option value="0.20 - 0.40 Low"
                                    {{ old('adaptiveCapacity') == '0.20 - 0.40 Low' ? 'selected' : '' }}>0.20 -
                                    0.40 Low</option>
                                <option value="0.40 - 0.60 Moderate"
                                    {{ old('adaptiveCapacity') == '0.40 - 0.60 Moderate' ? 'selected' : '' }}>0.40
                                    - 0.60 Moderate</option>
                                <option value="0.60 - 0.80 High"
                                    {{ old('adaptiveCapacity') == '0.60 - 0.80 High' ? 'selected' : '' }}>0.60 -
                                    0.80 High</option>
                                <option value="0.80 - 1.00 Very High"
                                    {{ old('adaptiveCapacity') == '0.80 - 1.00 Very High' ? 'selected' : '' }}>0.80
                                    - 1.00 Very High</option>
                            </select>
                            @if ($errors->has('adaptiveCapacity'))
                            <div class="text-red-600 mt-2 mb-2">
                                {{ $errors->first('adaptiveCapacity') }}
                            </div>
                            @endif
                        </div>
                        <div class="mb-2">
                            <label for="overallVulnerability" class="dark:text-green-600 text-sm md:text-base">Overall Vulnerability
                                <span class="text-red-500">*</span></label>
                            <select name="overallVulnerability" id="overallVulnerability"
                                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">
                                <option {{ old('overallVulnerability') ? '' : 'selected' }}>
                                    {{ $checklist->overallVulnerability }}
                                </option>
                                <option value="0.00 - 0.20 Very Low"
                                    {{ old('overallVulnerability') == '0.00 - 0.20 Very Low' ? 'selected' : '' }}>
                                    0.00 - 0.20 Very Low</option>
                                <option value="0.20 - 0.40 Low"
                                    {{ old('overallVulnerability') == '0.20 - 0.40 Low' ? 'selected' : '' }}>0.20 -
                                    0.40 Low</option>
                                <option value="0.40 - 0.60 Moderate"
                                    {{ old('overallVulnerability') == '0.40 - 0.60 Moderate' ? 'selected' : '' }}>
                                    0.40 - 0.60 Moderate</option>
                                <option value="0.60 - 0.80 High"
                                    {{ old('overallVulnerability') == '0.60 - 0.80 High' ? 'selected' : '' }}>0.60
                                    - 0.80 High</option>
                                <option value="0.80 - 1.00 Very High"
                                    {{ old('overallVulnerability') == '0.80 - 1.00 Very High' ? 'selected' : '' }}>
                                    0.80 - 1.00 Very High</option>
                            </select>
                            @if ($errors->has('overallVulnerability'))
                            <div class="text-red-600 mt-2 mb-2">
                                {{ $errors->first('overallVulnerability') }}
                            </div>
                            @endif
                        </div>
                        <div class="mb-2">
                            <label for="recommendation" class="dark:text-green-600 text-sm md:text-base">Recommendation <span
                                    class="text-red-500">*</span></label>
                            <textarea name="recommendation" id="recommendation" rows="4"
                                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">{{ old('recommendation', $checklist->recommendation) }}</textarea>
                            @if ($errors->has('recommendation'))
                            <div class="text-red-600 mt-2 mb-2">
                                {{ $errors->first('recommendation') }}
                            </div>
                            @endif
                        </div>
                        <div class="mb-2">
                            <label for="generalRecommendation" class="dark:text-green-600 text-sm md:text-base">General
                                Recommendations <span class="text-red-500">*</span></label>
                            <textarea name="generalRecommendation" id="generalRecommendation" rows="4"
                                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">{{ old('generalRecommendation', $checklist->generalRecommendation) }}</textarea>
                            @if ($errors->has('generalRecommendation'))
                            <div class="text-red-600 mt-2 mb-2">
                                {{ $errors->first('generalRecommendation') }}
                            </div>
                            @endif
                        </div>

                        <div class="flex justify-end mt-2">
                            <button type="submit"
                                class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white dark:text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2">
                                <img src="/images/check2-square.svg" alt="Save" width="22"
                                    height="22">
                                Update Subproject
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>
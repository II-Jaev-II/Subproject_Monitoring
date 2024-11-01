<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('iplan.store-subproject') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="subprojectId" value="{{ $subproject->id }}" hidden>
                        <div class="mb-4">
                            <h1 for="iplanChecklist" class="dark:text-lime-500 text-2xl">IPLAN Checklist</h1>
                        </div>
                        <label for="priorityCommodity" class="dark:text-green-600">Priority commodity supported by the SP Proposal</label>
                        <div x-data="{ selectedCommodities: [] }" x-cloak>
                            @include('iplan.components.commodity-checkbox')
                            @if ($errors->has('commodities'))
                            <div class="text-red-600 mb-2">
                                {{ $errors->first('commodities') }}
                            </div>
                            @endif
                            <div>
                                @include('iplan.components.selected-commodity-inputs')
                            </div>
                        </div>

                        <label for="justification" class="dark:text-green-600">Justification if rank is higher than 10 and if composite index is below 0.4</label>
                        <div>
                            <div class="flex flex-col mt-2 mb-2">
                                <label for="explain" class="dark:text-green-600">Please explain:</label>
                                <textarea name="explanation" id="explanation" rows="4" class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1">{{ old('explanation') }}</textarea>
                                <label for="justificationFile" class="dark:text-green-600">Attach a File</label>
                                <input class="block border-1 rounded-md border-gray-700 bg-gray-900 w-1/2 mt-1 py-1 px-2" type="file" name="justificationFile" id="justificationFile">
                                @if ($errors->has('justificationFile'))
                                <div class="text-red-600 mt-2 mb-2">
                                    {{ $errors->first('justificationFile') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div x-data="{ linkedVca: '{{ old('linkedVca') }}' }" x-cloak>
                            <label for="linkedVca" class="dark:text-green-600">Linked to VCA?</label>
                            <div class="flex items-center gap-2">
                                <div class="flex items-center gap-2">
                                    <input class="dark:bg-gray-800" type="radio" name="linkedVca" id="linkedVcaYes" value="Yes" @click="linkedVca = 'Yes'"
                                        {{ old('linkedVca') === 'Yes' ? 'checked' : '' }}>
                                    <label for="linkedVcaYes">Yes</label>
                                </div>
                                <div class="flex items-center gap-2">
                                    <input class="dark:bg-gray-800" type="radio" name="linkedVca" id="linkedVcaNo" value="No" @click="linkedVca = 'No'"
                                        {{ old('linkedVca') === 'No' ? 'checked' : '' }}>
                                    <label for="linkedVcaNo">No</label>
                                </div>
                            </div>
                            <div x-cloak style="display: none !important" x-show="linkedVca === 'Yes'" x-transition
                                x-effect="if (!linkedVca.includes('Yes')) { $refs.valueChainSegment.value = ''; $refs.opportunity.value = ''; $refs.specificIntervention.value = ''; }">
                                @include('iplan.components.vca-inputs')
                            </div>
                            @if ($errors->has('linkedVca'))
                            <div class="text-red-600 mt-2 mb-2">
                                {{ $errors->first('linkedVca') }}
                            </div>
                            @endif
                        </div>

                        <div x-data="{ pcip: '{{ old('pcip') }}' }" x-cloak class="mt-2 mb-4">
                            <label for="pcip" class="dark:text-green-600">Aligned with the PCIP?</label>
                            <div class="flex items-center gap-2">
                                <div class="flex items-center gap-2">
                                    <input class="dark:bg-gray-800" type="radio" name="pcip" id="pcipYes" value="Yes" @click="pcip = 'Yes'"
                                        {{ old('pcip') === 'Yes' ? 'checked' : '' }}>
                                    <label for="pcipYes">Yes</label>
                                </div>
                                <div class="flex items-center gap-2">
                                    <input class="dark:bg-gray-800" type="radio" name="pcip" id="pcipNo" value="No" @click="pcip = 'No'"
                                        {{ old('pcip') === 'No' ? 'checked' : '' }}>
                                    <label for="pcipNo">No</label>
                                </div>
                            </div>
                            <div x-cloak style="display: none !important" x-show="pcip === 'Yes'" x-transition
                                x-effect="if (!pcip.includes('Yes')) { $refs.page.value = ''; }">
                                <div>
                                    <label for="page" class="dark:text-green-600">Page</label>
                                    <input class="block border-1 rounded-md border-gray-700 bg-gray-900 w-32 mt-1 py-1 px-2" value="{{ old('page') }}" x-ref="page" type="text" name="page" id="page"
                                        :required="pcip.includes('Yes')">
                                    @if ($errors->has('page'))
                                    <div class="text-red-600 mt-2 mb-2">
                                        {{ $errors->first('page') }}
                                    </div>
                                    @endif
                                </div>
                                <div>
                                    <label for="pageMatrixPcip" class="dark:text-green-600">Page of Matrix</label>
                                    <input class="block border-1 rounded-md border-gray-700 bg-gray-900 w-1/2 mt-1 py-1 px-2" type="file" name="pageMatrixPcip" id="pageMatrixPcip"
                                        :required="pcip.includes('Yes')">
                                    @if ($errors->has('pageMatrixPcip'))
                                    <div class="text-red-600 mt-2 mb-2">
                                        {{ $errors->first('pageMatrixPcip') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @if ($errors->has('pcip'))
                            <div class="text-red-600 mt-2 mb-2">
                                {{ $errors->first('pcip') }}
                            </div>
                            @endif
                        </div>

                        <label for="crva" class="dark:text-lime-500 text-2xl">CRVA</label>
                        <div class="grid grid-rows-1 gap-2 mt-4 mb-2">
                            @include('iplan.components.crva-inputs')
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray dark:text-white bg-gray-400 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2">
                                <img src="/images/check2-square.svg" alt="Save" width="22" height="22">
                                Validate Subproject
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
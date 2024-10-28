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
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <h1 for="iplanChecklist" class="dark:text-lime-500 text-2xl">IPLAN Checklist</h1>
                        </div>
                        <label for="priorityCommodity" class="dark:text-green-600">Priority commodity supported by the SP Proposal</label>
                        <div class="flex items-center gap-4 mt-2 mb-2">
                            @include('iplan.commodity-checklist')
                        </div>

                        <div x-data="{ rank: '', compositeIndex: '' }" x-cloak>
                            <label for="rank" class="dark:text-green-600">E-VSA Rank: Is the municipality ranked within the top 10?</label>
                            <div class="flex items-center gap-2 mb-2">
                                <div class="flex items-center gap-2">
                                    <input class="dark:bg-gray-800" type="radio" name="rank" id="rankYes" value="Yes" @click="rank = 'Yes'">
                                    <label for="rankYes">Yes</label>
                                </div>
                                <div class="flex items-center gap-2">
                                    <input class="dark:bg-gray-800" type="radio" name="rank" id="rankNo" value="No" @click="rank = 'No'">
                                    <label for="rankNo">No</label>
                                </div>
                            </div>

                            <label for="compositeIndex" class="dark:text-green-600">Composite Index: 0.4 or higher?</label>
                            <div class="flex items-center gap-2 mb-2">
                                <div class="flex items-center gap-2">
                                    <input class="dark:bg-gray-800" type="radio" name="compositeIndex" id="compositeIndexYes" value="Yes" @click="compositeIndex = 'Yes'">
                                    <label for="compositeIndexYes">Yes</label>
                                </div>
                                <div class="flex items-center gap-2">
                                    <input class="dark:bg-gray-800" type="radio" name="compositeIndex" id="compositeIndexNo" value="No" @click="compositeIndex = 'No'">
                                    <label for="compositeIndexNo">No</label>
                                </div>
                            </div>

                            <div x-cloak style="display: none !important" x-show="rank === 'No' && compositeIndex === 'No'" class="mt-2 mb-2">
                                <label for="justification" class="dark:text-green-600">Justification in case of deviation (is the justification accepted)?</label>
                                <div x-data="{ justification: '' }" x-cloak>
                                    <div class="flex items-center gap-2">
                                        <div class="flex items-center gap-2">
                                            <input class="dark:bg-gray-800" type="radio" name="justification" id="justificationYes" value="Yes" @click="justification = 'Yes'">
                                            <label for="justificationYes">Yes</label>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <input class="dark:bg-gray-800" type="radio" name="justification" id="justificationNo" value="No" @click="justification = 'No'">
                                            <label for="justificationNo">No</label>
                                        </div>
                                    </div>
                                    <div x-cloak style="display: none !important" x-show="justification === 'Yes'" class="flex flex-col mt-2">
                                        <label for="explain" class="dark:text-green-600">Please explain:</label>
                                        <textarea name="explanation" id="explanation" rows="4" class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"></textarea>
                                        <label for="justificationFile" class="dark:text-green-600">Attach a File</label>
                                        <input class="block border-1 rounded-md border-gray-700 bg-gray-900 w-1/2 mt-1 py-1 px-2" type="file" name="justificationFile" id="justificationFile">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div x-data="{ linkedVca: '' }" x-cloak>
                            <label for="linkedVca" class="dark:text-green-600">Linked to VCA?</label>
                            <div class="flex items-center gap-2">
                                <div class="flex items-center gap-2">
                                    <input class="dark:bg-gray-800" type="radio" name="linkedVca" id="linkedVcaYes" value="Yes" @click="linkedVca = 'Yes'">
                                    <label for="linkedVcaYes">Yes</label>
                                </div>
                                <div class="flex items-center gap-2">
                                    <input class="dark:bg-gray-800" type="radio" name="linkedVca" id="linkedVcaNo" value="No" @click="linkedVca = 'No'">
                                    <label for="linkedVcaNo">No</label>
                                </div>
                            </div>
                            <div x-cloak style="display: none !important" x-show="linkedVca === 'Yes'">
                                <div class="grid grid-cols-2 gap-2 mt-2">
                                    <div>
                                        <label for="valueChainSegment" class="dark:text-green-600">Value Chain Segment</label>
                                        <input class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1" type="text" name="valueChainSegment" id="valueChainSegment">
                                    </div>
                                    <div>
                                        <label for="opportunity" class="dark:text-green-600">Opportunity or Constraint Being Addressed</label>
                                        <input class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1" type="text" name="opportunity" id="opportunity">
                                    </div>
                                    <div>
                                        <label for="specificIntervention" class="dark:text-green-600">Specific Intervention</label>
                                        <input class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1" type="text" name="specificIntervention" id="specificIntervention">
                                    </div>
                                    <div>
                                        <label for="pageMatrixVca" class="dark:text-green-600">Page of VCA</label>
                                        <input class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1 py-1 px-2" type="file" name="pageMatrixVca" id="pageMatrixVca">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div x-data="{ pcip: '' }" x-cloak class="mt-2 mb-4">
                            <label for="pcip" class="dark:text-green-600">Aligned with the PCIP?</label>
                            <div class="flex items-center gap-2">
                                <div class="flex items-center gap-2">
                                    <input class="dark:bg-gray-800" type="radio" name="pcip" id="pcipYes" value="Yes" @click="pcip = 'Yes'">
                                    <label for="pcipYes">Yes</label>
                                </div>
                                <div class="flex items-center gap-2">
                                    <input class="dark:bg-gray-800" type="radio" name="pcip" id="pcipNo" value="No" @click="pcip = 'No'">
                                    <label for="pcipNo">No</label>
                                </div>
                            </div>
                            <div x-cloak style="display: none !important" x-show="pcip === 'Yes'">
                                <div>
                                    <label for="pageMatrixPcip" class="dark:text-green-600">Page of Matrix</label>
                                    <input class="block border-1 rounded-md border-gray-700 bg-gray-900 w-1/2 mt-1 py-1 px-2" type="file" name="pageMatrixPcip" id="pageMatrixPcip">
                                </div>
                            </div>
                        </div>

                        <label for="crva" class="dark:text-lime-500 text-2xl">CRVA</label>
                        <div class="grid grid-rows-1 gap-2 mt-4 mb-2">
                            <div>
                                <label for="sensitivity" class="dark:text-green-600">Sensitivity</label>
                                <input type="text" name="sensitivity" id="sensitivity" class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1">
                            </div>
                            <div>
                                <label for="Exposure" class="dark:text-green-600">Exposure</label>
                                <input type="text" name="Exposure" id="Exposure" class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1">
                            </div>
                            <div>
                                <label for="adaptiveCapacity" class="dark:text-green-600">Adaptive Capacity</label>
                                <input type="text" name="adaptiveCapacity" id="adaptiveCapacity" class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1">
                            </div>
                            <div>
                                <label for="overallVulnerability" class="dark:text-green-600">Overall Vulnerability</label>
                                <input type="text" name="overallVulnerability" id="overallVulnerability" class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1">
                            </div>
                        </div>

                        <div class="flex flex-col mb-2">
                            <label for="recommendations" class="dark:text-green-600">Recommendation</label>
                            <textarea name="recommendations" id="recommendations" rows="4" class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"></textarea>
                        </div>

                        <div class="flex flex-col mb-4">
                            <label for="considerations" class="dark:text-green-600 text-2xl">Other Considerations</label>
                            <textarea name="considerations" id="considerations" rows="4" class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"></textarea>
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
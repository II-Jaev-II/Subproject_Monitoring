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
                    <form action="{{ route('iplan.update-subproject', $subproject->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="checklistId" value="{{ $checklistId }}" hidden>
                        <input type="text" name="subprojectId" value="{{ $subproject->id }}" hidden>
                        <div class="mb-4">
                            <h1 for="iplanChecklist" class="dark:text-lime-500 text-2xl">Edit I-PLAN Checklist</h1>
                        </div>

                        <label for="priorityCommodity" class="dark:text-green-600">Priority commodity supported by the
                            SP
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
                                <div class="mt-2 mb-2">
                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <label for="evsaRank{{ $commodity }}" class="dark:text-green-600">E-VSA
                                                Rank
                                                ({{ $commodity }})
                                            </label>
                                            <input type="text" name="evsaRank{{ $commodity }}"
                                                id="evsaRank{{ $commodity }}"
                                                value="{{ old('evsaRank' . $commodity, $commodityData[$commodity]['evsaRank'] ?? '') }}"
                                                class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
                                                required>
                                        </div>
                                        <div>
                                            <label for="compositeIndex{{ $commodity }}"
                                                class="dark:text-green-600">Composite Index
                                                ({{ $commodity }})</label>
                                            <input type="text" name="compositeIndex{{ $commodity }}"
                                                id="compositeIndex{{ $commodity }}"
                                                value="{{ old('compositeIndex' . $commodity, $commodityData[$commodity]['compositeIndex'] ?? '') }}"
                                                class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <label for="justification" class="dark:text-lime-500 text-2xl">Justification if rank is higher
                            than
                            10 and
                            if composite index is below 0.4</label>
                        <div>
                            <div class="flex flex-col mt-2 mb-2">
                                <label for="explanation" class="dark:text-green-600">Please explain:</label>
                                <textarea name="explanation" id="explanation" rows="4"
                                    class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1">{{ $checklist->explanation ?? '' }}</textarea>
                                @if (!$checklist->justificationFile)
                                    <div>
                                        <label for="justificationFile" class="dark:text-green-600">Attach a File</label>
                                        <input
                                            class="block border-1 rounded-md border-gray-700 bg-gray-900 w-1/2 mt-1 py-1 px-2"
                                            type="file" name="justificationFile" id="justificationFile">
                                        @if ($errors->has('justificationFile'))
                                            <div class="text-red-600 mt-2 mb-2">
                                                {{ $errors->first('justificationFile') }}
                                            </div>
                                        @endif
                                    </div>
                                @else
                                    <div class="mb-2">
                                        <a class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray dark:text-white bg-gray-400 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2 w-fit mt-1"
                                            href="{{ asset($checklist->justificationFile) }}" target="_blank">
                                            <img src="/images/file-earmark-text.svg" alt="Save" width="22"
                                                height="22">View File</a>
                                    </div>
                                    <label for="justificationFile" class="dark:text-green-600">Attach a File</label>
                                    <input
                                        class="block border-1 rounded-md border-gray-700 bg-gray-900 w-1/2 mt-1 py-1 px-2"
                                        type="file" name="justificationFile" id="justificationFile">
                                    @if ($errors->has('justificationFile'))
                                        <div class="text-red-600 mt-2 mb-2">
                                            {{ $errors->first('justificationFile') }}
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="linkedVca" class="dark:text-lime-500 text-2xl">Linked to VCA?</label>
                            <div class="flex items-center gap-2">
                                @foreach (['Yes', 'No'] as $option)
                                    <div class="flex items-center gap-2">
                                        <input class="dark:bg-gray-800" type="radio"
                                            {{ isset($checklist->linkedVca) && $checklist->linkedVca === $option ? 'checked' : '' }}
                                            disabled>
                                        <label for="vca{{ $option }}">{{ $option }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @if (isset($checklist) &&
                                    ($checklist->valueChainSegment ||
                                        $checklist->opportunity ||
                                        $checklist->specificIntervention ||
                                        $checklist->pageMatrixVca))
                                <div class="grid grid-cols-2 gap-2 mt-2">
                                    @foreach (['valueChainSegment' => 'Value Chain Segment', 'opportunity' => 'Opportunity or Constraint Being Addressed', 'specificIntervention' => 'Specific Intervention'] as $field => $label)
                                        <div>
                                            <label for="{{ $field }}"
                                                class="dark:text-green-600">{{ $label }}</label>
                                            <input type="text"
                                                class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
                                                name="{{ $field }}" value="{{ $checklist->$field }}" required>
                                        </div>
                                    @endforeach
                                    <div>
                                        <label for="pageMatrixVca" class="dark:text-green-600">Page of VCA</label>
                                        <input
                                            class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1 py-1 px-2"
                                            type="file" name="pageMatrixVca" id="pageMatrixVca" required>
                                        @if ($errors->has('pageMatrixVca'))
                                            <div class="text-red-600 mt-2 mb-2">
                                                {{ $errors->first('pageMatrixVca') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="mb-2">
                            <label for="pcip" class="dark:text-lime-500 text-2xl">Aligned with the PCIP?</label>
                            <div class="flex items-center gap-2 mb-2">
                                @foreach (['Yes', 'No'] as $pcipOption)
                                    <div class="flex items-center gap-2">
                                        <input class="dark:bg-gray-800" type="radio"
                                            {{ isset($checklist->pcip) && $checklist->pcip === $pcipOption ? 'checked' : '' }}
                                            disabled>
                                        <label for="pcip{{ $pcipOption }}">{{ $pcipOption }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @if (isset($checklist) && ($checklist->page || $checklist->pageMatrixPcip))
                                <div class="mb-2">
                                    <label for="page" class="dark:text-green-600">Page</label>
                                    <input type="text" name="page"
                                        class="block border-1 rounded-md border-gray-700 bg-gray-900 w-32 mt-1"
                                        value="{{ $checklist->page }}" required>
                                </div>
                                <div>
                                    <label for="pageMatrixPcip" class="dark:text-green-600">Page of Matrix</label>
                                    <input
                                        class="block border-1 rounded-md border-gray-700 bg-gray-900 w-1/2 mt-1 py-1 px-2"
                                        type="file" name="pageMatrixPcip" id="pageMatrixPcip" required>
                                    @if ($errors->has('pageMatrixPcip'))
                                        <div class="text-red-600 mt-2 mb-2">
                                            {{ $errors->first('pageMatrixPcip') }}
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <label for="crva" class="dark:text-lime-500 text-2xl">CRVA</label>

                        @foreach ($fields as $field => $data)
                            <div class="mb-2">
                                <label for="{{ $field }}"
                                    class="dark:text-green-600">{{ $data['label'] }}</label>
                                @if ($data['type'] === 'textarea')
                                    <textarea name="{{ $data['name'] }}" class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
                                        rows="4">{{ $data['value'] }}</textarea>
                                    @error($field)
                                        <div class="text-red-600 mt-2 mb-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                @else
                                    <input type="{{ $data['type'] }}" name="{{ $data['name'] }}"
                                        class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
                                        value="{{ $data['value'] }}">
                                    @error($field)
                                        <div class="text-red-600 mt-2 mb-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                @endif
                            </div>
                        @endforeach

                        <div class="flex justify-end">
                            <button type="submit"
                                class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray dark:text-white bg-gray-400 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2">
                                <img src="/images/check2-square.svg" alt="Save" width="22" height="22">
                                Update Subproject
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>

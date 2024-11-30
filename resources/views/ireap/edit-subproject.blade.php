<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border border-gray-300 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('ireap.update-subproject', $subproject->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="subprojectId" value="{{ $subproject->id }}" hidden>

                        <div class="flex items-center space-x-4 mb-6">
                            <label for="reviewDate" class="dark:text-lime-500 text-black text-sm md:text-base">Date of
                                Review <span class="text-red-500">*</span></label>
                            <input type="date" name="reviewDate" id="reviewDate" value="{{ old('reviewDate') }}"
                                class="dark:bg-gray-900 rounded-md dark:[color-scheme:dark]">
                            @if ($errors->has('reviewDate'))
                                <div class="text-red-600 mt-2 mb-2">
                                    {{ $errors->first('reviewDate') }}
                                </div>
                            @endif
                        </div>

                        <label for="legalPersonality" class="dark:text-lime-500 text-black text-sm md:text-lg">Legal
                            Personality</label>
                        <hr class="border-2 dark:border-lime-500 border-green-500 mb-2">
                        <label for="registeredAgencyLabel" class="dark:text-lime-500 text-sm md:text-base">Registered
                            with CDA/SEC/DOLE for
                            at least one (1) year</label>
                        <div class="flex items-center gap-2">
                            @foreach (['Yes', 'No'] as $option)
                                <div class="flex items-center gap-2">
                                    <input class="dark:bg-gray-800" type="radio" name="registeredAgency"
                                        value="{{ $option }}" id="vca{{ $option }}"
                                        {{ isset($iReapChecklist->registeredAgency) && $iReapChecklist->registeredAgency === $option ? 'checked' : '' }}>
                                    <label for="vca{{ $option }}">{{ $option }}</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2">
                            @include('ireap.components.edit-legal-personality')
                        </div>

                        @if ($iReapChecklist->certificates)
                            <div x-data="{ showFileInput: false }" class="mt-2 mb-4">
                                <label for="certificatesInput"
                                    class="dark:text-green-600 text-sm md:text-base">Certificate
                                    of
                                    Compliance for CDA registered/Certificate of Derogatory Record for SEC
                                    Registered/Certificate of Good Standing for DOLE registered</label>
                                <div class="flex items-center mt-1 rounded-md overflow-hidden">
                                    <button type="button" @click="showFileInput = !showFileInput"
                                        class="flex items-center justify-center px-3 py-2 bg-blue-400 dark:bg-sky-500 text-gray-700 dark:text-white text-sm font-medium hover:bg-blue-500 dark:hover:bg-sky-600 transition ease-in-out duration-150 h-full">
                                        <img src="/images/pencil-square.svg" alt="Edit" width="22"
                                            height="22">
                                    </button>

                                    <input id="certificatesInput" type="file" name="certificates"
                                        x-show="showFileInput"
                                        class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-md w-1/4"
                                        style="display: none;">

                                    <a x-show="!showFileInput"
                                        class="flex items-center gap-2 border-l px-3 py-2 text-sm font-medium rounded-r-md text-white dark:text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 h-full"
                                        href="{{ asset($iReapChecklist->certificates) }}" target="_blank">
                                        <img src="/images/file-earmark-text.svg" alt="Save" width="22"
                                            height="22">
                                        View File
                                    </a>
                                </div>
                                @if ($errors->has('certificates'))
                                    <div class="text-red-600 mt-2 mb-2">
                                        {{ $errors->first('certificates') }}
                                    </div>
                                @endif
                            </div>
                        @else
                            <div class="mt-4 mb-4">
                                <label for="certificates" class="dark:text-green-600 text-sm md:text-base">Certificate
                                    of
                                    Compliance for CDA registered/Certificate of Derogatory Record for SEC
                                    Registered/Certificate of Good Standing for DOLE registered</label>
                                <input
                                    class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full md:w-1/2 mt-1 py-1 px-2"
                                    type="file" name="certificates" id="certificates">
                                @if ($errors->has('certificates'))
                                    <div class="text-red-600 mt-2 mb-2">
                                        {{ $errors->first('certificates') }}
                                    </div>
                                @endif
                            </div>
                        @endif

                        <label for="organizationalCapability"
                            class="dark:text-lime-500 text-black text-sm md:text-lg">Organizational Capability</label>
                        <hr class="border-2 dark:border-lime-500 border-green-500 mb-2">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mb-4">
                            @include('ireap.components.edit-organizational-capability')
                        </div>

                        <label for="financialCapability"
                            class="dark:text-lime-500 text-black text-sm md:text-lg">Financial Capability</label>
                        <hr class="border-2 dark:border-lime-500 border-green-500 mb-2">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2 mb-4">
                            @include('ireap.components.edit-financial-capability')
                        </div>

                        <label for="affidavitDisclosure"
                            class="dark:text-lime-500 text-black text-sm md:text-lg">Affidavit of Disclosure</label>
                        <hr class="border-2 dark:border-lime-500 border-green-500 mb-2">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2 mb-4">
                            @include('ireap.components.edit-affidavit-disclosure')
                        </div>

                        <label for="valueChainEngagement" class="dark:text-lime-500 text-black text-sm md:text-lg">Value
                            Chain Engagement</label>
                        <hr class="border-2 dark:border-lime-500 border-green-500 mb-4">

                        <label for="priorityCommodity" class="dark:text-green-600 text-black text-sm md:text-base">Must
                            be engaged in the priority commodity value chain</label>
                        <div class="flex items-center gap-2 mb-4">
                            @foreach (['Yes', 'No'] as $option)
                                <div class="flex items-center gap-2">
                                    <input class="dark:bg-gray-800" type="radio" name="priorityCommodity"
                                        value="{{ $option }}" id="vca{{ $option }}"
                                        {{ isset($iReapChecklist->priorityCommodity) && $iReapChecklist->priorityCommodity === $option ? 'checked' : '' }}>
                                    <label for="vca{{ $option }}">{{ $option }}</label>
                                </div>
                            @endforeach
                        </div>

                        <hr class="border-2 dark:border-lime-500 border-green-500 mb-2">
                        <div class="mt-2 flex items-center justify-between">
                            <div class="grid grid-cols-2 w-80">
                                <label for="status" class="dark:text-green-600 text-sm md:text-base">Validation
                                    Status
                                    <span class="dark:text-red-500">*</span></label>
                                <select name="status" id="status"
                                    class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-32 mt-1 py-1 px-2">
                                    <option {{ old('status') ? '' : 'selected' }}>{{ $iReapChecklist->iREAP }}
                                    </option>
                                    @if ($iReapChecklist->iREAP === 'OK')
                                    @elseif ($iReapChecklist->iREAP === 'Failed')
                                    @else
                                        <option value="OK" {{ old('status') == 'OK' ? 'selected' : '' }}>OK
                                        </option>
                                        <option value="Failed" {{ old('status') == 'Failed' ? 'selected' : '' }}>
                                            Failed
                                        </option>
                                    @endif
                                </select>
                            </div>
                            <button type="submit"
                                class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white dark:text-white bg-gray-400 dark:bg-lime-500 hover:text-gray-200 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2 ml-4">
                                <img src="/images/check2-square.svg" alt="Save" width="22" height="22">
                                Validate Subproject
                            </button>
                        </div>
                        @if ($errors->has('status'))
                            <div class="text-red-600 mt-2 mb-2">
                                {{ $errors->first('status') }}
                            </div>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

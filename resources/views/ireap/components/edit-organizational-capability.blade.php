@if ($iReapChecklist->accomplishmentReports)
    <div x-data="{ showModal: false, showFileInput: false }" class="mt-2">
        <label for="accomplishmentReportsInput" class="dark:text-green-600 text-sm md:text-base">
            Accomplishment Reports
        </label>
        <div class="flex items-center mt-1 rounded-md overflow-hidden">
            <!-- Edit Button -->
            <button type="button" @click="showFileInput = !showFileInput"
                class="flex items-center justify-center px-3 py-2 bg-blue-400 dark:bg-sky-500 text-gray-700 dark:text-white text-sm font-medium hover:bg-blue-500 dark:hover:bg-sky-600 transition ease-in-out duration-150 h-full">
                <img src="/images/pencil-square.svg" alt="Edit" width="22" height="22">
            </button>

            <!-- File Input (Visible when Edit is clicked) -->
            <input x-cloak style="display: none !important" x-show="showFileInput" id="accomplishmentReportsInput"
                type="file" name="accomplishmentReports[]" multiple
                class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-md w-full">

            <!-- View Files Button -->
            <button type="button" @click="showModal = true" x-show="!showFileInput"
                class="flex items-center gap-2 border-l px-3 py-2 text-sm font-medium rounded-r-md text-white dark:text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 h-full">
                <img src="/images/file-earmark-text.svg" alt="View Files" width="22" height="22">
                View Files
            </button>
        </div>

        <!-- Modal -->
        <div x-cloak style="display: none !important" x-show="showModal"
            class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 w-3/4">
                <h2 class="text-lg font-medium mb-4">Accomplishment Reports</h2>

                <!-- List of Files -->
                <div>
                    @php
                        // Decode JSON to display all files
                        $accomplishmentReports = json_decode($iReapChecklist->accomplishmentReports, true);
                    @endphp

                    @if ($accomplishmentReports)
                        <ul class="list-disc pl-6 mb-4">
                            @foreach ($accomplishmentReports as $report)
                                <li>
                                    <a href="{{ asset($report) }}" target="_blank"
                                        class="text-blue-600 hover:underline">
                                        {{ basename($report) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500">No files uploaded yet.</p>
                    @endif
                </div>

                <!-- Close Modal Button -->
                <button type="button" @click="showModal = false"
                    class="mt-6 px-4 py-2 text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-600 transition ease-in-out duration-150">
                    Close
                </button>
            </div>
        </div>
        @if ($errors->has('accomplishmentReports.*'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('accomplishmentReports.*') }}
            </div>
        @endif
    </div>
@else
    <div>
        <label for="accomplishmentReports" class="dark:text-green-600 text-sm md:text-base">Accomplishment
            Reports</label>
        <input
            class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
            type="file" name="accomplishmentReports[]" id="accomplishmentReports" multiple>
        @if ($errors->has('accomplishmentReports.*'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('accomplishmentReports.*') }}
            </div>
        @endif
    </div>
@endif


@if ($iReapChecklist->photographs)
    <div x-data="{ showModal: false, showFileInput: false }" class="mt-2">
        <label for="photographsInput" class="dark:text-green-600 text-sm md:text-base">
            Photographs of agri-fishery or related
            projects undertaken for at least one year
        </label>
        <div class="flex items-center mt-1 rounded-md overflow-hidden">
            <!-- Edit Button -->
            <button type="button" @click="showFileInput = !showFileInput"
                class="flex items-center justify-center px-3 py-2 bg-blue-400 dark:bg-sky-500 text-gray-700 dark:text-white text-sm font-medium hover:bg-blue-500 dark:hover:bg-sky-600 transition ease-in-out duration-150 h-full">
                <img src="/images/pencil-square.svg" alt="Edit" width="22" height="22">
            </button>

            <!-- File Input (Visible when Edit is clicked) -->
            <input x-cloak style="display: none !important" x-show="showFileInput" id="photographsInput" type="file"
                name="photographs[]" multiple class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-md w-full">

            <!-- View Files Button -->
            <button type="button" @click="showModal = true" x-show="!showFileInput"
                class="flex items-center gap-2 border-l px-3 py-2 text-sm font-medium rounded-r-md text-white dark:text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 h-full">
                <img src="/images/file-earmark-text.svg" alt="View Files" width="22" height="22">
                View Files
            </button>
        </div>

        <!-- Modal -->
        <div x-cloak style="display: none !important" x-show="showModal"
            class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 w-3/4">
                <h2 class="text-lg font-medium mb-4">Photographs of agri-fishery or related
                    projects undertaken for at least one year</h2>

                <!-- List of Files -->
                <div>
                    @php
                        // Decode JSON to display all files
                        $photographs = json_decode($iReapChecklist->photographs, true);
                    @endphp

                    @if ($photographs)
                        <ul class="list-disc pl-6 mb-4">
                            @foreach ($photographs as $report)
                                <li>
                                    <a href="{{ asset($report) }}" target="_blank"
                                        class="text-blue-600 hover:underline">
                                        {{ basename($report) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500">No files uploaded yet.</p>
                    @endif
                </div>

                <!-- Close Modal Button -->
                <button type="button" @click="showModal = false"
                    class="mt-6 px-4 py-2 text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-600 transition ease-in-out duration-150">
                    Close
                </button>
            </div>
        </div>
        @if ($errors->has('photographs.*'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('photographs.*') }}
            </div>
        @endif
    </div>
@else
    <div>
        <label for="photographs" class="dark:text-green-600 text-sm md:text-base">Photographs of agri-fishery or related
            projects undertaken for at least one year</label>
        <input
            class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
            type="file" name="photographs[]" id="photographs" multiple>
        @if ($errors->has('photographs.*'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('photographs.*') }}
            </div>
        @endif
    </div>
@endif

@if ($iReapChecklist->existingOrganizationalStructure)
    <div x-data="{ showFileInput: false }" class="mt-2">
        <label for="existingOrganizationalStructureInput" class="dark:text-green-600 text-sm md:text-base">Existing
            Organizational Structure</label>
        <div class="flex items-center mt-1 rounded-md overflow-hidden">
            <button type="button" @click="showFileInput = !showFileInput"
                class="flex items-center justify-center px-3 py-2 bg-blue-400 dark:bg-sky-500 text-gray-700 dark:text-white text-sm font-medium hover:bg-blue-500 dark:hover:bg-sky-600 transition ease-in-out duration-150 h-full">
                <img src="/images/pencil-square.svg" alt="Edit" width="22" height="22">
            </button>

            <input id="existingOrganizationalStructureInput" type="file" name="existingOrganizationalStructure"
                x-show="showFileInput" class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-md w-full"
                style="display: none;">

            <a x-show="!showFileInput"
                class="flex items-center gap-2 border-l px-3 py-2 text-sm font-medium rounded-r-md text-white dark:text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 h-full"
                href="{{ asset($iReapChecklist->existingOrganizationalStructure) }}" target="_blank">
                <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">
                View File
            </a>
        </div>
        @if ($errors->has('existingOrganizationalStructure'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('existingOrganizationalStructure') }}
            </div>
        @endif
    </div>
@else
    <div>
        <label for="existingOrganizationalStructure" class="dark:text-green-600 text-sm md:text-base">Existing
            Organizational Structure</label>
        <input
            class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
            type="file" name="existingOrganizationalStructure" id="existingOrganizationalStructure">
        @if ($errors->has('existingOrganizationalStructure'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('existingOrganizationalStructure') }}
            </div>
        @endif
    </div>
@endif

@if ($iReapChecklist->secretaryCertificate)
    <div x-data="{ showFileInput: false }" class="mt-2">
        <label for="secretaryCertificateInput" class="dark:text-green-600 text-sm md:text-base">Secretary's
            Certificate of
            Incumbent Officers</label>
        <div class="flex items-center mt-1 rounded-md overflow-hidden">
            <button type="button" @click="showFileInput = !showFileInput"
                class="flex items-center justify-center px-3 py-2 bg-blue-400 dark:bg-sky-500 text-gray-700 dark:text-white text-sm font-medium hover:bg-blue-500 dark:hover:bg-sky-600 transition ease-in-out duration-150 h-full">
                <img src="/images/pencil-square.svg" alt="Edit" width="22" height="22">
            </button>

            <input id="secretaryCertificateInput" type="file" name="secretaryCertificate" x-show="showFileInput"
                class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-md w-full" style="display: none;">

            <a x-show="!showFileInput"
                class="flex items-center gap-2 border-l px-3 py-2 text-sm font-medium rounded-r-md text-white dark:text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 h-full"
                href="{{ asset($iReapChecklist->secretaryCertificate) }}" target="_blank">
                <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">
                View File
            </a>
        </div>
        @if ($errors->has('secretaryCertificate'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('secretaryCertificate') }}
            </div>
        @endif
    </div>
@else
    <div>
        <label for="secretaryCertificate" class="dark:text-green-600 text-sm md:text-base">Secretary's Certificate of
            Incumbent Officers</label>
        <input
            class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
            type="file" name="secretaryCertificate" id="secretaryCertificate">
        @if ($errors->has('secretaryCertificate'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('secretaryCertificate') }}
            </div>
        @endif
    </div>
@endif

@if ($iReapChecklist->fcaMembersProfile)
    <div x-data="{ showModal: false, showFileInput: false }" class="mt-2">
        <label for="fcaMembersProfileInput" class="dark:text-green-600 text-sm md:text-base">
            FCA/FCA Cluster Profile & Members'
            Profile
        </label>
        <div class="flex items-center mt-1 rounded-md overflow-hidden">
            <!-- Edit Button -->
            <button type="button" @click="showFileInput = !showFileInput"
                class="flex items-center justify-center px-3 py-2 bg-blue-400 dark:bg-sky-500 text-gray-700 dark:text-white text-sm font-medium hover:bg-blue-500 dark:hover:bg-sky-600 transition ease-in-out duration-150 h-full">
                <img src="/images/pencil-square.svg" alt="Edit" width="22" height="22">
            </button>

            <!-- File Input (Visible when Edit is clicked) -->
            <input x-cloak style="display: none !important" x-show="showFileInput" id="fcaMembersProfileInput"
                type="file" name="fcaMembersProfile[]" multiple
                class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-md w-full">

            <!-- View Files Button -->
            <button type="button" @click="showModal = true" x-show="!showFileInput"
                class="flex items-center gap-2 border-l px-3 py-2 text-sm font-medium rounded-r-md text-white dark:text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 h-full">
                <img src="/images/file-earmark-text.svg" alt="View Files" width="22" height="22">
                View Files
            </button>
        </div>

        <!-- Modal -->
        <div x-cloak style="display: none !important" x-show="showModal"
            class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 w-3/4">
                <h2 class="text-lg font-medium mb-4">FCA/FCA Cluster Profile & Members'
                    Profile</h2>

                <!-- List of Files -->
                <div>
                    @php
                        // Decode JSON to display all files
                        $fcaMembersProfiles = json_decode($iReapChecklist->fcaMembersProfile, true);
                    @endphp

                    @if ($fcaMembersProfiles)
                        <ul class="list-disc pl-6 mb-4">
                            @foreach ($fcaMembersProfiles as $report)
                                <li>
                                    <a href="{{ asset($report) }}" target="_blank"
                                        class="text-blue-600 hover:underline">
                                        {{ basename($report) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500">No files uploaded yet.</p>
                    @endif
                </div>

                <!-- Close Modal Button -->
                <button type="button" @click="showModal = false"
                    class="mt-6 px-4 py-2 text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-600 transition ease-in-out duration-150">
                    Close
                </button>
            </div>
        </div>
        @if ($errors->has('fcaMembersProfile.*'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('fcaMembersProfile.*') }}
            </div>
        @endif
    </div>
@else
    <div>
        <label for="fcaMembersProfile" class="dark:text-green-600 text-sm md:text-base">FCA/FCA Cluster Profile &
            Members' Profile</label>
        <input
            class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1 py-1 px-2"
            type="file" name="fcaMembersProfile[]" id="fcaMembersProfile" multiple>
        @if ($errors->has('fcaMembersProfile.*'))
            <div class="text-red-600 mt-2 mb-2">
                {{ $errors->first('fcaMembersProfile.*') }}
            </div>
        @endif
    </div>
@endif

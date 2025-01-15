<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mb-4" x-data="{ selectedComponent: '' }" x-cloak>
        <div class="py-12">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="bg-white border border-gray-300 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-center mb-2">
                            <h1 class="dark:text-lime-500 text-xl text-center">Percentage of Accomplishment</h1>
                        </div>
                        <div class="overflow-x-auto rounded-md">
                            <table class="w-full text-sm text-gray-500 dark:text-gray-400 text-center">
                                <thead class="text-xs text-black dark:text-gray-300 dark:bg-green-900 uppercase bg-green-500">
                                    <tr>
                                        <th scope="col" class="px-2 py-2 sm:px-4 sm:py-3">iPLAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="dark:bg-gray-900 dark:border-gray-700 bg-green-700">
                                        <td class="px-2 py-2 sm:px-4 sm:py-3 text-white">{{ $latestChecklist->percentageAccomplishment ?? '0' }}%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div x-data="{ currentIndex: 0, totalRecords: {{ count($iPlanChecklists) }} }" class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">

            <div class="flex justify-between mb-4">
                <button @click="if (currentIndex > 0) currentIndex--"
                    :disabled="currentIndex === 0"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md disabled:opacity-50 flex items-center transition duration-300 ease-in-out hover:bg-blue-600">
                    <span class="mr-2">←</span> Latest Validation
                </button>
                <button @click="if (currentIndex < totalRecords - 1) currentIndex++"
                    :disabled="currentIndex === totalRecords - 1"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md disabled:opacity-50 flex items-center transition duration-300 ease-in-out hover:bg-blue-600">
                    Previous Validation <span class="ml-2">→</span>
                </button>
            </div>

            @foreach ($iPlanChecklists as $index => $iPlanChecklist)
            <div x-show="currentIndex === {{ $index }}" class="bg-white border border-gray-300 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <label for="reviewDate" class="dark:text-green-600 text-black text-sm md:text-base">
                                    Date of Review
                                </label>
                                <input type="date" id="reviewDate" name="reviewDate"
                                    class="dark:bg-gray-900 rounded-md dark:[color-scheme:dark]"
                                    value="{{ $iPlanChecklist->reviewDate }}" readonly>
                            </div>

                            <a href="{{ route('iplan.generate-report', $iPlanChecklist->id) }}"
                                class="flex items-center gap-2 text-white bg-lime-500 hover:bg-lime-600 duration-300 rounded-md px-4 py-2 text-md">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                    <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1" />
                                    <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                                </svg>
                                Generate Report
                            </a>
                        </div>

                        <div>
                            <div class="overflow-x-auto rounded-md">
                                <table class="w-full text-sm text-left border-2 border-gray-500 border-collapse">
                                    <thead class="text-xs text-black dark:text-gray-300">
                                        <tr class="dark:bg-lime-700 bg-lime-400 uppercase">
                                            <th colspan="3" class="px-4 py-3 text-center text-lg border-2 border-gray-400">Municipal or Provincial Background</th>
                                        </tr>
                                        <tr class="dark:bg-green-900 uppercase bg-green-500">
                                            <th scope="col" class="px-4 py-3 text-center border-2 border-gray-400">Checklist</th>
                                            <th scope="col" class="px-4 py-3 text-center border-2 border-gray-400">Status</th>
                                            <th scope="col" class="px-4 py-3 text-center border-2 border-gray-400">Comments/Findings</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @include('iplan.rpab.validated-checklists.municipal-provincial-background-table')
                                    </tbody>
                                    <thead class="text-xs text-black dark:text-gray-300">
                                        <tr class="dark:bg-lime-700 bg-lime-400 uppercase">
                                            <th colspan="3" class="px-4 py-3 text-center text-lg border-2 border-gray-400">Demographics</th>
                                        </tr>
                                        <tr class="dark:bg-green-900 uppercase bg-green-500">
                                            <th scope="col" class="px-4 py-3 text-center border-2 border-gray-400">Checklist</th>
                                            <th scope="col" class="px-4 py-3 text-center border-2 border-gray-400">Status</th>
                                            <th scope="col" class="px-4 py-3 text-center border-2 border-gray-400">Comments/Findings</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @include('iplan.rpab.validated-checklists.demographics-table')
                                    </tbody>
                                    <thead class="text-xs text-black dark:text-gray-300">
                                        <tr class="dark:bg-lime-700 bg-lime-400 uppercase">
                                            <th colspan="3" class="px-4 py-3 text-center text-lg border-2 border-gray-400">Economy</th>
                                        </tr>
                                        <tr class="dark:bg-green-900 uppercase bg-green-500">
                                            <th scope="col" class="px-4 py-3 text-center border-2 border-gray-400">Checklist</th>
                                            <th scope="col" class="px-4 py-3 text-center border-2 border-gray-400">Status</th>
                                            <th scope="col" class="px-4 py-3 text-center border-2 border-gray-400">Comments/Findings</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @include('iplan.rpab.validated-checklists.economy-table')
                                    </tbody>
                                    <thead class="text-xs text-black dark:text-gray-300">
                                        <tr class="dark:bg-lime-700 bg-lime-400 uppercase">
                                            <th colspan="3" class="px-4 py-3 text-center text-lg border-2 border-gray-400">Agriculture & Rural Development Sectors</th>
                                        </tr>
                                        <tr class="dark:bg-green-900 uppercase bg-green-500">
                                            <th scope="col" class="px-4 py-3 text-center border-2 border-gray-400">Checklist</th>
                                            <th scope="col" class="px-4 py-3 text-center border-2 border-gray-400">Status</th>
                                            <th scope="col" class="px-4 py-3 text-center border-2 border-gray-400">Comments/Findings</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @include('iplan.rpab.validated-checklists.agriculture-rural-table')
                                    </tbody>
                                    <thead class="text-xs text-black dark:text-gray-300">
                                        <tr class="dark:bg-lime-700 bg-lime-400 uppercase">
                                            <th colspan="3" class="px-4 py-3 text-center text-lg border-2 border-gray-400">Project Identification & Prioritization Profile</th>
                                        </tr>
                                        <tr class="dark:bg-green-900 uppercase bg-green-500">
                                            <th scope="col" class="px-4 py-3 text-center border-2 border-gray-400">Checklist</th>
                                            <th scope="col" class="px-4 py-3 text-center border-2 border-gray-400">Status</th>
                                            <th scope="col" class="px-4 py-3 text-center border-2 border-gray-400">Comments/Findings</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @include('iplan.rpab.validated-checklists.project-identification-table')
                                    </tbody>
                                    <thead class="text-xs text-black dark:text-gray-300">
                                        <tr class="dark:bg-lime-700 bg-lime-400 uppercase">
                                            <th colspan="3" class="px-4 py-3 text-center text-lg border-2 border-gray-400">The Subproject</th>
                                        </tr>
                                        <tr class="dark:bg-green-900 uppercase bg-green-500">
                                            <th scope="col" class="px-4 py-3 text-center border-2 border-gray-400">Checklist</th>
                                            <th scope="col" class="px-4 py-3 text-center border-2 border-gray-400">Status</th>
                                            <th scope="col" class="px-4 py-3 text-center border-2 border-gray-400">Comments/Findings</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @include('iplan.rpab.validated-checklists.the-subproject-table')
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
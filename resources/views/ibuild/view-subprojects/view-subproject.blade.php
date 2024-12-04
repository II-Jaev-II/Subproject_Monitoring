<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            @if (session()->has('success'))
                <div class="bg-green-500 text-white dark:bg-green-900 rounded-md px-3 py-2 mb-2 w-full">
                    {{ session('success') }}
                </div>
            @endif
            <div class="bg-white border border-gray-300 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-4">
                        <h1 class="dark:text-lime-500 text-xl">Validation Results</h1>
                    </div>
                    <div class="overflow-x-auto rounded-md">
                        @include('ibuild.view-subprojects.clearances-table')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="bg-white border border-gray-300 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @include('ibuild.view-subprojects.subproject-profile')
            </div>
        </div>
    </div>

    <div x-data="{ selectedComponent: '' }" x-cloak>
        <div class="py-12">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 relative">
                @if ($subprojects->total > 5)
                    <div>
                        <a href="{{ route('generate.word', $subprojects->id) }}"
                            class="flex space-x-2 absolute -top-8 right-0 justify-end text-white bg-lime-500 rounded-md px-2 py-2 text-md">Generate
                            Validation Report</a>
                    </div>
                @endif
                <div class="flex md:space-x-2 absolute -top-5">
                    <a href="#" @click.prevent="selectedComponent = 'IPLAN'"
                        :class="{
                            'dark:bg-lime-500 bg-green-500': selectedComponent === 'IPLAN',
                            'bg-gray-400 dark:bg-gray-500 dark:hover:bg-gray-400 hover:bg-gray-300 ease-in-out duration-300': selectedComponent !== 'IPLAN'
                        }"
                        class="bg-gray-50 dark:bg-gray-800 text-black dark:text-white border-2 border-gray-500 rounded-tl-lg rounded-tr-lg px-4 py-1 text-sm shadow-sm translate-y-0 hover:-translate-y-2 transition-all">
                        iPLAN
                    </a>
                    <a href="#" @click.prevent="selectedComponent = 'IBUILD'"
                        :class="{
                            'dark:bg-lime-500 bg-green-500': selectedComponent === 'IBUILD',
                            'bg-gray-400 dark:bg-gray-500 dark:hover:bg-gray-400 hover:bg-gray-300 ease-in-out duration-300': selectedComponent !== 'IBUILD'
                        }"
                        class="bg-gray-50 dark:bg-gray-800 text-black dark:text-white border-2 border-gray-500 rounded-tl-lg rounded-tr-lg px-4 py-1 text-sm shadow-sm translate-y-0 hover:-translate-y-2 transition-all">
                        iBUILD
                    </a>
                    <a href="#" @click.prevent="selectedComponent = 'ECON'"
                        :class="{
                            'dark:bg-lime-500 bg-green-500': selectedComponent === 'ECON',
                            'bg-gray-400 dark:bg-gray-500 dark:hover:bg-gray-400 hover:bg-gray-300 ease-in-out duration-300': selectedComponent !== 'ECON'
                        }"
                        class="bg-gray-50 dark:bg-gray-800 text-black dark:text-white border-2 border-gray-500 rounded-tl-lg rounded-tr-lg px-4 py-1 text-sm shadow-sm translate-y-0 hover:-translate-y-2 transition-all">
                        ECON
                    </a>
                    <a href="#" @click.prevent="selectedComponent = 'SES'"
                        :class="{
                            'dark:bg-lime-500 bg-green-500': selectedComponent === 'SES',
                            'bg-gray-400 dark:bg-gray-500 dark:hover:bg-gray-400 hover:bg-gray-300 ease-in-out duration-300': selectedComponent !== 'SES'
                        }"
                        class="bg-gray-50 dark:bg-gray-800 text-black dark:text-white border-2 border-gray-500 rounded-tl-lg rounded-tr-lg px-4 py-1 text-sm shadow-sm translate-y-0 hover:-translate-y-2 transition-all">
                        SES
                    </a>
                    <a href="#" @click.prevent="selectedComponent = 'GGU'"
                        :class="{
                            'dark:bg-lime-500 bg-green-500': selectedComponent === 'GGU',
                            'bg-gray-400 dark:bg-gray-500 dark:hover:bg-gray-400 hover:bg-gray-300 ease-in-out duration-300': selectedComponent !== 'GGU'
                        }"
                        class="bg-gray-50 dark:bg-gray-800 text-black dark:text-white border-2 border-gray-500 rounded-tl-lg rounded-tr-lg px-4 py-1 text-sm shadow-sm translate-y-0 hover:-translate-y-2 transition-all">
                        GGU
                    </a>
                    @if ($subprojects->projectType === 'VCRI')
                        <a href="#" @click.prevent="selectedComponent = 'IREAP'"
                            :class="{
                                'dark:bg-lime-500 bg-green-500': selectedComponent === 'IREAP',
                                'bg-gray-400 dark:bg-gray-500 dark:hover:bg-gray-400 hover:bg-gray-300 ease-in-out duration-300': selectedComponent !== 'IREAP'
                            }"
                            class="bg-gray-50 dark:bg-gray-800 text-black dark:text-white border-2 border-gray-500 rounded-tl-lg rounded-tr-lg px-4 py-1 text-sm shadow-sm translate-y-0 hover:-translate-y-2 transition-all">
                            IREAP
                        </a>
                    @endif
                </div>
                <div
                    class="bg-white border border-gray-300 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-6">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div x-cloak style="display: none !important" x-show="selectedComponent === 'IPLAN'">
                            @if ($iPlanChecklists)
                                <h1 class="dark:text-lime-500 text-lg md:text-xl mt-4 mb-4">IPLAN Validation</h1>
                                <hr class="border-2 border-green-500 dark:border-lime-500 mb-2">
                                @include('iplan.components.iplan-validated-checklist')
                            @else
                                <div
                                    class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 w-fit px-2 py-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="20"
                                        height="20" fill="currentColor" class="bi bi-clipboard-x-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                                        <path
                                            d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm4 7.793 1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708z" />
                                    </svg>
                                    IPLAN has not validated this subproject yet.
                                    <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                                        <span
                                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                                    </span>
                                </div>
                            @endif
                        </div>
                        <div x-cloak style="display: none !important" x-show="selectedComponent === 'ECON'">
                            @if ($econChecklists)
                                <h1 class="dark:text-lime-500 text-lg md:text-xl mt-4 mb-4">ECON Validation</h1>
                                <hr class="border-2 border-green-500 dark:border-lime-500 mb-2">
                                @include('econ.components.econ-validated-checklist')
                            @else
                                <p
                                    class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 dark:bg-red-800 text-white border-red-400 w-fit px-2 py-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="20"
                                        height="20" fill="currentColor" class="bi bi-clipboard-x-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                                        <path
                                            d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm4 7.793 1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708z" />
                                    </svg>
                                    ECON has not validated this subproject yet.
                                    <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                                        <span
                                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                                    </span>
                                </p>
                            @endif
                        </div>
                        <div x-cloak style="display: none !important" x-show="selectedComponent === 'SES'">
                            @if ($sesChecklists)
                                <h1 class="dark:text-lime-500 text-lg md:text-xl mt-4 mb-4">SES Validation</h1>
                                <hr class="border-2 border-green-500 dark:border-lime-500 mb-2">
                                @include('ses.components.ses-validated-checklist')
                            @else
                                <p
                                    class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 dark:bg-red-800 text-white border-red-400 w-fit px-2 py-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="20"
                                        height="20" fill="currentColor" class="bi bi-clipboard-x-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                                        <path
                                            d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm4 7.793 1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708z" />
                                    </svg>
                                    SES has not validated this subproject yet.
                                    <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                                        <span
                                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                                    </span>
                                </p>
                            @endif
                        </div>
                        <div x-cloak style="display: none !important" x-show="selectedComponent === 'GGU'">
                            @if ($gguChecklists)
                                <h1 class="dark:text-lime-500 text-lg md:text-xl mt-4 mb-4">GGU Validation</h1>
                                <hr class="border-2 border-green-500 dark:border-lime-500 mb-2">
                                @include('ggu.components.ggu-validated-checklist')
                            @else
                                <p
                                    class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 dark:bg-red-800 text-white border-red-400 w-fit px-2 py-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="20"
                                        height="20" fill="currentColor" class="bi bi-clipboard-x-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                                        <path
                                            d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm4 7.793 1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708z" />
                                    </svg>
                                    GGU has not validated this subproject yet.
                                    <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                                        <span
                                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                                    </span>
                                </p>
                            @endif
                        </div>
                        <div x-cloak style="display: none !important" x-show="selectedComponent === 'IREAP'">
                            @if ($iReapChecklists)
                                <h1 class="dark:text-lime-500 text-xl mt-4 mb-4">IREAP Validation</h1>
                                <hr class="border-2 border-green-500 dark:border-lime-500 mb-2">
                                @include('ireap.components.ireap-validated-checklist')
                            @else
                                <p
                                    class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 dark:bg-red-800 text-white border-red-400 w-fit px-2 py-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="20"
                                        height="20" fill="currentColor" class="bi bi-clipboard-x-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                                        <path
                                            d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm4 7.793 1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708z" />
                                    </svg>
                                    IREAP has not validated this subproject yet.
                                    <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                                        <span
                                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                                    </span>
                                </p>
                            @endif
                        </div>
                        <div x-cloak style="display: none !important" x-show="selectedComponent === 'IBUILD'">
                            @if ($hasRecords)
                                <h1 class="dark:text-lime-500 text-lg md:text-xl mt-4 mb-4">IBUILD Validation</h1>
                                <hr class="border-2 border-green-500 dark:border-lime-500 mb-2">
                                @include('ibuild.components.ibuild-validated-checklist', [
                                    'subprojectType' => $subprojectType,
                                ])
                            @else
                                <div
                                    class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 w-fit px-2 py-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="20"
                                        height="20" fill="currentColor" class="bi bi-clipboard-x-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                                        <path
                                            d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm4 7.793 1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708z" />
                                    </svg>
                                    IBUILD has not validated this subproject yet.
                                    <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                                        <span
                                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

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
                    <div class="flex justify-between items-center mb-4">
                        <h1 class="dark:text-lime-500 text-xl">Clearances for Validation</h1>
                        <a href="{{ route('ggu.subprojects') }}"
                            class="border border-transparent text-sm leading-4 font-medium rounded-md text-gray dark:text-white bg-gray-400 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2">
                            Show Subprojects
                        </a>
                    </div>
                    <div class="overflow-x-auto">
                        @include('ggu.view-subprojects.clearances-table')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @include('ggu.view-subprojects.subproject-profile')
            </div>
        </div>
    </div>

    <div x-data="{ selectedComponent: '' }" x-cloak>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative">
                <div class="flex space-x-2 absolute -top-5">
                    <a href="#" @click.prevent="selectedComponent = 'IPLAN'"
                        :class="{
                            'dark:bg-lime-500': selectedComponent === 'IPLAN',
                            'bg-gray-400 dark:bg-gray-500 dark:hover:bg-gray-400 ease-in-out duration-300': selectedComponent !== 'IPLAN'
                        }"
                        class="bg-white dark:bg-gray-800 text-white border-2 border-gray-500 rounded-tl-lg rounded-tr-lg px-4 py-1 text-sm shadow-sm translate-y-0 hover:-translate-y-2 transition-all">
                        iPLAN
                    </a>
                    <a href="#" @click.prevent="selectedComponent = 'IBUILD'"
                        :class="{
                            'dark:bg-lime-500': selectedComponent === 'IBUILD',
                            'bg-gray-400 dark:bg-gray-500 dark:hover:bg-gray-400 ease-in-out duration-300': selectedComponent !== 'IBUILD'
                        }"
                        class="bg-white dark:bg-gray-800 text-white border-2 border-gray-500 rounded-tl-lg rounded-tr-lg px-4 py-1 text-sm shadow-sm translate-y-0 hover:-translate-y-2 transition-all">
                        iBUILD
                    </a>
                    <a href="#" @click.prevent="selectedComponent = 'ECON'"
                        :class="{
                            'dark:bg-lime-500': selectedComponent === 'ECON',
                            'bg-gray-400 dark:bg-gray-500 dark:hover:bg-gray-400 ease-in-out duration-300': selectedComponent !== 'ECON'
                        }"
                        class="bg-white dark:bg-gray-800 text-white border-2 border-gray-500 rounded-tl-lg rounded-tr-lg px-4 py-1 text-sm shadow-sm translate-y-0 hover:-translate-y-2 transition-all">
                        ECON
                    </a>
                    <a href="#" @click.prevent="selectedComponent = 'SES'"
                        :class="{
                            'dark:bg-lime-500': selectedComponent === 'SES',
                            'bg-gray-400 dark:bg-gray-500 dark:hover:bg-gray-400 ease-in-out duration-300': selectedComponent !== 'SES'
                        }"
                        class="bg-white dark:bg-gray-800 text-white border-2 border-gray-500 rounded-tl-lg rounded-tr-lg px-4 py-1 text-sm shadow-sm translate-y-0 hover:-translate-y-2 transition-all">
                        SES
                    </a>
                    <a href="#" @click.prevent="selectedComponent = 'GGU'"
                        :class="{
                            'dark:bg-lime-500': selectedComponent === 'GGU',
                            'bg-gray-400 dark:bg-gray-500 dark:hover:bg-gray-400 ease-in-out duration-300': selectedComponent !== 'GGU'
                        }"
                        class="bg-white dark:bg-gray-800 text-white border-2 border-gray-500 rounded-tl-lg rounded-tr-lg px-4 py-1 text-sm shadow-sm translate-y-0 hover:-translate-y-2 transition-all">
                        GGU
                    </a>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-6">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="dark:text-lime-500 text-xl mt-4 mb-4">Other Component's Validations</h1>
                        <hr class="border-2 dark:border-lime-500 mb-2">
                        <div x-cloak style="display: none !important" x-show="selectedComponent === 'IPLAN'">
                            <livewire:iplan-clearance />
                        </div>
                        <div x-cloak style="display: none !important" x-show="selectedComponent === 'IBUILD'">
                            <livewire:ibuild-clearance />
                        </div>
                        <div x-cloak style="display: none !important" x-show="selectedComponent === 'ECON'">
                            <livewire:econ-clearance />
                        </div>
                        <div x-cloak style="display: none !important" x-show="selectedComponent === 'SES'">
                            <livewire:ses-clearance />
                        </div>
                        <div x-cloak style="display: none !important" x-show="selectedComponent === 'GGU'">
                            <livewire:ggu-clearance />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

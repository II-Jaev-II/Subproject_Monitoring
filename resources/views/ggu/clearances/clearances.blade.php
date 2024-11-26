<x-alpine-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div x-data="{ selectedComponent: '' }" x-cloak>
        <div class="py-12">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="bg-gray-50 border border-gray-300 shadow-2xl dark:bg-gray-800 sm:rounded-lg">
                    @include('ggu.clearances.clearances-table')
                </div>
            </div>
        </div>

        <div>
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="bg-gray-50 border border-gray-300 shadow-2xl dark:bg-gray-800 overflow-hidden sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
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
</x-alpine-layout>
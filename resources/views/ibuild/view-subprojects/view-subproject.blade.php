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
                        <a href="{{ route('ibuild.subprojects') }}"
                            class="border border-transparent text-sm leading-4 font-medium rounded-md text-gray dark:text-white bg-gray-400 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2">
                            Show Subprojects
                        </a>
                    </div>
                    <div class="overflow-x-auto">
                        @include('ibuild.view-subprojects.clearances-table')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @include('ibuild.view-subprojects.subproject-profile')
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="dark:text-lime-500 text-xl mt-4 mb-4">Other Component's Validations</h1>
                    <hr class="border-2 dark:border-lime-500 mb-2">
                    <div x-data="{ selectedComponent: '' }" x-cloak>
                        @include('ibuild.view-subprojects.components-validations')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
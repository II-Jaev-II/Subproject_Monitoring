<x-alpine-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-3 divide-x-2 gap-4 items-center border-2 border-white rounded">
                        <div class="flex flex-col items-center">
                            <div id="provinceChart" class="w-full"></div>
                        </div>
                        <div class="flex flex-col items-center">
                            <div id="projectType" class="w-full"></div>
                        </div>
                        <div class="flex flex-col items-center">
                            <div id="projectCategory" class="w-full"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <livewire:admin-subprojects-table />
                </div>
            </div>
        </div>
    </div>

    <script>
        var projectTypeData = {!! json_encode($projectTypeData) !!};
        var projectCategoryData = {!! json_encode($projectCategoryData) !!};
        var provinceData = {!! json_encode($provinceData) !!};
        var provinceLabels = {!! json_encode($provinceLabels) !!};
    </script>
    <script src="{{ asset('js/adminCharts.js') }}"></script>
</x-alpine-layout>

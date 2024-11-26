<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="min-h-screen flex flex-col bg-gray-100 dark:bg-gray-900">
        <div class="flex-1 flex flex-col md:flex-row overflow-hidden">
            <!-- Sidebar for Subprojects Cards -->
            <div class="w-full md:w-1/4 p-4 space-y-6 overflow-y-auto">
                <!-- Total Subprojects Card -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white shadow-lg rounded-lg transform transition duration-300 hover:scale-105">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <svg class="w-6 h-6 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="2" y="3" width="20" height="20" rx="2" ry="2" fill="#E2E8F0" stroke="#2D3748" stroke-width="1.5" />
                                <rect x="8" y="1" width="8" height="3" rx="1.5" fill="#A0AEC0" />
                                <rect x="8" y="14" width="2" height="4" fill="#2D3748" />
                                <rect x="11" y="10" width="2" height="8" fill="#2D3748" />
                                <rect x="14" y="6" width="2" height="12" fill="#2D3748" />
                            </svg>
                            <h3 class="text-lg font-semibold">Total Subprojects</h3>
                        </div>
                        <div class="text-2xl font-bold">{{ $subprojectsCount }}</div>
                    </div>
                </div>

                <!-- Cleared Subprojects Card -->
                <div class="bg-gradient-to-r from-green-500 to-green-700 text-white shadow-lg rounded-lg transform transition duration-300 hover:scale-105">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <svg class="w-6 h-6 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="2" y="3" width="20" height="20" rx="2" ry="2" fill="#E2E8F0" stroke="#2D3748" stroke-width="1.5" />
                                <rect x="8" y="1" width="8" height="3" rx="1.5" fill="#A0AEC0" />
                                <path d="M8 12l3 3l5 -5" stroke="#2D3748" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none" />
                            </svg>
                            <h3 class="text-lg font-semibold">Cleared Subprojects</h3>
                        </div>
                        <div class="text-2xl font-bold">{{ $clearedSubprojectsCount }}</div>
                    </div>
                </div>

                <!-- Ongoing Subprojects Card -->
                <div class="bg-gradient-to-r from-yellow-500 to-yellow-700 text-white shadow-lg rounded-lg transform transition duration-300 hover:scale-105">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <svg class="w-6 h-6 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="2" y="3" width="20" height="20" rx="2" ry="2" fill="#E2E8F0" stroke="#2D3748" stroke-width="1.5" />
                                <rect x="8" y="1" width="8" height="3" rx="1.5" fill="#A0AEC0" />
                                <circle cx="12" cy="12" r="5" fill="white" stroke="#2D3748" stroke-width="1.5" />
                                <line x1="12" y1="12" x2="12" y2="9" stroke="#2D3748" stroke-width="1.5" stroke-linecap="round" />
                                <line x1="12" y1="12" x2="14" y2="13" stroke="#2D3748" stroke-width="1.5" stroke-linecap="round" />
                                <circle cx="12" cy="12" r="0.5" fill="#2D3748" />
                            </svg>
                            <h3 class="text-lg font-semibold">Ongoing Subprojects</h3>
                        </div>
                        <div class="text-2xl font-bold">{{ $onGoingSubprojectsCount }}</div>
                    </div>
                </div>

                <!-- Failed Subprojects Card -->
                <div class="bg-gradient-to-r from-red-500 to-red-700 text-white shadow-lg rounded-lg transform transition duration-300 hover:scale-105">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <svg class="w-6 h-6 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="2" y="3" width="20" height="20" rx="2" ry="2" fill="#E2E8F0" stroke="#2D3748" stroke-width="1.5" />
                                <rect x="8" y="1" width="8" height="3" rx="1.5" fill="#A0AEC0" />
                                <line x1="7" y1="10" x2="17" y2="18" stroke="#2D3748" stroke-width="1.5" stroke-linecap="round" />
                                <line x1="7" y1="18" x2="17" y2="10" stroke="#2D3748" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                            <h3 class="text-lg font-semibold">Failed Subprojects</h3>
                        </div>
                        <div class="text-2xl font-bold">{{ $failedSubprojectsCount }}</div>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="flex-1 flex flex-col space-y-6 p-4 overflow-y-auto">
                <!-- Distribution Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Province Chart -->
                    <div class="bg-white border border-gray-300 dark:bg-gray-800 shadow-md rounded-lg transform transition hover:scale-105">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h3 class="text-lg font-semibold mb-4 border-b border-gray-300 dark:border-gray-700 pb-2">
                                Project Distribution per Province
                            </h3>
                            <div id="provinceChart" class="h-64 flex items-center justify-center"></div>
                        </div>
                    </div>

                    <!-- Project Type Chart -->
                    <div class="bg-white border border-gray-300 dark:bg-gray-800 shadow-md rounded-lg transform transition hover:scale-105">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h3 class="text-lg font-semibold mb-4 border-b border-gray-300 dark:border-gray-700 pb-2">
                                Project Type Distribution
                            </h3>
                            <div id="projectType" class="h-64 flex items-center justify-center"></div>
                        </div>
                    </div>

                    <!-- Project Category Chart -->
                    <div class="bg-white border border-gray-300 dark:bg-gray-800 shadow-md rounded-lg transform transition hover:scale-105">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h3 class="text-lg font-semibold mb-4 border-b border-gray-300 dark:border-gray-700 pb-2">
                                Project Category Distribution
                            </h3>
                            <div id="projectCategory" class="h-64 flex items-center justify-center"></div>
                        </div>
                    </div>
                </div>

                <!-- Clearance Chart -->
                <div class="bg-white border border-gray-300 dark:bg-gray-800 shadow-md rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div id="clearancesChart" class="h-64 w-full flex items-center justify-center"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var projectTypeData = JSON.parse('@json($projectTypeData)');
        var projectCategoryData = JSON.parse('@json($projectCategoryData)');
        var provinceData = JSON.parse('@json($provinceData)');
        var provinceLabels = JSON.parse('@json($provinceLabels)');
    </script>
    <script src="{{ asset('js/adminCharts.js') }}"></script>
</x-app-layout>
<div>
    <div>
        <div class="flex flex-wrap md:flex-nowrap items-center justify-between space-y-4 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full md:w-auto flex">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                            viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input wire:model.live.debounce.300ms="search" type="text"
                        class="bg-gray-50 dark:bg-gray-900 border border-gray-400 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2"
                        placeholder="Search" required="">
                </div>
            </div>
            <div class="w-full md:flex md:items-center md:justify-between md:space-x-3 space-y-4 md:space-y-0">
                <div class="flex flex-wrap md:flex-nowrap items-center space-y-4 md:space-y-0 md:space-x-3">
                    <label class="w-full md:w-40 text-sm font-medium text-gray-900 dark:text-white">Component:</label>
                    <select wire:model.live="component"
                        class="bg-gray-50 dark:bg-gray-900 border border-gray-400 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="" disabled selected>Select Component</option>
                        <option value="All">All</option>
                        <option value="iPLAN">IPLAN</option>
                        <option value="iBUILD">IBUILD</option>
                        <option value="iREAP">IREAP</option>
                        <option value="econ">ECON</option>
                        <option value="ggu">GGU</option>
                        <option value="ses">SES</option>
                    </select>
                </div>
                <div class="flex flex-wrap md:flex-nowrap items-center space-y-4 md:space-y-0 md:space-x-3">
                    <label class="w-full md:w-40 text-sm font-medium text-gray-900 dark:text-white">Clearances:</label>
                    <select wire:model.live="clearances"
                        class="bg-gray-50 dark:bg-gray-900 border border-gray-400 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="" disabled selected>Select Clearance</option>
                        <option value="All">All</option>
                        <option value="OK">OK</option>
                        <option value="Pending">Pending</option>
                        <option value="Failed">Failed</option>
                    </select>
                </div>
                <div class="flex flex-wrap md:flex-nowrap items-center space-y-4 md:space-y-0 md:space-x-3">
                    <label class="w-full md:w-40 text-sm font-medium text-gray-900 dark:text-white">Inactive
                        Days:</label>
                    <select wire:model.live="inactiveDays"
                        class="bg-gray-50 dark:bg-gray-900 border border-gray-400 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="" disabled selected>Select Inactive Days</option>
                        <option value="All">All</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    @if (!$component)
        <p class="text-center text-gray-900 dark:text-gray-300 mt-4">Please select a Component to view records.</p>
    @elseif ($subprojects->isEmpty())
        <p class="text-center text-gray-900 dark:text-gray-300 mt-4">No records found for the selected filters.</p>
    @else
        <!-- Table Content -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs dark:text-gray-300 text-black dark:bg-green-900 uppercase bg-green-500">
                    <tr>
                        <th scope="col" class="px-4 py-3">Subproject Name</th>
                        <th scope="col" class="px-4 py-3">Proponent</th>
                        <th scope="col" class="px-4 py-3">Project Type</th>
                        <th scope="col" class="px-4 py-3">Project Category</th>
                        <th scope="col" class="px-4 py-3">Estimated Project Cost (EPC)</th>
                        @if ($component === 'All')
                            <th scope="col" class="px-4 py-3">Total Clearances</th>
                            <th scope="col" class="px-4 py-3">Status</th>
                        @else
                            <th scope="col" class="px-4 py-3">Status</th>
                        @endif
                        <th scope="col" class="px-4 py-3">Inactive Days</th>
                        <th scope="col" class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subprojects as $subproject)
                        <tr class="dark:bg-gray-900 dark:border-gray-700 bg-green-700">
                            <th scope="row" class="px-4 py-3 text-white">{{ $subproject->projectName }}</th>
                            <td class="px-4 py-3 text-white">{{ $subproject->proponent }}</td>
                            <td class="px-4 py-3 text-white">{{ $subproject->projectType }}</td>
                            <td class="px-4 py-3 text-white">{{ $subproject->projectCategory }}</td>
                            <td class="px-4 py-3 text-white">{{ number_format($subproject->indicativeCost, 2) }}</td>
                            @if ($component === 'All')
                                <td class="px-4 py-3 text-white">{{ $subproject->total ?? 'N/A' }}</td>
                                <td class="px-4 py-3 text-white">{{ $subproject->status }}</td>
                            @else
                                <td class="px-4 py-3 text-white">{{ $subproject->{$component} ?? 'Pending' }}</td>
                            @endif
                            <td class="px-4 py-3 text-white">{{ $subproject->inactiveDays }}</td>
                            <td class="px-4 py-3 flex items-center gap-3">
                                <a href="{{ route('admin.view-subproject', $subproject->id) }}"
                                    class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 dark:text-white bg-gray-400 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2">
                                    <img src="/images/eye.svg" alt="View" width="15" height="15">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="py-4 px-3">
            <div class="flex flex-wrap md:flex-nowrap justify-between items-center space-y-4 md:space-y-0">
                <div class="flex items-center space-x-2">
                    <label class="text-sm font-medium text-gray-900 dark:text-white">Per Page</label>
                    <select wire:model.live="perPage"
                        class="bg-gray-50 border border-gray-300 dark:bg-gray-900 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block py-2 px-3">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div>
                    {{ $subprojects->links() }}
                </div>
            </div>
        </div>
    @endif
</div>

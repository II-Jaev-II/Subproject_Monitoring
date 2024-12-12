<div>
    <div class="flex items-center justify-between d p-4">
        <div class="flex">
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left dark:text-gray-400">
            <thead class="text-xs dark:text-gray-300 dark:bg-green-900 uppercase bg-green-500">
                <tr>
                    <th scope="col" class="px-4 py-3">Subproject Name</th>
                    <th scope="col" class="px-4 py-3">Proponent</th>
                    <th scope="col" class="px-4 py-3">Estimated Project Cost (EPC)</th>
                    <th scope="col" class="px-4 py-3">Total Clearances</th>
                    <th scope="col" class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($subprojects->isEmpty())
                <tr class="dark:bg-gray-900 dark:border-gray-700 bg-green-700 text-white">
                    <td colspan="5" class="text-center px-4 py-3 dark:text-white">No Records Found.</td>
                </tr>
                @else
                @foreach ($subprojects as $subproject)
                <tr class="dark:bg-gray-900 dark:border-gray-700 bg-green-700 text-white">
                    <th scope="row" class="px-4 py-3 dark:text-white">
                        {{ $subproject->projectName }}
                    </th>
                    <td class="px-4 py-3 dark:text-white">{{ $subproject->proponent }}</td>
                    <td class="px-4 py-3 dark:text-white">
                        {{ number_format($subproject->indicativeCost, 2) }}
                    </td>
                    <td class="px-4 py-3 dark:text-white">{{ $subproject->total }}</td>
                    <td class="px-2 py-2 flex items-center gap-2">
                        <!-- View Button -->
                        <div class="relative group inline-block">
                            <a href="{{ $userType === 'IBUILD'
                                                ? route('ibuild.view-subproject', $subproject->id)
                                                : ($userType === 'IPLAN'
                                                    ? route('iplan.view-subproject', $subproject->id)
                                                    : ($userType === 'ECON'
                                                        ? route('econ.view-subproject', $subproject->id)
                                                        : ($userType === 'SES'
                                                            ? route('ses.view-subproject', $subproject->id)
                                                            : route('ggu.view-subproject', $subproject->id)))) }}"
                                class="flex items-center justify-center gap-2 border border-transparent text-sm md:text-base leading-4 font-medium rounded-md text-gray-700 dark:text-white bg-lime-300 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-4 py-3 sm:px-3 sm:py-2 w-12 h-12 sm:w-10 sm:h-10">
                                <img src="/images/eye.svg" alt="View" class="w-6 h-6 sm:w-5 sm:h-5">
                            </a>
                            <span
                                class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden text-xs sm:text-[10px] text-white bg-gray-800 rounded py-1 px-2 group-hover:block">
                                View
                            </span>
                        </div>
                        <!-- Edit Button -->
                        <div class="relative group inline-block">
                            <a href="{{ $userType === 'IBUILD'
                                                ? ($subproject->iBuildStatus
                                                    ? route('ibuild.edit-subproject', $subproject->id)
                                                    : route('ibuild.validate-subprojects', $subproject->id))
                                                : ($userType === 'IPLAN'
                                                    ? ($subproject->iPlanStatus
                                                        ? route('iplan.edit-subproject', $subproject->id)
                                                        : route('iplan.validate-subprojects', $subproject->id))
                                                    : ($userType === 'ECON'
                                                    ? ($subproject->econStatus
                                                        ? route('econ.edit-subproject', $subproject->id)
                                                        : route('econ.validate-subprojects', $subproject->id))
                                                        : ($userType === 'SES'
                                                            ? ($subproject->sesStatus
                                                                ? route('ses.edit-subproject', $subproject->id)
                                                                : route('ses.validate-subprojects', $subproject->id))
                                                            : ($userType === 'GGU'
                                                                ? ($subproject->gguStatus
                                                                    ? route('ggu.edit-subproject', $subproject->id)
                                                                    : route('ggu.validate-subprojects', $subproject->id))
                                                                : '#')))) }}"
                                class="flex items-center justify-center gap-2 border border-transparent text-sm md:text-base leading-4 font-medium rounded-md text-gray-700 dark:text-white bg-sky-300 dark:bg-sky-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-4 py-3 sm:px-3 sm:py-2 w-12 h-12 sm:w-10 sm:h-10">
                                <img src="/images/pencil-square.svg" alt="Edit" class="w-6 h-6 sm:w-5 sm:h-5">
                            </a>
                            <span
                                class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden text-xs sm:text-[10px] text-white bg-gray-800 rounded py-1 px-2 group-hover:block">
                                Edit
                            </span>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <div class="py-4 px-3">
        <div class="flex">
            <div class="flex space-x-4 items-center mb-3">
                <label class="w-32 text-sm font-medium text-gray-900 dark:text-white">Per Page</label>
                <select wire:model.live='perPage'
                    class="bg-gray-50 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
        {{ $subprojects->links() }}
    </div>
</div>
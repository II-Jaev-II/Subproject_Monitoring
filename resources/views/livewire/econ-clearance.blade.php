 <div>
     <div class="flex flex-wrap items-center justify-between p-4 space-y-4 md:space-y-0">
         <div class="flex w-full md:w-auto">
             <div class="relative w-full md:w-auto">
                 <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                     <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                         fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                         <path fill-rule="evenodd"
                             d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                             clip-rule="evenodd" />
                     </svg>
                 </div>
                 <input wire:model.live.debounce.300ms="search" type="text" class="bg-gray-50 dark:bg-gray-900 border border-gray-400 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2" placeholder="Search" required>
             </div>
         </div>
         <div class="flex flex-wrap items-center justify-between w-full md:w-auto md:flex-nowrap md:space-x-3">
             <label class="w-full md:w-40 text-sm font-medium text-gray-900 dark:text-white mb-2 md:mb-0">Validation Status:</label>
             <select wire:model.live="validationStatus" class="bg-gray-50 dark:bg-gray-900 border border-gray-400 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                 <option value="">All</option>
                 <option value="Cleared">Cleared</option>
                 <option value="Not Cleared">Not Cleared</option>
             </select>
         </div>
     </div>
     <div class="overflow-x-auto rounded-md">
         <table class="w-full text-sm text-left">
             <thead class="text-xs text-black dark:text-gray-300 dark:bg-green-900 uppercase bg-green-500">
                 <tr>
                     <th scope="col" class="px-4 py-3">Subproject Name</th>
                     <th scope="col" class="px-4 py-3">Proponent</th>
                     <th scope="col" class="px-4 py-3">Estimated Project Cost (EPC)</th>
                     <th scope="col" class="px-4 py-3">Validation Status</th>
                     <th scope="col" class="px-4 py-3">Actions</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($econRecords as $econRecord)
                 <tr class="dark:bg-gray-900 dark:border-gray-700 text-white bg-green-700">
                     <th scope="row" class="px-4 py-3">
                         {{ $econRecord->projectName }}
                     </th>
                     <td class="px-4 py-3 dark:text-white">{{ $econRecord->proponent }}</td>
                     <td class="px-4 py-3 dark:text-white">
                         {{ $econRecord->indicativeCost }}
                     </td>
                     <td class="px-4 py-3 dark:text-white">
                         {{ $econRecord->econ === 'OK' ? 'Cleared' : 'Not Cleared' }}
                     </td>
                     <td class="px-4 py-3 flex items-center gap-3">
                         <div class="relative group inline-block">
                             <a href="{{ $userType === 'IBUILD'
                                                ? route('ibuild.view-subproject', $econRecord->id)
                                                : ($userType === 'IPLAN'
                                                    ? route('iplan.view-subproject', $econRecord->id)
                                                    : ($userType === 'ECON'
                                                        ? route('econ.view-subproject', $econRecord->id)
                                                        : ($userType === 'SES'
                                                            ? route('ses.view-subproject', $econRecord->id)
                                                            : route('ggu.view-subproject', $econRecord->id)))) }}"
                                 class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 dark:text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2">
                                 <img src="/images/eye.svg" alt="View" width="15" height="15">
                             </a>
                             <span class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden text-xs text-white bg-gray-800 rounded py-1 px-2 group-hover:block">
                                 View
                             </span>
                         </div>
                     </td>
                 </tr>
                 @endforeach
             </tbody>
         </table>
     </div>
     <div class="py-4 px-3">
         <div class="flex flex-wrap items-center justify-between">
             <div class="flex space-x-4 items-center mb-3">
                 <label class="w-full md:w-32 text-sm font-medium text-gray-900 dark:text-white">Per Page</label>
                 <select wire:model.live='perPage' class="bg-gray-50 border border-gray-400 dark:border-gray-600 dark:bg-gray-900 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                     <option value="5">5</option>
                     <option value="10">10</option>
                     <option value="20">20</option>
                     <option value="50">50</option>
                     <option value="100">100</option>
                 </select>
             </div>
         </div>
         {{ $econRecords->links() }}
     </div>
 </div>
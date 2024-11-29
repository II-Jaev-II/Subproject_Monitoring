<div class="p-6">
    <div class="flex items-center justify-center mb-2">
        <h1 class="dark:text-lime-500 text-xl text-center">Clearances per component</h1>
    </div>
    <div class="overflow-x-auto rounded-md">
        <table class="w-full text-sm text-gray-500 dark:text-gray-400 text-center">
            <thead class="text-xs text-black dark:text-gray-300 dark:bg-green-900 uppercase bg-green-500">
                <tr>
                    <th scope="col" class="px-2 py-2 sm:px-4 sm:py-3">iPLAN</th>
                    <th scope="col" class="px-2 py-2 sm:px-4 sm:py-3">iBUILD</th>
                    <th scope="col" class="px-2 py-2 sm:px-4 sm:py-3">ECON</th>
                    <th scope="col" class="px-2 py-2 sm:px-4 sm:py-3">SES</th>
                    <th scope="col" class="px-2 py-2 sm:px-4 sm:py-3">GGU</th>
                    <th scope="col" class="px-2 py-2 sm:px-4 sm:py-3">IREAP</th>
                </tr>
            </thead>
            <tbody>
                <tr class="dark:bg-gray-900 dark:border-gray-700 bg-green-700 text-white">
                    <td class="px-2 py-2 sm:px-4 sm:py-3 text-white">{{ $subprojects->where('iPLAN', 'OK')->count() }}</td>
                    <td class="px-2 py-2 sm:px-4 sm:py-3 text-white">{{ $subprojects->where('iBUILD', 'OK')->count() }}</td>
                    <td class="px-2 py-2 sm:px-4 sm:py-3 text-white">{{ $subprojects->where('econ', 'OK')->count() }}</td>
                    <td class="px-2 py-2 sm:px-4 sm:py-3 text-white">{{ $subprojects->where('ses', 'OK')->count() }}</td>
                    <td class="px-2 py-2 sm:px-4 sm:py-3 text-white">{{ $subprojects->where('ggu', 'OK')->count() }}</td>
                    <td class="px-2 py-2 sm:px-4 sm:py-3 text-white">{{ $subprojects->where('iREAP', 'OK')->count() }}</td>
                </tr>
                <tr class="dark:bg-gray-900 bg-green-700 border-t-2 border-white">
                    <td class="px-2 py-2 sm:px-4 sm:py-3">
                        <div class="relative group inline-block">
                            <a href="#" @click.prevent="selectedComponent = 'IPLAN'"
                                :class="{
                                'dark:bg-lime-500 bg-green-500': selectedComponent === 'IPLAN',
                                'bg-gray-400 dark:bg-gray-500 dark:hover:bg-gray-400 hover:bg-gray-300 ease-in-out duration-300': selectedComponent !== 'IPLAN'
                            }"
                                class="flex justify-center px-2 py-1 rounded-md">
                                <img src="/images/eye.svg" alt="View" class="w-5 h-5">
                            </a>
                            <span
                                class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden text-xs text-white bg-gray-800 rounded py-1 px-2 group-hover:block">
                                View
                            </span>
                        </div>
                    </td>
                    <td class="px-2 py-2 sm:px-4 sm:py-3">
                        <div class="relative group inline-block">
                            <a href="" @click.prevent="selectedComponent = 'IBUILD'"
                                :class="{
                                'dark:bg-lime-500 bg-green-500': selectedComponent === 'IBUILD',
                                'bg-gray-400 dark:bg-gray-500 dark:hover:bg-gray-400 hover:bg-gray-300 ease-in-out duration-300': selectedComponent !== 'IBUILD'
                            }"
                                class="flex justify-center px-2 py-1 rounded-md">
                                <img src="/images/eye.svg" alt="View" class="w-5 h-5">
                            </a>
                            <span
                                class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden text-xs text-white bg-gray-800 rounded py-1 px-2 group-hover:block">
                                View
                            </span>
                        </div>
                    </td>
                    <td class="px-2 py-2 sm:px-4 sm:py-3">
                        <div class="relative group inline-block">
                            <a href="" @click.prevent="selectedComponent = 'ECON'"
                                :class="{
                                'dark:bg-lime-500 bg-green-500': selectedComponent === 'ECON',
                                'bg-gray-400 dark:bg-gray-500 dark:hover:bg-gray-400 hover:bg-gray-300 ease-in-out duration-300': selectedComponent !== 'ECON'
                            }"
                                class="flex justify-center px-2 py-1 rounded-md">
                                <img src="/images/eye.svg" alt="View" class="w-5 h-5">
                            </a>
                            <span
                                class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden text-xs text-white bg-gray-800 rounded py-1 px-2 group-hover:block">
                                View
                            </span>
                        </div>
                    </td>
                    <td class="px-2 py-2 sm:px-4 sm:py-3">
                        <div class="relative group inline-block">
                            <a href="" @click.prevent="selectedComponent = 'SES'"
                                :class="{
                                'dark:bg-lime-500 bg-green-500': selectedComponent === 'SES',
                                'bg-gray-400 dark:bg-gray-500 dark:hover:bg-gray-400 hover:bg-gray-300 ease-in-out duration-300': selectedComponent !== 'SES'
                            }"
                                class="flex justify-center px-2 py-1 rounded-md">
                                <img src="/images/eye.svg" alt="View" class="w-5 h-5">
                            </a>
                            <span
                                class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden text-xs text-white bg-gray-800 rounded py-1 px-2 group-hover:block">
                                View
                            </span>
                        </div>
                    </td>
                    <td class="px-2 py-2 sm:px-4 sm:py-3">
                        <div class="relative group inline-block">
                            <a href="" @click.prevent="selectedComponent = 'GGU'"
                                :class="{
                                'dark:bg-lime-500 bg-green-500': selectedComponent === 'GGU',
                                'bg-gray-400 dark:bg-gray-500 dark:hover:bg-gray-400 hover:bg-gray-300 ease-in-out duration-300': selectedComponent !== 'GGU'
                            }"
                                class="flex justify-center px-2 py-1 rounded-md">
                                <img src="/images/eye.svg" alt="View" class="w-5 h-5">
                            </a>
                            <span
                                class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden text-xs text-white bg-gray-800 rounded py-1 px-2 group-hover:block">
                                View
                            </span>
                        </div>
                    </td>
                    <td class="px-2 py-2 sm:px-4 sm:py-3">
                        <div class="relative group inline-block">
                            <a href="" @click.prevent="selectedComponent = 'IREAP'"
                                :class="{
                                'dark:bg-lime-500 bg-green-500': selectedComponent === 'IREAP',
                                'bg-gray-400 dark:bg-gray-500 dark:hover:bg-gray-400 hover:bg-gray-300 ease-in-out duration-300': selectedComponent !== 'IREAP'
                            }"
                                class="flex justify-center px-2 py-1 rounded-md">
                                <img src="/images/eye.svg" alt="View" class="w-5 h-5">
                            </a>
                            <span
                                class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden text-xs text-white bg-gray-800 rounded py-1 px-2 group-hover:block">
                                View
                            </span>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
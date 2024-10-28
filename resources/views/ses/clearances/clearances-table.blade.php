<div class="p-6 text-gray-900 dark:text-gray-100">
    <div class="flex items-center justify-center mb-2">
        <h1 class="dark:text-lime-500 text-xl">Clearances per component</h1>
    </div>
    <table class="w-full text-sm text-gray-500 dark:text-gray-400" style="text-align: center;">
        <thead class="text-xs dark:text-gray-300 dark:bg-green-900 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-4 py-3">iPLAN</th>
                <th scope="col" class="px-4 py-3">iBUILD</th>
                <th scope="col" class="px-4 py-3">ECON</th>
                <th scope="col" class="px-4 py-3">SES</th>
                <th scope="col" class="px-4 py-3">GGU</th>
            </tr>
        </thead>
        <tbody>
            <tr class="dark:bg-gray-900 dark:border-gray-700">
                <td class="px-4 py-3 dark:text-white">{{ $subprojects->where('iPLAN', 'OK')->count() }}</td>
                <td class="px-4 py-3 dark:text-white">{{ $subprojects->where('iBUILD', 'OK')->count() }}</td>
                <td class="px-4 py-3 dark:text-white">{{ $subprojects->where('econ', 'OK')->count() }}</td>
                <td class="px-4 py-3 dark:text-white">{{ $subprojects->where('ses', 'OK')->count() }}</td>
                <td class="px-4 py-3 dark:text-white">{{ $subprojects->where('ggu', 'OK')->count() }}</td>
            </tr>
            <tr class="dark:bg-gray-900 border-t-2 border-white">
                <td class="px-4 py-3">
                    <div class="relative group inline-block">
                        <a href="#" @click.prevent="selectedComponent = 'IPLAN'"
                            :class="{
                                'dark:bg-lime-500': selectedComponent === 'IPLAN',
                                'bg-gray-400 dark:bg-gray-500 dark:hover:bg-gray-400 ease-in-out duration-300': selectedComponent !== 'IPLAN'
                            }"
                            class="flex items-center border border-transparent rounded-md px-2 py-1">
                            <img src="/images/eye.svg" alt="View" width="20" height="20">
                        </a>
                        <span
                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden text-xs text-white bg-gray-800 rounded py-1 px-2 group-hover:block">
                            View
                        </span>
                    </div>
                </td>
                <td class="px-4 py-3">
                    <div class="relative group inline-block">
                        <a href="" @click.prevent="selectedComponent = 'IBUILD'"
                            :class="{
                                'dark:bg-lime-500': selectedComponent === 'IBUILD',
                                'bg-gray-400 dark:bg-gray-500 dark:hover:bg-gray-400 ease-in-out duration-300': selectedComponent !== 'IBUILD'
                            }"
                            class="flex items-center border border-transparent rounded-md px-2 py-1">
                            <img src="/images/eye.svg" alt="View" width="20" height="20">
                        </a>
                        <span
                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden text-xs text-white bg-gray-800 rounded py-1 px-2 group-hover:block">
                            View
                        </span>
                    </div>
                </td>
                <td class="px-4 py-3">
                    <div class="relative group inline-block">
                        <a href="" @click.prevent="selectedComponent = 'ECON'"
                            :class="{
                                'dark:bg-lime-500': selectedComponent === 'ECON',
                                'bg-gray-400 dark:bg-gray-500 dark:hover:bg-gray-400 ease-in-out duration-300': selectedComponent !== 'ECON'
                            }"
                            class="flex items-center border border-transparent rounded-md px-2 py-1">
                            <img src="/images/eye.svg" alt="View" width="20" height="20">
                        </a>
                        <span
                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden text-xs text-white bg-gray-800 rounded py-1 px-2 group-hover:block">
                            View
                        </span>
                    </div>
                </td>
                <td class="px-4 py-3">
                    <div class="relative group inline-block">
                        <a href="" @click.prevent="selectedComponent = 'SES'"
                            :class="{
                                'dark:bg-lime-500': selectedComponent === 'SES',
                                'bg-gray-400 dark:bg-gray-500 dark:hover:bg-gray-400 ease-in-out duration-300': selectedComponent !== 'SES'
                            }"
                            class="flex items-center border border-transparent rounded-md px-2 py-1">
                            <img src="/images/eye.svg" alt="View" width="20" height="20">
                        </a>
                        <span
                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden text-xs text-white bg-gray-800 rounded py-1 px-2 group-hover:block">
                            View
                        </span>
                    </div>
                </td>
                <td class="px-4 py-3">
                    <div class="relative group inline-block">
                        <a href="" @click.prevent="selectedComponent = 'GGU'"
                            :class="{
                                'dark:bg-lime-500': selectedComponent === 'GGU',
                                'bg-gray-400 dark:bg-gray-500 dark:hover:bg-gray-400 ease-in-out duration-300': selectedComponent !== 'GGU'
                            }"
                            class="flex items-center border border-transparent rounded-md px-2 py-1">
                            <img src="/images/eye.svg" alt="View" width="20" height="20">
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

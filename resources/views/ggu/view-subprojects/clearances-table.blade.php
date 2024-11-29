<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs dark:text-gray-300 dark:bg-green-900 bg-green-500 text-black uppercase">
        <tr>
            <th scope="col" class="px-4 py-3">iPLAN</th>
            <th scope="col" class="px-4 py-3">iBUILD</th>
            <th scope="col" class="px-4 py-3">ECON</th>
            <th scope="col" class="px-4 py-3">SES</th>
            <th scope="col" class="px-4 py-3">GGU</th>
            @if($subprojects->projectType === 'VCRI')
            <th scope="col" class="px-4 py-3">IREAP</th>
            @endif
        </tr>
    </thead>
    <tbody>
        <tr class="dark:bg-gray-900 bg-green-700 dark:border-gray-700 text-white">
            <td class="px-4 py-3 dark:text-white">{{ $subprojects->iPLAN }}</td>
            <td class="px-4 py-3 dark:text-white">{{ $subprojects->iBUILD }}</td>
            <td class="px-4 py-3 dark:text-white">{{ $subprojects->econ }}</td>
            <td class="px-4 py-3 dark:text-white">{{ $subprojects->ses }}</td>
            <td class="px-4 py-3 dark:text-white">{{ $subprojects->ggu }}</td>
            @if($subprojects->projectType === 'VCRI')
            <td class="px-4 py-3 dark:text-white">{{ $subprojects->iREAP }}</td>
            @endif
        </tr>
    </tbody>
</table>
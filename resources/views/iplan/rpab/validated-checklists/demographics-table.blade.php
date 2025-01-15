<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Total Population</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->totalPopulationStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->totalPopulationComments }}</td>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Average Household Size</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->averageHouseholdSizeStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->averageHouseholdSizeComments }}</td>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Education of Population <span class="italic text-sm dark:text-gray-400">(if available)</span></td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->educationPopulationStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->educationPopulationComments }}</td>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Barangays, classifications, land area, no. of household, population</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->populationStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->populationComments }}</td>
</tr>
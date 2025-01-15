<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Priority commodities (highlight commodity industry where SP will be linked)</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->priorityCommoditiesStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->priorityCommoditiesComments }}</td>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Existing markets (nearby provinces, local, and other major markets even outside the region if applicable)</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->existingMarketsStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->existingMarketsComments }}</td>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Soil description (suitability and characteristics) e.g. sandy, loam, clay, terrain</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->soilDescriptionStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->soilDescriptionComments }}</td>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Agricultural vision or thrusts (e.g. mechanization, cooperation and association, high-value commodities)</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->agriculturalVisionStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->agriculturalVisionComments }}</td>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Water resources (e.g. rivers, electric pumps, wells)</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->waterResourcesStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->waterResourcesComments }}</td>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Climate & Rainfall</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->climateRainfallStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->climateRainfallComments }}</td>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Enterprises available (e.g. small-scale processing)</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->enterprisesAvailableStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->enterprisesAvailableComments }}</td>
</tr>
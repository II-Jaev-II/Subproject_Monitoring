<tr class="dark:bg-lime-800 bg-lime-400 uppercase">
    <th colspan="3" class="px-3 py-2 text-xs">&#x2022; The Road Influence Area</th>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Beneficiaries' demographics</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->beneficiariesDemographicsStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->beneficiariesDemographicsComments }}</td>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">No. of households</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->numberHouseholdsStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->numberHouseholdsComments }}</td>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Highlight how it will affect IPs (if any), women, children, and those in the marginal sector</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->highlightStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->highlightComments }}</td>
</tr>
<tr class="dark:bg-lime-800 bg-lime-400 uppercase">
    <th colspan="3" class="px-3 py-2 text-xs">&#x2022; Major Economy & Land Use</th>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Commodity Area</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->commodityAreaStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->commodityAreaComments }}</td>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Priority commodities in the location of SP</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->priorityCommoditiesLocationStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->priorityCommoditiesLocationComments }}</td>
</tr>
<tr class="dark:bg-lime-800 bg-lime-400 uppercase">
    <th colspan="3" class="px-3 py-2 text-xs">&#x2022; Poverty Incidence</th>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400"> What percentage of the residents are living in the area (if available)</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->percentageResidentsStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->percentageResidentsComments }}</td>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Living conditions of people in poverty</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->livingConditionsStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->livingConditionsComments }}</td>
</tr>
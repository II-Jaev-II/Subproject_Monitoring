<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Percentage of agriculture income & employment or contribution of agricultural sector in the economy</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->agricultureIncomeStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->agricultureIncomeComments }}</td>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Income disaggregation by sector</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->incomeDisaggregationStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->incomeDisaggregationComments }}</td>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Poverty Incidence (2018 or 2021 PSA data)</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->povertyIncidenceStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->povertyIncidenceComments }}</td>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Available Facilities (post-harvest facilities, banks, agri-markets)</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->availableFacilitiesStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->availableFacilitiesComments }}</td>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Economic vision or thrusts</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->economicVisionStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->economicVisionComments }}</td>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Employment rate & disaggregation by sector</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->employmentRateStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->employmentRateComments }}</td>
</tr>
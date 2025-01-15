<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Geography</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->geographyStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->geographyComments }}</td>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Land Area & Description</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->landAreaDescriptionStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->landAreaDescriptionComments }}</td>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">DILG Income Classification</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->incomeClassificationStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->incomeClassificationComments }}</td>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">What is the place known for? (interesting facts)</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->interestingFactsStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->interestingFactsComments }}</td>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Brief rural & economic situationer (relative to other municipalities or provinces)</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->briefRuralStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->briefRuralComments }}</td>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">SGLG, notable awards, or other distinguishing traits</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->awardsStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->awardsComments }}</td>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Vision in agriculture</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->visionAgricultureStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->visionAgricultureComments }}</td>
</tr>
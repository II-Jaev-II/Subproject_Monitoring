<tr class="dark:bg-lime-800 bg-lime-400 uppercase">
    <th colspan="3" class="px-3 py-2 text-xs">&#x2022; E-VSA Maps and Statistics</th>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">If low rank in e-VSA, we may discuss strong points on: (1) poverty incidence; (2) land suitability; (3) production; (4) market; (5) number of raisers (6) hogs inventory
        -5-year production area</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->evsaStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->evsaComments }}</td>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">5 year production area</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->productionAreaStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->productionAreaComments }}</td>
</tr>
<tr class="dark:bg-lime-800 bg-lime-400 uppercase">
    <th colspan="3" class="px-3 py-2 text-xs">&#x2022; Value Chain Summary</th>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Discuss constraint and intervention to which SP is linked (To be based on the draft VCA)</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->discussConstraintStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->discussConstraintComments }}</td>
</tr>
<tr class="dark:bg-lime-800 bg-lime-400 uppercase">
    <th colspan="3" class="px-3 py-2 text-xs">&#x2022; Commodity Profile</th>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Available product forms</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->availableProductFormStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->availableProductFormComments }}</td>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">Discuss constraint and intervention to which SP is linked (see PCIP)</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->discussInterventionStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->discussInterventionComments }}</td>
</tr>
<tr class="dark:bg-lime-800 bg-lime-400 uppercase">
    <th colspan="3" class="px-3 py-2 text-xs">&#x2022; Proposed/Existing Enterprises to be supported by the Subproject</th>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">How does the SP improve the value-adding mechanism?</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->valueAddingMechanismStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->valueAddingMechanismComments }}</td>
</tr>
<tr class="dark:bg-gray-800 dark:border-gray-700 text-white">
    <td class="px-4 py-3 border-2 border-gray-400">How does this increase value to the commodity?</td>
    <td class="px-4 py-3 border-2 border-gray-400 text-center">{{ $iPlanChecklist->increaseValueStatus === 'complied' ? 'Complied' : 'Not Complied' }}</td>
    <td class="px-4 py-3 border-2 border-gray-400 break-words whitespace-normal">{{ $iPlanChecklist->increaseValueComments }}</td>
</tr>
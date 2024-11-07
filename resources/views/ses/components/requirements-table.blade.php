<div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-6">
    <table class="w-full text-sm text-center">
        <thead class="text-xs dark:text-lime-500 uppercase bg-gray-50 dark:bg-gray-700">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Requirements
                </th>
                <th scope="col" class="px-6 py-3">
                    Deadline
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($sesRequirements as $sesRequirement)
            <tr class="dark:bg-gray-900 dark:border-gray-700">
                <td class="px-4 py-3 dark:text-white">{{ $sesRequirement->requirement }}</td>
                <td class="px-4 py-3 dark:text-white">
                    {{ $sesRequirement->deadline }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
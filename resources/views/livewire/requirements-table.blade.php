<div x-show="selectedCheckbox" class="relative overflow-x-auto shadow-md sm:rounded-lg mb-6">
    <table class="w-full text-sm text-center">
        <thead>
            <tr class="text-xs dark:text-lime-500 uppercase bg-green-500 dark:bg-gray-700">
                <th class="px-4 py-2">Requirement</th>
                <th class="px-4 py-2">Deadline</th>
                <th class="px-4 py-2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requirements as $index => $requirement)
            <tr>
                <td class="px-4 py-2 border-b border-r border-gray-400">
                    <input name="requirements[{{ $index }}][requirement]" type="text" class="w-full px-2 py-1 border rounded dark:bg-gray-900" wire:model="requirements.{{ $index }}.requirement" :required="selectedCheckbox">
                </td>
                <td class="px-4 py-2 border-b border-r border-gray-400">
                    <input name="requirements[{{ $index }}][deadline]" type="text" class="w-full px-2 py-1 border rounded dark:bg-gray-900" wire:model="requirements.{{ $index }}.deadline" :required="selectedCheckbox">
                </td>
                <td class="px-4 py-2 border-b border-gray-400 text-center">
                    <button type="button" wire:click="removeRow({{ $index }})" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                        Remove
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="px-4 py-4 mt-4">
        <button type="button" wire:click="addRow" class="px-4 py-2 bg-lime-600 text-white rounded hover:bg-lime-700">
            Add more requirement
        </button>
    </div>
</div>
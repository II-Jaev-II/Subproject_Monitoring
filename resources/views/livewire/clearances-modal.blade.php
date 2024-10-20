<div x-data="{ show: false }" x-show="show" x-on:open-modal.window="show = true" x-on:close-modal.window="show = false"
    x-on:keydown.escape.window="show = false" class="fixed z-50 inset-0">
    <div class="fixed inset-0 bg-gray-900 opacity-50"></div>
    <div class="bg-gray-700 rounded m-auto fixed inset-0 max-w-3xl max-h-96">
        <div class="flex justify-end">
            <button x-data x-on:click="$dispatch('close-modal')"
                class="bg-transparent text-white hover:bg-gray-600 rounded p-2 text-lg">
                X
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs dark:text-gray-300 dark:bg-green-900 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-4 py-3">iPLAN</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subprojects as $subproject)
                        <tr class="dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 dark:text-white">
                                {{ $subproject->iPLAN }}
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

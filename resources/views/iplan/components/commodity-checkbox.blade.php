<div class="grid grid-cols-2 md:flex items-center gap-4 mt-2 mb-2" x-data="{ items: ['Mango', 'Onion', 'Goat', 'Peanut', 'Tomato', 'Mungbean', 'Bangus', 'Garlic', 'Coffee', 'Hogs', 'Others'] }">
    <template x-for="item in items" :key="item">
        <div class="flex items-center gap-2">
            <input class="dark:bg-gray-800 rounded-sm" type="checkbox" :value="item" name="commodities[]"
                x-model="selectedCommodities">
            <label x-text="item"></label>
        </div>
    </template>
</div>

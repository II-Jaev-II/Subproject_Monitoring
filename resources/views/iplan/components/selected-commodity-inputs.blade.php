<div x-cloak style="display: none !important" x-show="selectedCommodities.includes('Mango')" x-transition class="mt-2 mb-2"
    x-effect="if (!selectedCommodities.includes('Mango')) { $refs.evsaRankMango.value = ''; $refs.compositeIndexMango.value = ''; }">
    <div class="grid grid-cols-2 gap-2">
        <div>
            <label for="evsaRankMango" class="dark:text-green-600">E-VSA Rank (Mango)</label>
            <input type="text" name="evsaRankMango" id="evsaRankMango" value="{{ old('evsaRankMango') }}"
                x-ref="evsaRankMango" class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
                :required="selectedCommodities.includes('Mango')" step="1" min="0" inputmode="numeric"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
        </div>
        <div>
            <label for="compositeIndexMango" class="dark:text-green-600">Composite Index (Mango)</label>
            <input type="text" name="compositeIndexMango" id="compositeIndexMango"
                value="{{ old('compositeIndexMango') }}" x-ref="compositeIndexMango"
                class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
                :required="selectedCommodities.includes('Mango')" inputmode="decimal"
                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')">
        </div>
    </div>
</div>
<div x-cloak style="display: none !important" x-show="selectedCommodities.includes('Onion')" x-transition
    class="mt-2 mb-2"
    x-effect="if (!selectedCommodities.includes('Onion')) { $refs.evsaRankOnion.value = ''; $refs.compositeIndexOnion.value = ''; }">
    <div class="grid grid-cols-2 gap-2">
        <div>
            <label for="evsaRankOnion" class="dark:text-green-600">E-VSA Rank (Onion)</label>
            <input type="text" name="evsaRankOnion" id="evsaRankOnion" value="{{ old('evsaRankOnion') }}"
                x-ref="evsaRankOnion" class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
                :required="selectedCommodities.includes('Onion')" step="1" min="0" inputmode="numeric"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
        </div>
        <div>
            <label for="compositeIndexOnion" class="dark:text-green-600">Composite Index (Onion)</label>
            <input type="text" name="compositeIndexOnion" id="compositeIndexOnion"
                value="{{ old('compositeIndexOnion') }}" x-ref="compositeIndexOnion"
                class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
                :required="selectedCommodities.includes('Onion')" inputmode="decimal"
                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')">
        </div>
    </div>
</div>
<div x-cloak style="display: none !important" x-show="selectedCommodities.includes('Goat')" x-transition
    class="mt-2 mb-2"
    x-effect="if (!selectedCommodities.includes('Goat')) { $refs.evsaRankGoat.value = ''; $refs.compositeIndexGoat.value = ''; }">
    <div class="grid grid-cols-2 gap-2">
        <div>
            <label for="evsaRankGoat" class="dark:text-green-600">E-VSA Rank (Goat)</label>
            <input type="text" name="evsaRankGoat" id="evsaRankGoat" value="{{ old('evsaRankGoat') }}"
                x-ref="evsaRankGoat" class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
                :required="selectedCommodities.includes('Goat')" step="1" min="0" inputmode="numeric"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
        </div>
        <div>
            <label for="compositeIndexGoat" class="dark:text-green-600">Composite Index (Goat)</label>
            <input type="text" name="compositeIndexGoat" id="compositeIndexGoat"
                value="{{ old('compositeIndexGoat') }}" x-ref="compositeIndexGoat"
                class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
                :required="selectedCommodities.includes('Goat')" inputmode="decimal"
                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')">
        </div>
    </div>
</div>
<div x-cloak style="display: none !important" x-show="selectedCommodities.includes('Peanut')" x-transition
    class="mt-2 mb-2"
    x-effect="if (!selectedCommodities.includes('Peanut')) { $refs.evsaRankPeanut.value = ''; $refs.compositeIndexPeanut.value = ''; }">
    <div class="grid grid-cols-2 gap-2">
        <div>
            <label for="evsaRankPeanut" class="dark:text-green-600">E-VSA Rank (Peanut)</label>
            <input type="text" name="evsaRankPeanut" id="evsaRankPeanut" value="{{ old('evsaRankPeanut') }}"
                x-ref="evsaRankPeanut" class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
                :required="selectedCommodities.includes('Peanut')" step="1" min="0" inputmode="numeric"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
        </div>
        <div>
            <label for="compositeIndexPeanut" class="dark:text-green-600">Composite Index (Peanut)</label>
            <input type="text" name="compositeIndexPeanut" id="compositeIndexPeanut"
                value="{{ old('compositeIndexPeanut') }}" x-ref="compositeIndexPeanut"
                class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
                :required="selectedCommodities.includes('Peanut')" inputmode="decimal"
                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')">
        </div>
    </div>
</div>
<div x-cloak style="display: none !important" x-show="selectedCommodities.includes('Tomato')" x-transition
    class="mt-2 mb-2"
    x-effect="if (!selectedCommodities.includes('Tomato')) { $refs.evsaRankTomato.value = ''; $refs.compositeIndexTomato.value = ''; }">
    <div class="grid grid-cols-2 gap-2">
        <div>
            <label for="evsaRankTomato" class="dark:text-green-600">E-VSA Rank (Tomato)</label>
            <input type="text" name="evsaRankTomato" id="evsaRankTomato" value="{{ old('evsaRankTomato') }}"
                x-ref="evsaRankTomato" class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
                :required="selectedCommodities.includes('Tomato')" step="1" min="0" inputmode="numeric"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
        </div>
        <div>
            <label for="compositeIndexTomato" class="dark:text-green-600">Composite Index (Tomato)</label>
            <input type="text" name="compositeIndexTomato" id="compositeIndexTomato"
                value="{{ old('compositeIndexTomato') }}" x-ref="compositeIndexTomato"
                class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
                :required="selectedCommodities.includes('Tomato')" inputmode="decimal"
                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')">
        </div>
    </div>
</div>
<div x-cloak style="display: none !important" x-show="selectedCommodities.includes('Mungbean')" x-transition
    class="mt-2 mb-2"
    x-effect="if (!selectedCommodities.includes('Mungbean')) { $refs.evsaRankMungbean.value = ''; $refs.compositeIndexMungbean.value = ''; }">
    <div class="grid grid-cols-2 gap-2">
        <div>
            <label for="evsaRankMungbean" class="dark:text-green-600">E-VSA Rank (Mungbean)</label>
            <input type="text" name="evsaRankMungbean" id="evsaRankMungbean"
                value="{{ old('evsaRankMungbean') }}" x-ref="evsaRankMungbean"
                class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
                :required="selectedCommodities.includes('Mungbean')" step="1" min="0" inputmode="numeric"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
        </div>
        <div>
            <label for="compositeIndexMungbean" class="dark:text-green-600">Composite Index (Mungbean)</label>
            <input type="text" name="compositeIndexMungbean" id="compositeIndexMungbean"
                value="{{ old('compositeIndexMungbean') }}" x-ref="compositeIndexMungbean"
                class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
                :required="selectedCommodities.includes('Mungbean')" inputmode="decimal"
                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')">
        </div>
    </div>
</div>
<div x-cloak style="display: none !important" x-show="selectedCommodities.includes('Bangus')" x-transition
    class="mt-2 mb-2"
    x-effect="if (!selectedCommodities.includes('Bangus')) { $refs.evsaRankBangus.value = ''; $refs.compositeIndexBangus.value = ''; }">
    <div class="grid grid-cols-2 gap-2">
        <div>
            <label for="evsaRankBangus" class="dark:text-green-600">E-VSA Rank (Bangus)</label>
            <input type="text" name="evsaRankBangus" id="evsaRankBangus" value="{{ old('evsaRankBangus') }}"
                x-ref="evsaRankBangus" class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
                :required="selectedCommodities.includes('Bangus')" step="1" min="0" inputmode="numeric"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
        </div>
        <div>
            <label for="compositeIndexBangus" class="dark:text-green-600">Composite Index (Bangus)</label>
            <input type="text" name="compositeIndexBangus" id="compositeIndexBangus"
                value="{{ old('compositeIndexBangus') }}" x-ref="compositeIndexBangus"
                class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
                :required="selectedCommodities.includes('Bangus')" inputmode="decimal"
                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')">
        </div>
    </div>
</div>
<div x-cloak style="display: none !important" x-show="selectedCommodities.includes('Garlic')" x-transition
    class="mt-2 mb-2"
    x-effect="if (!selectedCommodities.includes('Garlic')) { $refs.evsaRankGarlic.value = ''; $refs.compositeIndexGarlic.value = ''; }">
    <div class="grid grid-cols-2 gap-2">
        <div>
            <label for="evsaRankGarlic" class="dark:text-green-600">E-VSA Rank (Garlic)</label>
            <input type="text" name="evsaRankGarlic" id="evsaRankGarlic" value="{{ old('evsaRankGarlic') }}"
                x-ref="evsaRankGarlic" class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
                :required="selectedCommodities.includes('Garlic')" step="1" min="0" inputmode="numeric"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
        </div>
        <div>
            <label for="compositeIndexGarlic" class="dark:text-green-600">Composite Index (Garlic)</label>
            <input type="text" name="compositeIndexGarlic" id="compositeIndexGarlic"
                value="{{ old('compositeIndexGarlic') }}" x-ref="compositeIndexGarlic"
                class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
                :required="selectedCommodities.includes('Garlic')" inputmode="decimal"
                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')">
        </div>
    </div>
</div>
<div x-cloak style="display: none !important" x-show="selectedCommodities.includes('Coffee')" x-transition
    class="mt-2 mb-2"
    x-effect="if (!selectedCommodities.includes('Coffee')) { $refs.evsaRankCoffee.value = ''; $refs.compositeIndexCoffee.value = ''; }">
    <div class="grid grid-cols-2 gap-2">
        <div>
            <label for="evsaRankCoffee" class="dark:text-green-600">E-VSA Rank (Coffee)</label>
            <input type="text" name="evsaRankCoffee" id="evsaRankCoffee" value="{{ old('evsaRankCoffee') }}"
                x-ref="evsaRankCoffee" class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
                :required="selectedCommodities.includes('Coffee')" step="1" min="0" inputmode="numeric"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
        </div>
        <div>
            <label for="compositeIndexCoffee" class="dark:text-green-600">Composite Index (Coffee)</label>
            <input type="text" name="compositeIndexCoffee" id="compositeIndexCoffee"
                value="{{ old('compositeIndexCoffee') }}" x-ref="compositeIndexCoffee"
                class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
                :required="selectedCommodities.includes('Coffee')" inputmode="decimal"
                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')">
        </div>
    </div>
</div>
<div x-cloak style="display: none !important" x-show="selectedCommodities.includes('Hogs')" x-transition
    class="mt-2 mb-2"
    x-effect="if (!selectedCommodities.includes('Hogs')) { $refs.evsaRankHogs.value = ''; $refs.compositeIndexHogs.value = ''; }">
    <div class="grid grid-cols-2 gap-2">
        <div>
            <label for="evsaRankHogs" class="dark:text-green-600">E-VSA Rank (Hogs)</label>
            <input type="text" name="evsaRankHogs" id="evsaRankHogs" value="{{ old('evsaRankHogs') }}"
                x-ref="evsaRankHogs" class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
                :required="selectedCommodities.includes('Hogs')" step="1" min="0" inputmode="numeric"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
        </div>
        <div>
            <label for="compositeIndexHogs" class="dark:text-green-600">Composite Index (Hogs)</label>
            <input type="text" name="compositeIndexHogs" id="compositeIndexHogs"
                value="{{ old('compositeIndexHogs') }}" x-ref="compositeIndexHogs"
                class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
                :required="selectedCommodities.includes('Hogs')" inputmode="decimal"
                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')">
        </div>
    </div>
</div>
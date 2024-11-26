@if ($subprojects->iPLAN === 'Pending')
<div class="mb-2">
    @if (!$iPlanChecklists->explanation && !$iPlanChecklists->justificationFile)
    <div class="mb-2">
        <p
            class="text-md font-bold dark:text-red-700 dark:bg-red-300 bg-red-300 text-red-800 w-fit px-2 py-3 border-red-300 rounded-md">
            Justification for rank/composite index is pending
        </p>
    </div>
    @endif
</div>
@endif

@if ($iPlanChecklists && $iPlanChecklists->reviewDate)
<div class="flex items-center space-x-4 mb-2">
    <label for="reviewDate" class="dark:text-lime-500 text-sm md:text-base">Date of Review</label>
    <input type="text" name="reviewDate" id="reviewDate" value="{{ $formattedReviewDateIPlan }}"
        class="dark:bg-gray-900 rounded-md dark:[color-scheme:dark]" readonly>
</div>
@endif

<div class="mb-2">
    <label for="commodities" class="dark:text-lime-500 text-sm md:text-base">Priority commodity supported by the SP Proposal</label>
    <input type="text"
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
        value="{{ implode(', ', $commodities->pluck('commodityName')->toArray()) }}" readonly>
</div>

@if (isset($rankAndComposite) &&
(optional($rankAndComposite)->evsaRankMango ||
optional($rankAndComposite)->compositeIndexMango ||
optional($rankAndComposite)->evsaRankOnion ||
optional($rankAndComposite)->compositeIndexOnion ||
optional($rankAndComposite)->evsaRankGoat ||
optional($rankAndComposite)->compositeIndexGoat ||
optional($rankAndComposite)->evsaRankPeanut ||
optional($rankAndComposite)->compositeIndexPeanut ||
optional($rankAndComposite)->evsaRankTomato ||
optional($rankAndComposite)->compositeIndexTomato ||
optional($rankAndComposite)->evsaRankMungbean ||
optional($rankAndComposite)->compositeIndexMungbean ||
optional($rankAndComposite)->evsaRankBangus ||
optional($rankAndComposite)->compositeIndexBangus ||
optional($rankAndComposite)->evsaRankGarlic ||
optional($rankAndComposite)->compositeIndexGarlic ||
optional($rankAndComposite)->evsaRankCoffee ||
optional($rankAndComposite)->compositeIndexCoffee ||
optional($rankAndComposite)->evsaRankHogs ||
optional($rankAndComposite)->compositeIndexHogs))
<div class="mb-4">
    <div class="grid grid-cols-2 gap-2">
        @if (!empty($rankAndComposite->evsaRankMango))
        <div>
            <label for="evsaRankMango" class="dark:text-green-600 text-xs md:text-base">E-VSA Rank (Mango)</label>
            <input type="text" readonly value="{{ optional($rankAndComposite)->evsaRankMango ?? '' }}"
                x-ref="evsaRankMango"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">
        </div>
        @endif
        @if (!empty($rankAndComposite->compositeIndexMango))
        <div>
            <label for="compositeIndexMango" class="dark:text-green-600 text-xs md:text-base">Composite Index (Mango)</label>
            <input type="text" readonly value="{{ optional($rankAndComposite)->compositeIndexMango ?? '' }}"
                x-ref="compositeIndexMango"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">
        </div>
        @endif
    </div>
    <div class="grid grid-cols-2 gap-2">
        @if (!empty($rankAndComposite->evsaRankOnion))
        <div>
            <label for="evsaRankOnion" class="dark:text-green-600 text-xs md:text-base">E-VSA Rank (Onion)</label>
            <input type="text" readonly value="{{ optional($rankAndComposite)->evsaRankOnion ?? '' }}"
                x-ref="evsaRankOnion"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">
        </div>
        @endif
        @if (!empty($rankAndComposite->evsaRankOnion))
        <div>
            <label for="compositeIndexOnion" class="dark:text-green-600 text-xs md:text-base">Composite Index (Onion)</label>
            <input type="text" readonly value="{{ optional($rankAndComposite)->compositeIndexOnion ?? '' }}"
                x-ref="compositeIndexOnion"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">
        </div>
        @endif
    </div>
    <div class="grid grid-cols-2 gap-2">
        @if (!empty($rankAndComposite->evsaRankGoat))
        <div>
            <label for="evsaRankGoat" class="dark:text-green-600 text-xs md:text-base">E-VSA Rank (Goat)</label>
            <input type="text" readonly value="{{ optional($rankAndComposite)->evsaRankGoat ?? '' }}"
                x-ref="evsaRankGoat"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">
        </div>
        @endif
        @if (!empty($rankAndComposite->evsaRankGoat))
        <div>
            <label for="compositeIndexGoat" class="dark:text-green-600 text-xs md:text-base">Composite Index (Goat)</label>
            <input type="text" readonly value="{{ optional($rankAndComposite)->compositeIndexGoat ?? '' }}"
                x-ref="compositeIndexGoat"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">
        </div>
        @endif
    </div>
    <div class="grid grid-cols-2 gap-2">
        @if (!empty($rankAndComposite->evsaRankPeanut))
        <div>
            <label for="evsaRankPeanut" class="dark:text-green-600 text-xs md:text-base">E-VSA Rank (Peanut)</label>
            <input type="text" readonly value="{{ optional($rankAndComposite)->evsaRankPeanut ?? '' }}"
                x-ref="evsaRankPeanut"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">
        </div>
        @endif
        @if (!empty($rankAndComposite->evsaRankPeanut))
        <div>
            <label for="compositeIndexPeanut" class="dark:text-green-600 text-xs md:text-base">Composite Index (Peanut)</label>
            <input type="text" readonly value="{{ optional($rankAndComposite)->compositeIndexPeanut ?? '' }}"
                x-ref="compositeIndexPeanut"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">
        </div>
        @endif
    </div>
    <div class="grid grid-cols-2 gap-2">
        @if (!empty($rankAndComposite->evsaRankTomato))
        <div>
            <label for="evsaRankTomato" class="dark:text-green-600 text-xs md:text-base">E-VSA Rank (Tomato)</label>
            <input type="text" readonly value="{{ optional($rankAndComposite)->evsaRankTomato ?? '' }}"
                x-ref="evsaRankTomato"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">
        </div>
        @endif
        @if (!empty($rankAndComposite->evsaRankTomato))
        <div>
            <label for="compositeIndexTomato" class="dark:text-green-600 text-xs md:text-base">Composite Index (Tomato)</label>
            <input type="text" readonly
                value="{{ optional($rankAndComposite)->compositeIndexTomato ?? '' }}"
                x-ref="compositeIndexTomato"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">
        </div>
        @endif
    </div>
    <div class="grid grid-cols-2 gap-2">
        @if (!empty($rankAndComposite->evsaRankMungbean))
        <div>
            <label for="evsaRankMungbean" class="dark:text-green-600 text-xs md:text-base">E-VSA Rank (Mungbean)</label>
            <input type="text" readonly value="{{ optional($rankAndComposite)->evsaRankMungbean ?? '' }}"
                x-ref="evsaRankMungbean"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">
        </div>
        @endif
        @if (!empty($rankAndComposite->evsaRankMungbean))
        <div>
            <label for="compositeIndexMungbean" class="dark:text-green-600 text-xs md:text-base">Composite Index (Mungbean)</label>
            <input type="text" readonly
                value="{{ optional($rankAndComposite)->compositeIndexMungbean ?? '' }}"
                x-ref="compositeIndexMungbean"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">
        </div>
        @endif
    </div>
    <div class="grid grid-cols-2 gap-2">
        @if (!empty($rankAndComposite->evsaRankBangus))
        <div>
            <label for="evsaRankBangus" class="dark:text-green-600 text-xs md:text-base">E-VSA Rank (Bangus)</label>
            <input type="text" readonly value="{{ optional($rankAndComposite)->evsaRankBangus ?? '' }}"
                x-ref="evsaRankBangus"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">
        </div>
        @endif
        @if (!empty($rankAndComposite->evsaRankBangus))
        <div>
            <label for="compositeIndexBangus" class="dark:text-green-600 text-xs md:text-base">Composite Index (Bangus)</label>
            <input type="text" readonly
                value="{{ optional($rankAndComposite)->compositeIndexBangus ?? '' }}"
                x-ref="compositeIndexBangus"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">
        </div>
        @endif
    </div>
    <div class="grid grid-cols-2 gap-2">
        @if (!empty($rankAndComposite->evsaRankGarlic))
        <div>
            <label for="evsaRankGarlic" class="dark:text-green-600 text-xs md:text-base">E-VSA Rank (Garlic)</label>
            <input type="text" readonly value="{{ optional($rankAndComposite)->evsaRankGarlic ?? '' }}"
                x-ref="evsaRankGarlic"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">
        </div>
        @endif
        @if (!empty($rankAndComposite->evsaRankGarlic))
        <div>
            <label for="compositeIndexGarlic" class="dark:text-green-600 text-xs md:text-base">Composite Index (Garlic)</label>
            <input type="text" readonly
                value="{{ optional($rankAndComposite)->compositeIndexGarlic ?? '' }}"
                x-ref="compositeIndexGarlic"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">
        </div>
        @endif
    </div>
    <div class="grid grid-cols-2 gap-2">
        @if (!empty($rankAndComposite->evsaRankCoffee))
        <div>
            <label for="evsaRankCoffee" class="dark:text-green-600 text-xs md:text-base">E-VSA Rank (Coffee)</label>
            <input type="text" readonly value="{{ optional($rankAndComposite)->evsaRankCoffee ?? '' }}"
                x-ref="evsaRankCoffee"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">
        </div>
        @endif
        @if (!empty($rankAndComposite->evsaRankCoffee))
        <div>
            <label for="compositeIndexCoffee" class="dark:text-green-600 text-xs md:text-base">Composite Index (Coffee)</label>
            <input type="text" readonly
                value="{{ optional($rankAndComposite)->compositeIndexCoffee ?? '' }}"
                x-ref="compositeIndexCoffee"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">
        </div>
        @endif
    </div>
    <div class="grid grid-cols-2 gap-2">
        @if (!empty($rankAndComposite->evsaRankHogs))
        <div>
            <label for="evsaRankHogs" class="dark:text-green-600 text-xs md:text-base">E-VSA Rank (Hogs)</label>
            <input type="text" readonly value="{{ optional($rankAndComposite)->evsaRankHogs ?? '' }}"
                x-ref="evsaRankHogs"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">
        </div>
        @endif
        @if (!empty($rankAndComposite->evsaRankHogs))
        <div>
            <label for="compositeIndexHogs" class="dark:text-green-600 text-xs md:text-base">Composite Index (Hogs)</label>
            <input type="text" readonly
                value="{{ optional($rankAndComposite)->compositeIndexHogs ?? '' }}"
                x-ref="compositeIndexHogs"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1">
        </div>
        @endif
    </div>
    @endif
</div>

@if (isset($iPlanChecklists) && ($iPlanChecklists->explanation || $iPlanChecklists->justificationFile))
<div class="mb-4">
    <label for="justification" class="dark:text-lime-500 text-sm md:text-base">Justification if rank is higher than 10 and if
        composite index is below 0.4</label>

    @if (!empty($iPlanChecklists->explanation))
    <textarea
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
        rows="4" readonly>{{ $iPlanChecklists->explanation }}</textarea>
    @endif

    @if (!empty($iPlanChecklists->justificationFile))
    <a class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2 w-fit mt-1"
        href="{{ asset($iPlanChecklists->justificationFile) }}" target="_blank">
        <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">View File
    </a>
    @endif
</div>
@endif
<hr class="border-2 dark:border-lime-500 border-green-500 mb-2">
<div class="mb-4">
    <label for="linkedVca" class="dark:text-lime-500 text-sm md:text-base">Linked to VCA?</label>
    <div class="flex items-center gap-2">
        <div class="flex items-center gap-2">
            <input class="dark:bg-gray-800" type="radio"
                {{ isset($iPlanChecklists->linkedVca) && $iPlanChecklists->linkedVca === 'Yes' ? 'checked' : '' }}
                disabled>
            <label for="vcaYes">Yes</label>
        </div>
        <div class="flex items-center gap-2">
            <input class="dark:bg-gray-800" type="radio"
                {{ isset($iPlanChecklists->linkedVca) && $iPlanChecklists->linkedVca === 'No' ? 'checked' : '' }}
                disabled>
            <label for="vcaNo">No</label>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-2">
        @if (isset($iPlanChecklists) &&
        ($iPlanChecklists->valueChainSegment ||
        $iPlanChecklists->opportunity ||
        $iPlanChecklists->specificIntervention ||
        $iPlanChecklists->pageMatrixVca))
        <div>
            <label for="valueChainSegment" class="dark:text-green-600 text-sm md:text-base">Value Chain Segment</label>
            <input type="text"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                value="{{ $iPlanChecklists->valueChainSegment }}" readonly>
        </div>
        <div>
            <label for="opportunity" class="dark:text-green-600 text-sm md:text-base">Opportunity or Constraint Being Addressed</label>
            <input type="text"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                value="{{ $iPlanChecklists->opportunity }}" readonly>
        </div>
        <div>
            <label for="specificIntervention" class="dark:text-green-600 text-sm md:text-base">Specific Intervention</label>
            <input type="text"
                class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
                value="{{ $iPlanChecklists->specificIntervention }}" readonly>
        </div>
        <div>
            <label for="pageMatrixVca" class="dark:text-green-600 text-sm md:text-base">Page of VCA</label>
            <a class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2 w-fit mt-1"
                href="{{ asset($iPlanChecklists->pageMatrixVca) }}" target="_blank">
                <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">View
                File</a>
        </div>
        @endif
    </div>
</div>
<hr class="border-2 dark:border-lime-500 border-green-500 mb-2">
<div class="mb-4">
    <label for="pcip" class="dark:text-lime-500 text-sm md:text-base">Aligned with the PCIP?</label>
    <div class="flex items-center gap-2 mb-2">
        <div class="flex items-center gap-2">
            <input class="dark:bg-gray-800" type="radio"
                {{ isset($iPlanChecklists->pcip) && $iPlanChecklists->pcip === 'Yes' ? 'checked' : '' }} disabled>
            <label for="pcipYes">Yes</label>
        </div>
        <div class="flex items-center gap-2">
            <input class="dark:bg-gray-800" type="radio"
                {{ isset($iPlanChecklists->pcip) && $iPlanChecklists->pcip === 'No' ? 'checked' : '' }} disabled>
            <label for="pcipNo">No</label>
        </div>
    </div>
    @if (isset($iPlanChecklists) && ($iPlanChecklists->page || $iPlanChecklists->pageMatrixPcip))
    <div class="mb-2">
        <label for="page" class="dark:text-green-600 text-sm md:text-base">Page</label>
        <input type="text"
            class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-32 mt-1"
            value="{{ $iPlanChecklists->page }}" readonly>
    </div>
    <div>
        <label for="pageMatrixPcip" class="dark:text-green-600 text-sm md:text-base">Page of Matrix</label>
        <a class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2 w-fit mt-1"
            href="{{ asset($iPlanChecklists->pageMatrixPcip) }}" target="_blank">
            <img src="/images/file-earmark-text.svg" alt="Save" width="22" height="22">View File</a>
    </div>
    @endif
</div>
<hr class="border-2 dark:border-lime-500 border-green-500 mb-2">
<label for="crva" class="dark:text-lime-500 text-sm md:text-base">CRVA</label>

<div class="mb-2">
    <label for="sensitivity" class="dark:text-green-600 text-sm md:text-base">Sensitivity</label>
    <input type="text"
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
        value="{{ $iPlanChecklists->sensitivity }}" readonly>
</div>
<div class="mb-2">
    <label for="exposure" class="dark:text-green-600 text-sm md:text-base">Exposure</label>
    <input type="text"
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
        value="{{ $iPlanChecklists->exposure }}" readonly>
</div>
<div class="mb-2">
    <label for="adaptiveCapacity" class="dark:text-green-600 text-sm md:text-base">Adaptive Capacity</label>
    <input type="text"
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
        value="{{ $iPlanChecklists->adaptiveCapacity }}" readonly>
</div>
<div class="mb-2">
    <label for="overallVulnerability" class="dark:text-green-600 text-sm md:text-base">Overall Vulnerability</label>
    <input type="text"
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
        value="{{ $iPlanChecklists->overallVulnerability }}" readonly>
</div>
<div class="mb-2">
    <label for="recommendation" class="dark:text-green-600 text-sm md:text-base">Recommendation</label>
    <textarea
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
        rows="4" readonly>{{ $iPlanChecklists->recommendation }}</textarea>
</div>
@if (isset($iPlanChecklists) && $iPlanChecklists->generalRecommendation)
<div class="mb-2">
    <label for="generalRecommendation" class="dark:text-green-600 text-sm md:text-base">General Recommendation</label>
    <textarea
        class="block border-1 rounded-md dark:border-gray-700 dark:bg-gray-900 bg-gray-50 border-gray-400 w-full mt-1"
        rows="4" readonly>{{ $iPlanChecklists->generalRecommendation }}</textarea>
</div>
@endif
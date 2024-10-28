<div class="flex justify-between items-center mb-4">
    <h1 class="dark:text-lime-500 text-xl">Proponent & Location</h1>
</div>
<hr class="border-2 dark:border-lime-500 mb-2">
<div class="grid grid-cols-2 md:grid-cols-3 gap-3">
    <div>
        <label for="proponent" class="dark:text-green-600">Proponent</label>
        <input type="text"
            class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
            value="{{ $subprojects->proponent }}" readonly>
    </div>
    <div>
        <label for="cluster" class="dark:text-green-600">Cluster</label>
        <input type="text"
            class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
            value="{{ $subprojects->cluster }}" readonly>
    </div>
    <div>
        <label for="region" class="dark:text-green-600">Region</label>
        <input type="text"
            class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
            value="{{ $subprojects->region }}" readonly>
    </div>
    <div>
        <label for="province" class="dark:text-green-600">Province</label>
        <input type="text"
            class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
            value="{{ $subprojects->province_name }}" readonly>
    </div>
    <div>
        <label for="municipality" class="dark:text-green-600">Municipality</label>
        <input type="text"
            class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
            value="{{ $subprojects->municipality_name }}" readonly>
    </div>
    <div>
        <label for="barangay" class="dark:text-green-600">Barangay</label>
        <input type="text"
            class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
            value="{{ $subprojects->barangay_name }}" readonly>
    </div>
</div>
<h1 class="dark:text-lime-500 text-xl mt-4 mb-4">Subproject Profile</h1>
<hr class="border-2 dark:border-lime-500 mb-2">
<div class="grid grid-cols-1 md:grid-cols-3 gap-3">
    <div>
        <label for="projectName" class="dark:text-green-600">Project Name</label>
        <input type="text"
            class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
            value="{{ $subprojects->projectName }}" readonly>
    </div>
    <div>
        <label for="projectType" class="dark:text-green-600">Project Type</label>
        <input type="text"
            class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
            value="{{ $subprojects->projectType }}" readonly>
    </div>
    <div>
        <label for="projectCategory" class="dark:text-green-600">Project Category</label>
        <input type="text"
            class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
            value="{{ $subprojects->projectCategory }}" readonly>
    </div>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-3 mt-3">
    <div>
        <label for="fundSource" class="dark:text-green-600">Fund Source</label>
        <input type="text"
            class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
            value="{{ $subprojects->fundSource }}" readonly>
    </div>
    <div>
        <label for="indicativeCost" class="dark:text-green-600">Indicative Cost</label>
        <input type="text"
            class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
            value="{{ $subprojects->indicativeCost }}" readonly>
    </div>
    <div>
        <label for="letterOfInterest" class="dark:text-green-600">Letter of Interest/Request/Endorsement</label>
        <a class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray dark:text-white bg-gray-400 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2 w-fit mt-1" href="{{ asset($subprojects->letterOfInterest) }}" target="_blank">
            <img src="/images/file-earmark-text.svg" alt="Save" width="22"
                height="22">View File</a>
    </div>
</div>
<h1 class="dark:text-lime-500 text-xl mt-4 mb-4">Linked to Commodity Investment Plan</h1>
<hr class="border-2 dark:border-lime-500 mb-2">
<div class="grid grid-cols-1 md:grid-cols-3 gap-3 mt-3">
    <div>
        <label for="commodity" class="dark:text-green-600">Commodity</label>
        <input type="text"
            class="block border-1 rounded-md border-gray-700 bg-gray-900 w-full mt-1"
            value="{{ $subprojects->commodity }}" readonly>
    </div>
    <div>
        <label for="commodityReport" class="dark:text-green-600">Report</label>
        <a class="flex items-center gap-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray dark:text-white bg-gray-400 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-3 py-2 w-fit mt-1" href="{{ asset($subprojects->report) }}" target="_blank">
            <img src="/images/file-earmark-text.svg" alt="Save" width="22"
                height="22">View File</a>
    </div>
</div>
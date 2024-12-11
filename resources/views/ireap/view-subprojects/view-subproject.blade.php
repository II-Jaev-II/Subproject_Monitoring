<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="bg-white border border-gray-300 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-4">
                        <h1 class="dark:text-lime-500 text-xl">Validation Results</h1>
                        <a href="{{ route('ireap.subprojects') }}"
                            class="border border-transparent text-xs leading-4 font-medium rounded-md text-white bg-green-500 dark:bg-lime-500 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 px-2 py-2 md:px-3 md:py-2">
                            Show Subprojects
                        </a>
                    </div>
                    <div class="overflow-x-auto">
                        @include('ireap.view-subprojects.clearances-table')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="bg-white border border-gray-300 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @include('ireap.view-subprojects.subproject-profile')
            </div>
        </div>
    </div>

    <div x-data="{ selectedComponent: '' }" x-cloak>
        <div class="py-12">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 relative">
                <div class="flex md:space-x-2 absolute -top-5">
                    <a href="#" @click.prevent="selectedComponent = 'IPLAN'"
                        :class="{
                            'dark:bg-lime-500 bg-green-500': selectedComponent === 'IPLAN',
                            'bg-gray-400 dark:bg-gray-500 dark:hover:bg-gray-400 hover:bg-gray-300 ease-in-out duration-300': selectedComponent !== 'IPLAN'
                        }"
                        class="bg-gray-50 dark:bg-gray-800 text-black dark:text-white border-2 border-gray-500 rounded-tl-lg rounded-tr-lg px-4 py-1 text-sm shadow-sm translate-y-0 hover:-translate-y-2 transition-all">
                        iPLAN
                    </a>
                    <a href="#" @click.prevent="selectedComponent = 'IBUILD'"
                        :class="{
                            'dark:bg-lime-500 bg-green-500': selectedComponent === 'IBUILD',
                            'bg-gray-400 dark:bg-gray-500 dark:hover:bg-gray-400 hover:bg-gray-300 ease-in-out duration-300': selectedComponent !== 'IBUILD'
                        }"
                        class="bg-gray-50 dark:bg-gray-800 text-black dark:text-white border-2 border-gray-500 rounded-tl-lg rounded-tr-lg px-4 py-1 text-sm shadow-sm translate-y-0 hover:-translate-y-2 transition-all">
                        iBUILD
                    </a>
                    <a href="#" @click.prevent="selectedComponent = 'ECON'"
                        :class="{
                            'dark:bg-lime-500 bg-green-500': selectedComponent === 'ECON',
                            'bg-gray-400 dark:bg-gray-500 dark:hover:bg-gray-400 hover:bg-gray-300 ease-in-out duration-300': selectedComponent !== 'ECON'
                        }"
                        class="bg-gray-50 dark:bg-gray-800 text-black dark:text-white border-2 border-gray-500 rounded-tl-lg rounded-tr-lg px-4 py-1 text-sm shadow-sm translate-y-0 hover:-translate-y-2 transition-all">
                        ECON
                    </a>
                    <a href="#" @click.prevent="selectedComponent = 'SES'"
                        :class="{
                            'dark:bg-lime-500 bg-green-500': selectedComponent === 'SES',
                            'bg-gray-400 dark:bg-gray-500 dark:hover:bg-gray-400 hover:bg-gray-300 ease-in-out duration-300': selectedComponent !== 'SES'
                        }"
                        class="bg-gray-50 dark:bg-gray-800 text-black dark:text-white border-2 border-gray-500 rounded-tl-lg rounded-tr-lg px-4 py-1 text-sm shadow-sm translate-y-0 hover:-translate-y-2 transition-all">
                        SES
                    </a>
                    <a href="#" @click.prevent="selectedComponent = 'GGU'; $nextTick(() => initMap())"
                        :class="{
        'dark:bg-lime-500 bg-green-500': selectedComponent === 'GGU',
        'bg-gray-400 dark:bg-gray-500 dark:hover:bg-gray-400 hover:bg-gray-300 ease-in-out duration-300': selectedComponent !== 'GGU'
    }"
                        class="bg-gray-50 dark:bg-gray-800 text-black dark:text-white border-2 border-gray-500 rounded-tl-lg rounded-tr-lg px-4 py-1 text-sm shadow-sm translate-y-0 hover:-translate-y-2 transition-all">
                        GGU
                    </a>
                    @if ($subprojects->projectType === 'VCRI')
                    <a href="#" @click.prevent="selectedComponent = 'IREAP'"
                        :class="{
                                'dark:bg-lime-500 bg-green-500': selectedComponent === 'IREAP',
                                'bg-gray-400 dark:bg-gray-500 dark:hover:bg-gray-400 hover:bg-gray-300 ease-in-out duration-300': selectedComponent !== 'IREAP'
                            }"
                        class="bg-gray-50 dark:bg-gray-800 text-black dark:text-white border-2 border-gray-500 rounded-tl-lg rounded-tr-lg px-4 py-1 text-sm shadow-sm translate-y-0 hover:-translate-y-2 transition-all">
                        IREAP
                    </a>
                    @endif
                </div>
                <div
                    class="bg-white border border-gray-300 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-6">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div x-cloak style="display: none !important" x-show="selectedComponent === 'IPLAN'">
                            @if ($iPlanChecklists)
                            <h1 class="dark:text-lime-500 text-xl mt-4 mb-4">IPLAN Validation</h1>
                            <hr class="border-2 border-green-500 dark:border-lime-500 mb-2">
                            @include('iplan.components.iplan-validated-checklist')
                            @else
                            <div
                                class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 w-fit px-2 py-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="20"
                                    height="20" fill="currentColor" class="bi bi-clipboard-x-fill"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                                    <path
                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm4 7.793 1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708z" />
                                </svg>
                                IPLAN has not validated this subproject yet.
                                <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                                    <span
                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                                </span>
                            </div>
                            @endif
                        </div>
                        <div x-cloak style="display: none !important" x-show="selectedComponent === 'ECON'">
                            @if ($econChecklists)
                            <h1 class="dark:text-lime-500 text-xl mt-4 mb-4">ECON Validation</h1>
                            <hr class="border-2 border-green-500 dark:border-lime-500 mb-2">
                            @include('econ.components.econ-validated-checklist')
                            @else
                            <p
                                class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 dark:bg-red-800 text-white border-red-400 w-fit px-2 py-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="20"
                                    height="20" fill="currentColor" class="bi bi-clipboard-x-fill"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                                    <path
                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm4 7.793 1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708z" />
                                </svg>
                                ECON has not validated this subproject yet.
                                <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                                    <span
                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                                </span>
                            </p>
                            @endif
                        </div>
                        <div x-cloak style="display: none !important" x-show="selectedComponent === 'SES'">
                            @if ($sesChecklists)
                            <h1 class="dark:text-lime-500 text-xl mt-4 mb-4">SES Validation</h1>
                            <hr class="border-2 border-green-500 dark:border-lime-500 mb-2">
                            @include('ses.components.ses-validated-checklist')
                            @else
                            <p
                                class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 dark:bg-red-800 text-white border-red-400 w-fit px-2 py-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="20"
                                    height="20" fill="currentColor" class="bi bi-clipboard-x-fill"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                                    <path
                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm4 7.793 1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708z" />
                                </svg>
                                SES has not validated this subproject yet.
                                <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                                    <span
                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                                </span>
                            </p>
                            @endif
                        </div>
                        <div x-cloak style="display: none !important" x-show="selectedComponent === 'GGU'">
                            @if ($gguChecklists)
                            <h1 class="dark:text-lime-500 text-xl mt-4 mb-4">GGU Validation</h1>
                            <hr class="border-2 border-green-500 dark:border-lime-500 mb-2">
                            @include('ggu.components.ggu-validated-checklist')
                            @else
                            <p
                                class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 dark:bg-red-800 text-white border-red-400 w-fit px-2 py-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="20"
                                    height="20" fill="currentColor" class="bi bi-clipboard-x-fill"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                                    <path
                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm4 7.793 1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708z" />
                                </svg>
                                GGU has not validated this subproject yet.
                                <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                                    <span
                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                                </span>
                            </p>
                            @endif
                        </div>
                        <div x-cloak style="display: none !important" x-show="selectedComponent === 'IBUILD'">
                            @if ($hasRecords)
                            <h1 class="dark:text-lime-500 text-xl mt-4 mb-4">IBUILD Validation</h1>
                            <hr class="border-2 border-green-500 dark:border-lime-500 mb-2">

                            @include('ibuild.components.ibuild-validated-checklist', [
                            'subprojectType' => $subprojectType,
                            ])
                            @else
                            <div
                                class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 text-white dark:bg-red-800 border-red-400 w-fit px-2 py-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="20"
                                    height="20" fill="currentColor" class="bi bi-clipboard-x-fill"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                                    <path
                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm4 7.793 1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708z" />
                                </svg>
                                IBUILD has not validated this subproject yet.
                                <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                                    <span
                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                                </span>
                            </div>
                            @endif
                        </div>
                        <div x-cloak style="display: none !important" x-show="selectedComponent === 'IREAP'">
                            @if ($iReapChecklists)
                            <h1 class="dark:text-lime-500 text-xl mt-4 mb-4">IREAP Validation</h1>
                            <hr class="border-2 border-green-500 dark:border-lime-500 mb-2">
                            @include('ireap.components.ireap-validated-checklist')
                            @else
                            <p
                                class="relative flex items-center gap-2 text-md rounded-md border font-bold bg-red-600 dark:bg-red-800 text-white border-red-400 w-fit px-2 py-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="20"
                                    height="20" fill="currentColor" class="bi bi-clipboard-x-fill"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                                    <path
                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm4 7.793 1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708z" />
                                </svg>
                                IREAP has not validated this subproject yet.
                                <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 flex h-4 w-4">
                                    <span
                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span>
                                </span>
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let mapInstance = null; // Global variable to store the Leaflet map instance
        let kmlLayer = null; // Variable to store the KMZ layer

        async function fetchAndProcessKMZ(map) {
            try {
                const kmzFilePath = document.getElementById('kmzFileLink').getAttribute('href');
                if (!kmzFilePath) {
                    throw new Error('KMZ file path is not available.');
                }

                const response = await fetch(kmzFilePath);
                if (!response.ok) {
                    throw new Error('Failed to fetch KMZ file from the server.');
                }

                const fileData = await response.arrayBuffer();
                const zip = new JSZip();
                const unzipped = await zip.loadAsync(fileData);

                const kmlFileName = Object.keys(unzipped.files).find(name => name.endsWith('.kml'));
                if (!kmlFileName) {
                    throw new Error('No KML file found inside the KMZ.');
                }

                const kmlData = await unzipped.file(kmlFileName).async('text');
                const parser = new DOMParser();
                const kmlDocument = parser.parseFromString(kmlData, 'text/xml');
                const geoJSON = toGeoJSON.kml(kmlDocument);

                const styleDictionary = {};
                const styles = kmlDocument.querySelectorAll('Style, StyleMap');
                styles.forEach(style => {
                    const id = style.getAttribute('id');
                    if (id) {
                        const lineStyle = style.querySelector('LineStyle > color');
                        const polyStyle = style.querySelector('PolyStyle > color');
                        styleDictionary[`#${id}`] = {
                            strokeColor: lineStyle ? kmlColorToRGBA(lineStyle.textContent) : '#3388ff',
                            fillColor: polyStyle ? kmlColorToRGBA(polyStyle.textContent) : '#3388ff',
                            fillOpacity: polyStyle ? parseFloat(polyStyle.textContent.substring(0, 2), 16) / 255 : 0.5,
                        };
                    }
                });

                function kmlColorToRGBA(kmlColor) {
                    if (!kmlColor || kmlColor.length !== 8) return '#3388ff';
                    const a = parseInt(kmlColor.substring(0, 2), 16) / 255;
                    const b = parseInt(kmlColor.substring(2, 4), 16);
                    const g = parseInt(kmlColor.substring(4, 6), 16);
                    const r = parseInt(kmlColor.substring(6, 8), 16);
                    return `rgba(${r},${g},${b},${a})`;
                }

                function getFeatureStyle(feature) {
                    if (feature.properties && feature.properties.styleUrl) {
                        const style = styleDictionary[feature.properties.styleUrl];
                        if (style) {
                            return {
                                color: style.strokeColor,
                                weight: 2,
                                fillColor: style.fillColor,
                                fillOpacity: style.fillOpacity,
                            };
                        }
                    }

                    if (feature.properties && feature.properties.fill && feature.properties.stroke) {
                        return {
                            color: feature.properties.stroke,
                            weight: 2,
                            fillColor: feature.properties.fill,
                            fillOpacity: feature.properties['fill-opacity'] || 0.5,
                        };
                    }

                    return {
                        color: '#3388ff',
                        weight: 2,
                        fillColor: '#3388ff',
                        fillOpacity: 0.5,
                    };
                }

                if (kmlLayer) {
                    map.removeLayer(kmlLayer);
                }

                kmlLayer = L.geoJSON(geoJSON, {
                    style: getFeatureStyle,
                    onEachFeature: function(feature, layer) {
                        let popupContent = '';
                        if (feature.properties && feature.properties.name) {
                            popupContent += `<strong>${feature.properties.name}</strong><br>`;
                        }
                        if (feature.properties && feature.properties.description) {
                            popupContent += feature.properties.description;
                        }
                        layer.bindPopup(popupContent || 'No details available.');
                    },
                }).addTo(map);

                const bounds = kmlLayer.getBounds();
                if (bounds.isValid()) {
                    map.fitBounds(bounds);
                } else {
                    map.setView([12.8797, 121.7740], 6); // Default to the Philippines
                }
            } catch (error) {
                console.error('Error processing KMZ file:', error.message);
                alert(`Failed to load KMZ file: ${error.message}`);
            }
        }

        function initMap() {
            const mapElement = document.getElementById('map');
            if (!mapElement) return;

            if (mapInstance) {
                mapInstance.invalidateSize(); // Revalidate size if map already exists
                return;
            }

            mapInstance = L.map('map', {
                fullscreenControl: true,
            }).setView([12.8797, 121.7740], 6); // Default to the Philippines

            L.tileLayer('https://api.maptiler.com/maps/hybrid/{z}/{x}/{y}.jpg?key=1YVGdjrAGIixgcVbC8L9', {
                attribution: 'MapTiler',
                maxZoom: 22,
            }).addTo(mapInstance);

            fetchAndProcessKMZ(mapInstance);

            observeVisibility(mapElement);
        }

        function observeVisibility(mapElement) {
            const observer = new MutationObserver(() => {
                if (mapElement.style.display !== 'none') {
                    mapInstance.invalidateSize(); // Revalidate size when map becomes visible
                }
            });

            observer.observe(mapElement, {
                attributes: true,
                attributeFilter: ['style']
            });
        }

        document.addEventListener('alpine:init', () => {
            Alpine.data('mapApp', () => ({
                selectedComponent: null, // Initially no component selected
                initMap,
            }));
        });
    </script>
</x-app-layout>
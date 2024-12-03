<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Subproject Monitoring') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script src="//unpkg.com/alpinejs" defer></script>

    <script src="{{ asset('js/darkMode.js') }}"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet.fullscreen/Control.FullScreen.css">
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/togeojson/0.16.0/togeojson.min.js"></script>
    <script src="https://unpkg.com/leaflet.fullscreen/Control.FullScreen.js"></script>
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <script src="{{ asset('js/darkModeToggle.js') }}"></script>
    <script src="{{ asset('js/fetchDropdown.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize the Leaflet map centered on the Philippines
            const map = L.map('map', {
                fullscreenControl: true,
            }).setView([12.8797, 121.7740], 6);

            // Add the tile layer
            L.tileLayer('https://api.maptiler.com/maps/hybrid/{z}/{x}/{y}.jpg?key=1YVGdjrAGIixgcVbC8L9', {
                attribution: 'MapTiler',
                maxZoom: 22,
            }).addTo(map);

            // Empty GeoJSON layer to hold uploaded file content
            let kmlLayer = L.geoJSON().addTo(map);

            const fileInput = document.getElementById('fileInput');

            fileInput.addEventListener('change', async function(event) {
                const file = event.target.files[0];
                if (!file) {
                    alert('Please select a KMZ file.');
                    return;
                }

                try {
                    const zip = new JSZip();

                    // Read the KMZ file
                    const fileData = await file.arrayBuffer();

                    // Load the KMZ file with JSZip
                    const unzipped = await zip.loadAsync(fileData);

                    // Find and read the KML file
                    const kmlFileName = Object.keys(unzipped.files).find(name => name.endsWith('.kml'));
                    if (!kmlFileName) {
                        throw new Error('No KML file found inside the KMZ.');
                    }

                    const kmlData = await unzipped.file(kmlFileName).async('text');

                    // Parse the KML data and convert it to GeoJSON
                    const parser = new DOMParser();
                    const kmlDocument = parser.parseFromString(kmlData, 'text/xml');
                    const geoJSON = toGeoJSON.kml(kmlDocument);

                    // Extract images from KMZ
                    const images = {};
                    for (const filename in unzipped.files) {
                        if (/\.(jpg|jpeg|png|gif)$/i.test(filename)) {
                            const imageData = await unzipped.file(filename).async('base64');
                            images[filename] = `data:image/${filename.split('.').pop()};base64,${imageData}`;
                        }
                    }

                    // Replace <img> src attributes in the KML descriptions
                    for (const feature of geoJSON.features) {
                        if (feature.properties && feature.properties.description) {
                            feature.properties.description = feature.properties.description.replace(
                                /<img[^>]+src=["']([^"']+)["'][^>]*>/gi,
                                (match, src) => {
                                    const base64Image = images[src];
                                    return base64Image ?
                                        `<img src="${base64Image}" alt="Geotagged Photo" style="width: 100%; max-width: 300px;">` :
                                        `<img alt="Image not found">`;
                                }
                            );
                        }
                    }

                    // Remove existing layer and add the new one
                    map.removeLayer(kmlLayer);
                    kmlLayer = L.geoJSON(geoJSON, {
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

                    // Adjust map bounds to fit the KML content
                    map.fitBounds(kmlLayer.getBounds());
                } catch (error) {
                    console.error('Error processing KMZ file:', error.message);
                    alert(`Failed to load KMZ file: ${error.message}`);
                }
            });
        });
    </script>
</body>

</html>
document.addEventListener('DOMContentLoaded', function () {
    const map = L.map('map', {
        fullscreenControl: true,
    }).setView([12.8797, 121.7740], 6);

    L.tileLayer('https://api.maptiler.com/maps/hybrid/{z}/{x}/{y}.jpg?key=1YVGdjrAGIixgcVbC8L9', {
        attribution: 'MapTiler',
        maxZoom: 22,
    }).addTo(map);

    let kmlLayer = L.geoJSON().addTo(map);

    const fileInput = document.getElementById('fileInput');

    fileInput.addEventListener('change', async function (event) {
        const file = event.target.files[0];
        if (!file) {
            alert('Please select a KMZ file.');
            return;
        }

        try {
            const zip = new JSZip();
            const fileData = await file.arrayBuffer();
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

            map.removeLayer(kmlLayer);
            kmlLayer = L.geoJSON(geoJSON, {
                style: getFeatureStyle,
                onEachFeature: function (feature, layer) {
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

            map.fitBounds(kmlLayer.getBounds());
        } catch (error) {
            console.error('Error processing KMZ file:', error.message);
            alert(`Failed to load KMZ file: ${error.message}`);
        }
    });
});

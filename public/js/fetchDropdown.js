function fetchMunicipalities(provinceId) {
    const municipalitySelect = document.getElementById('municipality');
    const barangaySelect = document.getElementById('barangay');

    // Clear previous options
    municipalitySelect.innerHTML = '<option value="">Select Municipality</option>';
    barangaySelect.innerHTML = '<option value="">Select Barangay</option>';

    if (!provinceId) return;

    fetch(`/municipalities/${provinceId}`)
        .then(response => response.json())
        .then(data => {
            data.forEach(municipality => {
                const option = document.createElement('option');
                option.value = municipality.id;
                option.textContent = municipality.municipality_name;
                if (municipality.id == "{{ old('municipality_id') }}") {
                    option.selected = true; // Retain selection if an error occurred
                }
                municipalitySelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching municipalities:', error));
}

function fetchBarangays(municipalityId) {
    const barangaySelect = document.getElementById('barangay');

    // Clear previous options
    barangaySelect.innerHTML = '<option value="">Select Barangay</option>';

    if (!municipalityId) return;

    fetch(`/barangays/${municipalityId}`)
        .then(response => response.json())
        .then(data => {
            data.forEach(barangay => {
                const option = document.createElement('option');
                option.value = barangay.id;
                option.textContent = barangay.barangay_name;
                if (barangay.id == "{{ old('barangay_id') }}") {
                    option.selected = true; // Retain selection if an error occurred
                }
                barangaySelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching barangays:', error));
}

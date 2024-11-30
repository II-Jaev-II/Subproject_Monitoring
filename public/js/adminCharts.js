// Define color variables for both charts' light and dark modes
const colors = {
    light: {
        background: '#ffffff',
        text: '#333333',
        stroke: '#ffffff',
    },
    dark: {
        background: '#1F2937',
        text: '#ffffff',
        stroke: '#1F2937',
    }
};

// Dark mode options for Project Distribution per Province
const darkModeOptions = {
    chart: { type: 'donut', height: 200, background: colors.dark.background },
    series: provinceData,
    labels: provinceLabels,
    legend: { labels: { colors: colors.dark.text } },
    tooltip: { theme: 'dark' },
    dataLabels: { style: { colors: [colors.dark.text] } },
    stroke: { colors: [colors.dark.stroke] }
};

// Light mode options for Project Distribution per Province
const lightModeOptions = {
    chart: { type: 'donut', height: 200, background: colors.light.background },
    series: provinceData,
    labels: provinceLabels,
    legend: { labels: { colors: colors.light.text } },
    tooltip: { theme: 'light' },
    dataLabels: { style: { colors: [colors.light.text] } },
    stroke: { colors: [colors.light.stroke] }
};

// Function to get Project Types chart options based on the theme
function getProjectTypeOptions(isDarkMode) {
    const theme = isDarkMode ? 'dark' : 'light';
    const projectTypeColors = {
        FMR: '#FF5733',
        FMB: '#33FF57',
        Bridge: '#3357FF',
        CIS: '#FFC300',
        PWS: '#DAF7A6',
        VCRI: '#C70039'
    };

    return {
        series: projectTypeData,
        chart: {
            type: 'polarArea',
            height: 200,
            background: colors[theme].background
        },
        fill: {
            opacity: 0.6
        },
        labels: ['FMR', 'FMB', 'Bridge', 'CIS', 'PWS', 'VCRI'],
        legend: {
            labels: { colors: colors[theme].text }
        },
        stroke: {
            colors: [colors[theme].stroke]
        },
        tooltip: {
            theme: isDarkMode ? 'dark' : 'light'
        },
        dataLabels: {
            style: { colors: [colors[theme].text] }
        },
        // Assign specific colors to each project type
        colors: Object.values(projectTypeColors)
    };
}

// Function to get Project Category chart options based on the theme
function getProjectCategoryOptions(isDarkMode) {
    const theme = isDarkMode ? 'dark' : 'light';
    return {
        series: projectCategoryData,
        chart: { type: 'donut', height: 200, background: colors[theme].background },
        labels: ['Construction', 'Rehabilitation'],
        legend: { labels: { colors: colors[theme].text } },
        stroke: { colors: [colors[theme].stroke] },
        tooltip: { theme: isDarkMode ? 'dark' : 'light' },
        dataLabels: { style: { colors: [colors[theme].text] } }
    };
}

// Check initial mode from the HTML (e.g., if a "dark" class is present on <html>)
let isDarkMode = document.documentElement.classList.contains('dark');

// Function to initialize or re-render the Province chart
let provinceChart;
function renderProvinceChart() {
    const options = isDarkMode ? darkModeOptions : lightModeOptions;
    if (provinceChart) provinceChart.destroy();
    provinceChart = new ApexCharts(document.querySelector("#provinceChart"), options);
    provinceChart.render();
}

// Function to initialize or re-render the Project Types chart
let projectTypeChart;
function renderProjectTypeChart() {
    const options = getProjectTypeOptions(isDarkMode);
    if (projectTypeChart) projectTypeChart.destroy();
    projectTypeChart = new ApexCharts(document.querySelector("#projectType"), options);
    projectTypeChart.render();
}

// Function to initialize or re-render the Project Category chart
let projectCategoryChart;
function renderProjectCategoryChart() {
    const options = getProjectCategoryOptions(isDarkMode);
    if (projectCategoryChart) projectCategoryChart.destroy();
    projectCategoryChart = new ApexCharts(document.querySelector("#projectCategory"), options);
    projectCategoryChart.render();
}

// Initial renders based on detected theme
renderProvinceChart();
renderProjectTypeChart();
renderProjectCategoryChart();

// Toggle button to switch themes
document.querySelector('#theme-toggle').addEventListener('click', () => {
    // Toggle the dark mode flag and the "dark" class on <html>
    isDarkMode = !isDarkMode;
    document.documentElement.classList.toggle('dark', isDarkMode);

    // Re-render all charts with the updated theme
    renderProvinceChart();
    renderProjectTypeChart();
    renderProjectCategoryChart();
});

const clearancesColors = {
    light: {
        background: '#ffffff',
        text: '#333333',
        barColors: ['#4caf50', '#e53935', '#ffc107'],
    },
    dark: {
        background: '#1F2937',
        text: '#ffffff',
        barColors: ['#29f276', '#b50520', '#ebdd17'],
    }
};

function getClearanceChartOptions(isDarkMode, data) {
    const theme = isDarkMode ? 'dark' : 'light';
    return {
        series: [
            {
                name: 'Cleared', data: [data.iPLAN.cleared, data.iBUILD.cleared, data.econ.cleared, data.ses.cleared,
                data.ggu.cleared, data.iREAP.cleared]
            },
            {
                name: 'Failed', data: [data.iPLAN.failed, data.iBUILD.failed, data.econ.failed, data.ses.failed, data.ggu.failed,
                data.iREAP.failed]
            },
            {
                name: 'Pending', data: [data.iPLAN.pending, data.iBUILD.pending, data.econ.pending, data.ses.pending,
                data.ggu.pending, data.iREAP.pending]
            },
        ],
        chart: {
            type: 'bar',
            height: 400,
            background: clearancesColors[theme].background,
            foreColor: clearancesColors[theme].text,
            toolbar: {
                show: true,
                tools: {
                    download: false
                }
            }
        },
        colors: clearancesColors[theme].barColors,
        xaxis: { categories: ['iPLAN', 'iBUILD', 'Econ', 'SES', 'GGU', 'iREAP'] },
    };
}

let isClearancesDarkMode = document.documentElement.classList.contains('dark');

let clearanceChart;
function renderClearanceChart(data) {
    const options = getClearanceChartOptions(isClearancesDarkMode, data);
    if (clearanceChart) clearanceChart.destroy();
    clearanceChart = new ApexCharts(document.querySelector("#clearancesChart"), options);
    clearanceChart.render();
}

fetch('/get-subproject-data')
    .then(response => response.json())
    .then(data => {
        renderClearanceChart(data);

        document.querySelector('#theme-toggle').addEventListener('click', () => {
            isClearancesDarkMode = !isClearancesDarkMode;
            document.documentElement.classList.toggle('dark', isClearancesDarkMode);

            renderClearanceChart(data);
        });
    })
    .catch(error => console.error('Error:', error));

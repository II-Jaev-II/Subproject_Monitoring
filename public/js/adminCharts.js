//Clearances Chart
var options = {
    chart: {
        type: 'donut',
        height: 300,
        pie: {
            size: 200
        }
    },
    series: provinceData,
    labels: provinceLabels,
    legend: {
        labels: {
            colors: '#ffffff',
            useSeriesColors: false
        }
    }
};

var chart = new ApexCharts(document.querySelector("#provinceChart"), options);

chart.render();

//Project Types Chart
var options = {
    series: projectTypeData,
    chart: {
        type: 'polarArea',
        height: 300,
        pie: {
            size: 200
        }
    },
    fill: {
        opacity: 0.6
    },
    labels: ['FMR', 'FMB', 'Bridge', 'CIS', 'PWS', 'VCI'],
    legend: {
        labels: {
            colors: '#ffffff',
            useSeriesColors: false
        }
    },
    title: {
        text: 'Project Type Distribution',
        align: 'center',
        style: {
            fontSize: '16px',
            color: '#ffffff'
        }
    },
    stroke: {
        colors: ['#ffffff']
    },
    yaxis: {
        labels: {
            style: {
                colors: '#ffffff'
            }
        }
    }
};

var chart = new ApexCharts(document.querySelector("#projectType"), options);
chart.render();

//Project Category Chart
var options = {
    series: projectCategoryData,
    chart: {
        type: 'donut',
        height: 300,
        pie: {
            size: 200
        }
    },
    labels: ['Construction', 'Rehabilitation', 'Upgrading', 'Additional Work'],
    legend: {
        labels: {
            colors: '#ffffff',
            useSeriesColors: false
        }
    }
};

// Render the chart
var chart = new ApexCharts(document.querySelector("#projectCategory"), options);
chart.render();

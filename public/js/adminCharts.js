//Provinces Chart
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
    },
    title: {
        text: 'Project Distribution per Province',
        align: 'center',
        style: {
            fontSize: '16px',
            color: '#ffffff'
        }
    },
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
    },
    title: {
        text: 'Project Category Distribution',
        align: 'center',
        style: {
            fontSize: '16px',
            color: '#ffffff'
        }
    },
};

// Render the chart
var chart = new ApexCharts(document.querySelector("#projectCategory"), options);
chart.render();

// Clearances Chart
fetch('/get-subproject-data')
    .then(response => response.json())
    .then(data => {
        var options = {
            series: [
                {
                    name: 'Cleared',
                    data: [
                        data.iPLAN.cleared,
                        data.iBUILD.cleared,
                        data.econ.cleared,
                        data.ses.cleared,
                        data.ggu.cleared
                    ]
                },
                {
                    name: 'Not Cleared',
                    data: [
                        data.iPLAN.notCleared,
                        data.iBUILD.notCleared,
                        data.econ.notCleared,
                        data.ses.notCleared,
                        data.ggu.notCleared
                    ]
                }
            ],
            chart: {
                type: 'bar',
                height: 400,
                foreColor: '#ffffff',
                toolbar: {
                    show: true,
                    tools: {
                        download: false
                    }
                }
            },
            colors: ['#29f276', '#b50520'],
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['iPLAN', 'iBUILD', 'Econ', 'SES', 'GGU'],
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                theme: 'dark',
                y: {
                    formatter: function (val) {
                        return val + " subprojects";
                    }
                }
            },
            legend: {
                show: true,
                position: 'top',
                horizontalAlign: 'center',
                floating: true,
                fontSize: '14px',
            }
        };

        var chart = new ApexCharts(document.querySelector("#clearancesChart"), options);
        chart.render();
    })
    .catch(error => console.error('Error:', error));

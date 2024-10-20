//Clearances Chart
var options = {
    chart: {
        type: 'donut',
        height: 300,
        pie: {
            size: 200
        }
    },
    series: clearancesData,
    labels: ['0 clearance', '1 clearance', '2 clearance', '3 clearance', '4 clearance', '5 clearance',
        '6 clearance', '7 clearance', '8 clearance', '9 clearance'
    ],
    legend: {
        labels: {
            colors: '#ffffff',
            useSeriesColors: false
        }
    }
};

var chart = new ApexCharts(document.querySelector("#clearancesChart"), options);

chart.render();

//Project Type Chart
var options = {
    series: [{
        data: projectTypeData
    }],
    chart: {
        type: 'bar',
        height: 380,
        toolbar: {
            show: false
        }
    },
    plotOptions: {
        bar: {
            barHeight: '100%',
            distributed: true,
            horizontal: true,
            dataLabels: {
                position: 'bottom',
                style: {
                    colors: ['#ffffff']
                }
            }
        }
    },
    colors: ['#FF4560', '#008FFB', '#00E396', '#775DD0', '#FEB019', '#FF7F50'],
    dataLabels: {
        enabled: true,
        textAnchor: 'start',
        style: {
            colors: ['#ffffff']
        },
        formatter: function (val, opt) {
            return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val;
        },
        offsetX: 0,
        dropShadow: {
            enabled: true
        }
    },
    stroke: {
        width: 1,
        colors: ['#fff']
    },
    xaxis: {
        categories: ['FMR', 'FMB', 'Bridge', 'CIS', 'PWS', 'VCI'],
        labels: {
            style: {
                colors: '#ffffff'
            }
        }
    },
    yaxis: {
        labels: {
            show: false
        }
    },
    title: {
        text: 'Project Type Distribution',
        align: 'center',
        floating: true,
        style: {
            color: '#ffffff'
        }
    },
    subtitle: {
        text: 'Distribution of Project Types',
        align: 'center',
        style: {
            color: '#ffffff'
        }
    },
    tooltip: {
        theme: 'dark',
        x: {
            show: false
        },
        y: {
            title: {
                formatter: function () {
                    return ''
                }
            }
        }
    },
    legend: {
        labels: {
            colors: '#ffffff'
        }
    }
};

var chart = new ApexCharts(document.querySelector("#projectType"), options);
chart.render();

//Project Category Chart
var options = {
    series: [{
        data: projectCategoryData
    }],
    chart: {
        height: 380,
        type: 'bar',
        events: {
            click: function (chart, w, e) {
            }
        },
        toolbar: {
            show: false
        }
    },
    colors: ['#FF4560', '#008FFB', '#00E396', '#775DD0', '#FEB019', '#FF7F50'],
    plotOptions: {
        bar: {
            columnWidth: '45%',
            distributed: true,
        }
    },
    dataLabels: {
        enabled: false
    },
    legend: {
        show: false
    },
    xaxis: {
        categories: ['Construction', 'Rehabilitation', 'Upgrading', 'Additional Work'],
        labels: {
            style: {
                colors: '#ffffff',
                fontSize: '12px'
            }
        }
    },
    title: {
        text: 'Project Category Distribution',
        align: 'center',
        floating: true,
        style: {
            color: '#ffffff'
        }
    },
    subtitle: {
        text: 'Distribution of Project Categories',
        align: 'center',
        style: {
            color: '#ffffff'
        }
    },
    tooltip: {
        theme: 'dark',
        x: {
            show: false
        },
        y: {
            title: {
                formatter: function () {
                    return '';
                }
            }
        }
    }
};

// Render the chart
var chart = new ApexCharts(document.querySelector("#projectCategory"), options);
chart.render();

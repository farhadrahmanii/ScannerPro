$(function() {
    "use strict";
    var e = {
        series: [{
            name: "Total Users",
            data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257]
        }],
        // ...existing code...
    };
    new ApexCharts(document.querySelector("#w-chart1"), e).render();
    e = {
        series: [{
            name: "Page Views",
            data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257]
        }],
        // ...existing code...
    };
    new ApexCharts(document.querySelector("#w-chart2"), e).render();
    e = {
        series: [{
            name: "Avg. Session Duration",
            data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257]
        }],
        // ...existing code...
    };
    new ApexCharts(document.querySelector("#w-chart3"), e).render();
    e = {
        series: [{
            name: "Bounce Rate",
            data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257]
        }],
        // ...existing code...
    };
    new ApexCharts(document.querySelector("#w-chart4"), e).render();
    e = {
        series: [{
            name: "Total Orders",
            data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257]
        }],
        // ...existing code...
    };
    new ApexCharts(document.querySelector("#w-chart5"), e).render();
    e = {
        series: [{
            name: "Total Income",
            data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257]
        }],
        // ...existing code...
    };
    new ApexCharts(document.querySelector("#w-chart6"), e).render();
    e = {
        series: [{
            name: "Total Users",
            data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257]
        }],
        // ...existing code...
    };
    new ApexCharts(document.querySelector("#w-chart7"), e).render();
    e = {
        series: [{
            name: "Comments",
            data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257]
        }],
        // ...existing code...
    };
    new ApexCharts(document.querySelector("#w-chart8"), e).render();

    // Livewire event listeners to update charts
    Livewire.on('updateChartData', chartData => {
        const chartsToUpdate = ['w-chart2', 'w-chart4', 'w-chart7', 'w-chart8'];
        chartsToUpdate.forEach(chartId => {
            const chart = ApexCharts.getChartByID(chartId);
            if (chart) {
                chart.updateSeries([{
                    name: chartData.name,
                    data: chartData.data
                }]);
                chart.updateOptions({
                    xaxis: {
                        categories: chartData.categories
                    }
                });
            }
        });
    });
});

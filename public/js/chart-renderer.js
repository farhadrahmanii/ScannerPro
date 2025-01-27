$(function () {
    "use strict";

    // Function to fetch data dynamically based on chart name
    function fetchChartData(chartName) {
        return $.ajax({
            url: `/get-chart-data`, // Update with your backend route
            method: 'GET',
            data: { name: chartName },
            dataType: 'json'
        }).done(function (response) {
            console.log("Data fetched for " + chartName, response);
        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.error("Error fetching data for " + chartName, textStatus, errorThrown);
        });
    }

    // Function to render a chart
    function renderChart(chartId, chartName, chartType, chartColor) {
        fetchChartData(chartName).then(function (response) {
            if (!response || !response.data || !response.categories) {
                console.error("Invalid response for " + chartName, response);
                return;
            }

            var options = {
                series: [{
                    name: chartName + " (2025)", // Updated title to indicate 2025 data
                    data: response.data // Replace with dynamic data from the backend
                }],
                chart: {
                    type: chartType,
                    height: 350, // Adjusted height for better visibility
                    toolbar: { show: false },
                    zoom: { enabled: false },
                    dropShadow: {
                        enabled: true,
                        top: 3,
                        left: 14,
                        blur: 4,
                        opacity: 0.12,
                        color: chartColor
                    },
                    sparkline: { enabled: false } // Disabled sparkline for full chart
                },
                markers: {
                    size: 0,
                    colors: [chartColor],
                    strokeColors: "#fff",
                    strokeWidth: 2,
                    hover: { size: 7 }
                },
                stroke: {
                    show: true,
                    width: chartType === 'bar' ? 0 : 2.4,
                    curve: "smooth"
                },
                colors: [chartColor],
                xaxis: {
                    categories: response.categories // Replace with categories from the backend
                },
                fill: { opacity: 1 },
                tooltip: {
                    theme: "dark",
                    fixed: { enabled: false },
                    x: { show: true }, // Show x-axis tooltip
                    y: {
                        title: {
                            formatter: function () {
                                return "";
                            }
                        }
                    },
                    marker: { show: true }
                }
            };
            new ApexCharts(document.querySelector(chartId), options).render();
        }).catch(function (error) {
            console.error("Error rendering chart for " + chartName, error);
        });
    }

    // List of charts to render with correct names
    const charts = [
        { id: "#w-chart3", name: "Vehicles", type: "line", color: "#0d6efd" },
        { id: "#w-chart4", name: "Drivers", type: "bar", color: "#ffb207" },
        { id: "#w-chart7", name: "Payment Fees", type: "line", color: "#17a00e" },
        { id: "#w-chart2", name: "Transactions", type: "bar", color: "#f41127" }
    ];

    // Render all charts
    charts.forEach(chart => {
        renderChart(chart.id, chart.name, chart.type, chart.color);
    });
});
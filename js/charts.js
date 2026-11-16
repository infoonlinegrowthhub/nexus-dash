/**
 * Nexus Dash - Chart Engine (Chart.js)
 * Purpose: Initializes all analytical visualizations for the Dashboard and Analytics views.
 */

let activityChartInstance = null;
let statusDonutChartInstance = null;
let analyticsInstances = {};

// Configure global Chart.js defaults for high visibility
if (window.Chart) {
    Chart.defaults.color = "#334155";
    Chart.defaults.font.family = "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif";
    Chart.defaults.borderColor = "#e2e8f0";
}

function initCharts() {
    initActivityLineChart("7d");
    initStatusDonutChart();
}

function initActivityLineChart(initialRange = "7d") {
    const canvas = document.getElementById("activity-line-chart");
    if (!canvas || !window.Chart) return;

    const dataConfig = ChartDataSets.activity[initialRange] || ChartDataSets.activity["7d"];
    const ctx = canvas.getContext("2d");

    const primaryGradient = ctx.createLinearGradient(0, 0, 0, 300);
    primaryGradient.addColorStop(0, "rgba(16, 185, 129, 0.2)");
    primaryGradient.addColorStop(1, "rgba(16, 185, 129, 0.0)");

    if (activityChartInstance) {
        activityChartInstance.destroy();
    }

    activityChartInstance = new Chart(canvas, {
        type: "line",
        data: {
            labels: dataConfig.labels,
            datasets: [
                {
                    label: "Current Period",
                    data: dataConfig.primarySeries,
                    borderColor: "#10b981",
                    backgroundColor: primaryGradient,
                    borderWidth: 2.5,
                    fill: true,
                    tension: 0.35,
                    pointBackgroundColor: "#ffffff",
                    pointBorderColor: "#10b981",
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6
                },
                {
                    label: "Previous Period",
                    data: dataConfig.secondarySeries,
                    borderColor: "#64748b",
                    borderWidth: 1.8,
                    borderDash: [4, 4],
                    fill: false,
                    tension: 0.35,
                    pointRadius: 0,
                    pointHoverRadius: 4
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: "top",
                    align: "end",
                    labels: {
                        boxWidth: 12,
                        boxHeight: 12,
                        usePointStyle: true,
                        color: "#334155",
                        font: { weight: "600" }
                    }
                },
                tooltip: {
                    backgroundColor: "#0f172a",
                    padding: 10,
                    cornerRadius: 8
                }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: { color: "#64748b", font: { weight: "500" } }
                },
                y: {
                    border: { dash: [3, 3] },
                    grid: { color: "#e2e8f0" },
                    ticks: {
                        color: "#64748b",
                        font: { weight: "500" },
                        callback: function (val) {
                            return val >= 1000 ? (val / 1000) + "k" : val;
                        }
                    }
                }
            }
        }
    });
}

function updateActivityChart(rangeKey) {
    if (!activityChartInstance) return;
    const dataConfig = ChartDataSets.activity[rangeKey];
    if (!dataConfig) return;

    activityChartInstance.data.labels = dataConfig.labels;
    activityChartInstance.data.datasets[0].data = dataConfig.primarySeries;
    activityChartInstance.data.datasets[1].data = dataConfig.secondarySeries;
    activityChartInstance.update();
}

function initStatusDonutChart() {
    const canvas = document.getElementById("status-donut-chart");
    if (!canvas || !window.Chart) return;

    const dataset = ChartDataSets.statusBreakdown;

    if (statusDonutChartInstance) {
        statusDonutChartInstance.destroy();
    }

    statusDonutChartInstance = new Chart(canvas, {
        type: "doughnut",
        data: {
            labels: dataset.labels,
            datasets: [
                {
                    data: dataset.values,
                    backgroundColor: dataset.colors,
                    borderWidth: 2,
                    borderColor: "#ffffff",
                    hoverOffset: 4
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: "75%",
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: "#0f172a",
                    padding: 10,
                    cornerRadius: 8,
                    callbacks: {
                        label: function (context) {
                            return ` ${context.label}: ${context.raw}%`;
                        }
                    }
                }
            }
        }
    });
}

/**
 * Initializes the 4 dedicated charts for analytics.html:
 * 1. Line: Traffic trend
 * 2. Bar: Revenue by acquisition channel
 * 3. Pie: Device session breakdown
 * 4. Horizontal Bar: Regional distribution
 */
function initAnalyticsCharts() {
    if (!window.Chart) return;
    const aData = ChartDataSets.analytics;

    // 1. Traffic Trend Line Chart
    const trafficCanvas = document.getElementById("chart-traffic-trend");
    if (trafficCanvas) {
        analyticsInstances.traffic = new Chart(trafficCanvas, {
            type: "line",
            data: {
                labels: aData.trafficTrend.labels,
                datasets: [
                    {
                        label: "Organic Search",
                        data: aData.trafficTrend.organic,
                        borderColor: "#10b981",
                        backgroundColor: "rgba(16, 185, 129, 0.1)",
                        fill: true,
                        tension: 0.3
                    },
                    {
                        label: "Referral / Direct",
                        data: aData.trafficTrend.referral,
                        borderColor: "#3b82f6",
                        borderDash: [3, 3],
                        fill: false,
                        tension: 0.3
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { position: "top", align: "end" } }
            }
        });
    }

    // 2. Revenue by Channel Vertical Bar
    const channelCanvas = document.getElementById("chart-revenue-channel");
    if (channelCanvas) {
        analyticsInstances.channel = new Chart(channelCanvas, {
            type: "bar",
            data: {
                labels: aData.revenueByChannel.labels,
                datasets: [{
                    label: "Gross Revenue ($)",
                    data: aData.revenueByChannel.values,
                    backgroundColor: ["#10b981", "#3b82f6", "#6366f1", "#f59e0b", "#ec4899"],
                    borderRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } }
            }
        });
    }

    // 3. Device Breakdown Pie Chart
    const deviceCanvas = document.getElementById("chart-device-breakdown");
    if (deviceCanvas) {
        analyticsInstances.device = new Chart(deviceCanvas, {
            type: "pie",
            data: {
                labels: aData.deviceBreakdown.labels,
                datasets: [{
                    data: aData.deviceBreakdown.values,
                    backgroundColor: aData.deviceBreakdown.colors
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { position: "bottom" } }
            }
        });
    }

    // 4. Regional Distribution Horizontal Bar Chart
    const regionalCanvas = document.getElementById("chart-regional-distribution");
    if (regionalCanvas) {
        analyticsInstances.regional = new Chart(regionalCanvas, {
            type: "bar",
            data: {
                labels: aData.regionalDistribution.labels,
                datasets: [{
                    label: "Market Share (%)",
                    data: aData.regionalDistribution.values,
                    backgroundColor: "#3b82f6",
                    borderRadius: 4
                }]
            },
            options: {
                indexAxis: "y",
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } }
            }
        });
    }
}

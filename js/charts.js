/**
 * Nexus Dash - Chart Configurations
 * Purpose: Initializes Chart.js instances for Activity Overview and Status Breakdown
 * Note: Pure vanilla JavaScript relying on Chart.js CDN.
 */

let activityChartInstance = null;
let statusDonutChartInstance = null;

function initCharts() {
    initActivityLineChart("7d");
    initStatusDonutChart();
}

function initActivityLineChart(initialRange = "7d") {
    const canvas = document.getElementById("activity-line-chart");
    if (!canvas || !window.Chart) return;

    const dataConfig = ChartDataSets.activity[initialRange] || ChartDataSets.activity["7d"];

    const ctx = canvas.getContext("2d");

    // Primary gradient
    const primaryGradient = ctx.createLinearGradient(0, 0, 0, 300);
    primaryGradient.addColorStop(0, "rgba(16, 185, 129, 0.2)");
    primaryGradient.addColorStop(1, "rgba(16, 185, 129, 0.0)");

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
                    borderColor: "#cbd5e1",
                    borderWidth: 1.5,
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
                        font: {
                            size: 11,
                            family: "inherit"
                        },
                        color: "#64748b"
                    }
                },
                tooltip: {
                    backgroundColor: "#0f172a",
                    titleFont: { size: 12, weight: "600" },
                    bodyFont: { size: 12 },
                    padding: 10,
                    cornerRadius: 8,
                    displayColors: true
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: { size: 11 },
                        color: "#94a3b8"
                    }
                },
                y: {
                    border: {
                        dash: [3, 3]
                    },
                    grid: {
                        color: "#f1f5f9"
                    },
                    ticks: {
                        font: { size: 11 },
                        color: "#94a3b8",
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
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: "#0f172a",
                    titleFont: { size: 12, weight: "600" },
                    bodyFont: { size: 12 },
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

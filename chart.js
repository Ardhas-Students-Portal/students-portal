document.addEventListener("DOMContentLoaded", async () => {
    try {
        const response = await fetch("chart.php");
        const chartData = await response.json();
        const ctx = document.getElementById("piechart").getContext('2d');

        new Chart(ctx, {
            type: 'pie',
            data: chartData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Student Gender Distribution'
                    }
                }
            }
        });
    } catch (error) {
        console.error("Error fetching chart data:", error);
    }
    try {
        const response = await fetch("chart.php");
        const chartData = await response.json();
        const ctx = document.getElementById("barchart").getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Student Gender Distribution'
                    }
                }
            }
        });
    } catch (error) {
        console.error("Error fetching chart data:", error);
    }
});
document.addEventListener("DOMContentLoaded", async () => {
    // Fetch and create the pie chart
    try {
        const response = await fetch("chart.php");
        const chartData = await response.json();
        const ctxPie = document.getElementById("piechart").getContext('2d');

        new Chart(ctxPie, {
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
        console.error("Error fetching pie chart data:", error);
    }
    
    try {
        const response = await fetch("barchart.php");
        const chartData = await response.json();
        const ctxBar = document.getElementById("barchart").getContext('2d');

        new Chart(ctxBar, {
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
                        text: 'Class Distribution'
                    }
                }
            }
        });
    } catch (error) {
        console.error("Error fetching bar chart data:", error);
    }
});

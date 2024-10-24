const startDateInput = document.getElementById('startDate');
const endDateInput = document.getElementById('endDate');
const generateChartsButton = document.getElementById('generateCharts');
const barChartCanvas = document.getElementById('bar-chart').getContext('2d');
const lineChartCanvas = document.getElementById('line-chart').getContext('2d');

// Sample data for demonstration
const sampleData = {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
    datasets: [
        {
            label: 'Online',
            data: [12, 19, 3, 5, 2, 3, 11]
        },
        {
            label: 'Walk-in',
            data: [6, 12, 8, 1, 3, 5, 2]
        }
    ]
};

generateChartsButton.addEventListener('click', () => {
    // Replace this with your actual data fetching logic
    const startDate = startDateInput.value;
    const endDate = endDateInput.value;

    // Fetch data from your backend based on start and end dates

    // Create charts using the fetched data
    const barChart = new Chart(barChartCanvas, {
        type: 'bar',
        data: sampleData, // Replace with your fetched data
        options: {
            responsive: true
        }
    });

    const lineChart = new Chart(lineChartCanvas, {
        type: 'line',
        data: sampleData, // Replace with your fetched data
        options: {
            responsive: true
        }
    });
});
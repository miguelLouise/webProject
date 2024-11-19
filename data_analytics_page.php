<?php
require_once './includes/login/login_view.php';
include './middleware/admin_middleware.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Analytics</title>
    <link rel="stylesheet" href="css/data_analytics.css">
</head>

<body>

    <div class="data_analytics_container1">
        <!-- header -->
        <?php include('./templates/logged_in_header_admin.php'); ?>
        <!-- header -->
    </div>

    <div class="chart-container">
        <div class="chart-input">
            <label for="startDate">Start Date:</label>
            <input type="date" id="startDate">
            <label for="endDate">End Date:</label>
            <input type="date" id="endDate">
            <button id="generateCharts">Generate Charts</button>
        </div>
        <div class="chart-area">
            <div class="chart-card">
                <h2 class="chart-title">Bar Chart Overview</h2>
                <canvas id="bar-chart"></canvas>
            </div>
            <div class="chart-card">
                <h2 class="chart-title">Reservation and Tenants Statistics</h2>
                <canvas id="line-chart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="javascript/data_analytics.js"></script>

</body>
</html>
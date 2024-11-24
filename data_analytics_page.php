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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
</head>

<body>

    <div class="data_analytics_container1">
        <!-- header -->
        <?php include('./templates/logged_in_header_admin.php'); ?>
        <!-- header -->
    </div>

    <div class="chart-container">
        <!-- <form action="includes/data_analytics/data_analytics.php" method="post" novalidate> -->
        <div class="chart-input">
            <label for="startDate">Start Date:</label>
            <input type="month" id="startDate" name="startDate">
            <label for="endDate">End Date:</label>
            <input type="month" id="endDate" name="endDate">
            <button id="generateCharts">Generate Charts</button>
        </div>
        <div class="chart-area">
            <div class="chart-card">
                <h2 class="chart-title">Monthly Reservations</h2>
                <canvas id="monthly_reservations_chart"></canvas>
            </div>
            <div class="chart-card">
                <h2 class="chart-title">Dormlink Tenants</h2>
                <canvas id="dormlink_tenants_chart"></canvas>
            </div>
            <div class="chart-card">
                <h2 class="chart-title">Maintenance Request</h2>
                <canvas id="maintenance_request_chart"></canvas>
            </div>
        </div>
        <!-- </form> -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="javascript/data_analytics.js"></script>

</body>
</html>
cdn.jsdelivr.net
<?php
require_once './includes/login/login_view.php';
include './middleware/admin_middleware.php';
require_once './includes/dbh.inc.php';
require_once './includes/tenant_management/tenant_management_view.php';
require_once './includes/room_management/room_management_view.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dormlink - Admin Dashboard</title>
    <link rel="stylesheet" href="css//admin_dashboard.css">
</head>

<body>
    <div class="admin_dashboard_container1">
        <!-- header -->
        <?php include('./templates/logged_in_header_admin.php'); ?>
        <!-- header -->
    </div>

    <!-- page content -->
    <!-- HEAD -->
    <main class="main-container">
        <div class="main-title">
          <h2>DASHBOARD</h2>
        </div>

        <div class="admin_dashboard_container2">
            <a href="tenant_management_page_admin.php" class="dashboard-box box1">
                <img src="Assets/box1icon.png" alt="Total Tenants Icon" class="box-icon">
                <div class="box-content">
                <h3>Total Tenants</h3>
                <!-- php -->
                <p><?php show_total_tenants($dbconn); ?></p>
                </div>  
            </a>

            <a href="room_management_page_admin.php" class="dashboard-box box2">
                <img src="Assets/box2icon.png" alt="Total Rooms Icon" class="box-icon">
                <div class="box-content">
                <h3>Total Rooms</h3>
                <p><?php show_total_rooms($dbconn); ?></p> 
                </div>  
            </a>

            <a href="room_management_page_admin.php" class="dashboard-box box3">
                <img src="Assets/box3icon.png" alt="Total Beds Icon" class="box-icon">
                <div class="box-content">
                <h3>Total Beds</h3>
                <p><?php show_total_beds($dbconn); ?></p> 
                </div> 
            </a>

            <a href="#" class="dashboard-box box4">
                <img src="Assets/box4icon.png" alt="Unpaid Icon" class="box-icon">
                <div class="box-content">  
                <h3>Vacant Rooms</h3>
                <p>0</p>
                </div>
            </a>

            
            <a href="#" class="dashboard-box box5">
                <img src="Assets/box5icon.png" alt="Total Balances Icon" class="box-icon">
                <div class="box-content">
                <h3>Occupied Rooms</h3>
                <p>0</p>
                </div>
            </a>
            
            <a href="reservation_management_page_admin.php" class="dashboard-box box6">
                <img src="Assets/box6icon.png" alt="Total Paid Icon" class="box-icon">
                <div class="box-content">
                <h3>Reservations</h3>
                <p><?php show_total_reservations($dbconn); ?></p>
                </div>
            </a>    



            <div class="charts">
                <div class="charts-card">
                    <h2 class="chart-title">Sample Overview</h2>
                    <div id="bar-chart"></div>
                </div>

                <div class="charts-card">
                    <h2 class="chart-title">Reservation Statistics</h2>
                    <div id="area-chart"></div>
                </div>
            </div>
        </div>

        <!-- ApexCharts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
        <!-- Custom JS -->
        <script src="javascript/admin_dashboard.js"></script>
>>>>>>> e3c9b483a97e5f8f8c6691a0e753b37879a9d109
</body>

</html>

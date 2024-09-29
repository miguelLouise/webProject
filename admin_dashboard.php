<?php
require_once "./includes/login/login_view.php";
include "./middleware/admin_middleware.php";
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
    <div class="admin_dashboard_container2">
        <a href="samplePage.php" class="dashboard-box box1">
            <h3>Total Tenants</h3>
            <p>0</p>
        </a>
    </div>
</body>

</html>

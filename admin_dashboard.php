<?php
require_once "./middleware/admin_middleware.php";
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
        <div class="dashboard-box box1">
            <h3>Total Tenants</h3>
            <p>0</p>
            <a href="samplePage.php" class="view-more-button">
            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#e8eaed"><path d="m288-96-68-68 316-316-316-316 68-68 384 384L288-96Z"/></svg>
            </a>
        </div>
        <div class="dashboard-box box2">
            <h3>Total Rooms</h3>
            <p>0</p>
            <a href="samplePage.php" class="view-more-button">
            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#e8eaed"><path d="m288-96-68-68 316-316-316-316 68-68 384 384L288-96Z"/></svg>
            </a>
        </div>
        <div class="dashboard-box box3">
            <h3>Total Beds</h3>
            <p>0</p>
            <a href="samplePage.php" class="view-more-button">
            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#e8eaed"><path d="m288-96-68-68 316-316-316-316 68-68 384 384L288-96Z"/></svg>
            </a>
        </div>
        <div class="dashboard-box box4">
            <h3>Unpaid Invoices</h3>
            <p>0</p>
            <a href="samplePage.php" class="view-more-button">
            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#e8eaed"><path d="m288-96-68-68 316-316-316-316 68-68 384 384L288-96Z"/></svg>
            </a>
        </div>
        <div class="dashboard-box box5">
            <h3>Total Balance Amount</h3>
            <p>0</p>
            <a href="samplePage.php" class="view-more-button">
            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#e8eaed"><path d="m288-96-68-68 316-316-316-316 68-68 384 384L288-96Z"/></svg>
            </a>
        </div>
        <div class="dashboard-box box6">
            <h3>Total Paid Amount</h3>
            <p>0</p>
            <a href="samplePage.php" class="view-more-button">
            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#e8eaed"><path d="m288-96-68-68 316-316-316-316 68-68 384 384L288-96Z"/></svg>
            </a>
        </div>
        <!-- Dynamic month names -->
        <div class="dashboard-box box7">
            <h3><?php echo date('F'); ?> Income</h3>
            <p>0</p>
            <a href="samplePage.php" class="view-more-button">
            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#e8eaed"><path d="m288-96-68-68 316-316-316-316 68-68 384 384L288-96Z"/></svg>
            </a>
        </div>
        <div class="dashboard-box box8">
            <h3><?php echo date('F'); ?> Expense</h3>
            <p>0</p>
            <a href="samplePage.php" class="view-more-button">
            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#e8eaed"><path d="m288-96-68-68 316-316-316-316 68-68 384 384L288-96Z"/></svg>
            </a>
        </div>
    </div>
</body>

</html>

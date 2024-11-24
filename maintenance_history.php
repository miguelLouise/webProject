<?php
require_once './includes/login/login_view.php';
include './middleware/admin_middleware.php';
require_once './includes/dbh.inc.php';
require_once './includes/maintenance_management/maintenance_management_model.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance History</title>
    <link rel="stylesheet" href="css/maintenance_history.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
</head>
<body>
    <!-- header -->
    <?php include('./templates/logged_in_header_admin.php'); ?>
    <!-- header -->

    <div class="maintenance_history_con1">
        <div class="filter_container"></div>
        <div class="maintenance_history_con2">
        <table>
        <thead>
            <tr>
            <th>Request ID</th>
            <th>Room #</th>
            <th>Category</th>
            <th>Urgency</th>
            <th>Description</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
            <th>Date Completed</th>
            </tr>
        </thead>
        <tbody id="maintenance_history_table">

        </tbody>
    </table>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $.ajax({
                type: 'POST',
                url: 'ajax/getMaintenanceHistory.php',
                data: {},
                success: function(data){
                $('#maintenance_history_table').html(data);
                }
            });
        })
    </script>

</body>
</html>
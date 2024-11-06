<?php
require_once './includes/login/login_view.php';
include './middleware/admin_middleware.php';
require_once './includes/dbh.inc.php';
require_once 'includes/maintenance_management/maintenance_management_model.php';
require_once 'includes/maintenance_management/maintenance_management_view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenanace Request Management</title>
    <link rel="stylesheet" href="css/maintenanace_request_management.css">
</head>
<body>
    <div class="maintenance_management_container1">
        <!-- header -->
        <?php include('./templates/logged_in_header_admin.php'); ?>
        <!-- header -->
    </div>

    <div class="container">
        <h1>Manage Maintenance Request</h1>
        <div class="date-time" id="dateTime"></div>
        <table class="request-table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>user_id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>room_id</th>
                    <th>category</th>
                    <th>maintenance_urgency</th>
                    <th>description</th>
                    <th>date</th>
                    <th>time</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody id="maintenance-requests">
                <!-- Sample data will be dynamically inserted here -->
                <?php $get_maintenance_request = get_maintenance_request($dbconn);
                foreach($get_maintenance_request as $maintenance_req){
                    echo '<form action="includes/tenant_management/tenant_edit.php" method="get">';
                    echo '<tr>';
                    echo '<td>'.$maintenance_req["maintenance_request_id"].'</td>';
                    echo '<td>'.$maintenance_req["user_id"].'</td>';
                    echo '<td>'.$maintenance_req["name"].'</td>';
                    echo '<td>'.$maintenance_req["email"].'</td>';
                    echo '<td>'.$maintenance_req["room_id"].'</td>';
                    echo '<td>'.$maintenance_req["category"].'</td>';
                    echo '<td>'.$maintenance_req["maintenance_urgency"].'</td>';
                    echo '<td>'.$maintenance_req["description"].'</td>';
                    echo '<td>'.format_date($maintenance_req["date"]).'</td>';    
                    echo '<td>'.format_time($maintenance_req["date"]).'</td>';    
                     echo '</tr>';
                     echo '</form>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- <script src="javascript/maintenance_request_management.js"></script> -->
    
</body>
</html>
<?php
require_once './includes/login/login_view.php';
include './middleware/admin_middleware.php';
require_once './includes/dbh.inc.php';
require_once 'includes/maintenance_management/maintenance_management_model.php';
require_once 'includes/maintenance_management/maintenance_management_view.php';
require_once 'includes/tenant_management/tenant_management_view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Request Management</title>
    <link rel="stylesheet" href="css//maintenanace_request_management.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="javascript//maintenance_request_management.js"></script>
</head>
<body>
    <div class="maintenance_management_container1">
        <!-- header -->
        <?php include('./templates/logged_in_header_admin.php'); ?>
        <!-- header -->
    </div>

    <div class="container">
        <h1>Manage Maintenance Request</h1>
        <div class="filter_container" id="filter_container" style="display: flex;">
            <div class="form-row">
                <div class="form-group">
                    <label for="maintenance_category">Category</label>
                    <select name="maintenance_category" id="maintenance_category" class="maintenance_category">
                            <option value="" selected disabled hidden>Category</option>
                            <option value="Electrical">Electrical</option>
                            <option value="Plumbing">Plumbing</option>
                            <option value="HVAC">HVAC</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="maintenance_urgency">Urgency</label>
                    <select name="maintenance_urgency" id="maintenance_urgency">
                        <option value="" selected disabled hidden>Urgency</option>
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="High">High</option>
                        <option value="Emergency">Emergency</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="date_from">From</label>
                    <input type="date" id="date_from" name="date_from" value="">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="date_to">To</label>
                    <input type="date" id="date_to" name="date_to" value="">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="maintenance_status">Status</label>
                    <select name="maintenance_status" id="maintenance_status">
                        <option value="" selected disabled hidden>Status</option>
                            <option value="Pending">Pending</option>
                            <option value="Scheduled">Scheduled</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Completed">Completed</option>
                    </select>
                </div>
            </div>

        </div>
        <table class="request-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="userId">User ID</th>
                    <th class="userName">Name</th>
                    <th class="userEmail">Email</th>
                    <th>Room ID</th>
                    <th>Room Number</th>
                    <th>Category</th>
                    <th>Urgency</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="maintenance-requests">
                <!-- Sample data will be dynamically inserted here -->
                <?php $get_maintenance_request = get_maintenance_request($dbconn);
                foreach($get_maintenance_request as $maintenance_req){
                    echo '<form action="includes/tenant_management/tenant_edit.php" method="get">';
                    echo '<tr>';
                    echo '<td>'.$maintenance_req["maintenance_request_id"].'</td>';
                    echo '<td class="userId">'.$maintenance_req["user_id"].'</td>';
                    echo '<td class="userName">'.$maintenance_req["name"].'</td>';
                    echo '<td class="userEmail">'.$maintenance_req["email"].'</td>';
                    echo '<td>'.$maintenance_req["room_id"].'</td>';
                    echo '<td>'.$maintenance_req["room_number"].'</td>';
                    echo '<td>'.$maintenance_req["category"].'</td>';
                    echo '<td>'.$maintenance_req["maintenance_urgency"].'</td>';
                    echo '<td>'.$maintenance_req["description"].'</td>';
                    echo '<td>'.format_date($maintenance_req["date"]).'</td>';
                    echo '<td>'.format_time($maintenance_req["time"]).'</td>';
                    echo '<td>
                          <select name="maintenance_request_status" id="maintenance_request_status" class="maintenance_request_status">
                          <option value="'.$maintenance_req["maintenance_status"].','.$maintenance_req["maintenance_request_id"].'" selected hidden>'.$maintenance_req["maintenance_status"].'</option>
                          <option value="Pending,'.$maintenance_req["maintenance_request_id"].'">Pending</option>
                          <option value="Scheduled,'.$maintenance_req["maintenance_request_id"].'">Scheduled</option>
                          <option value="In Progress,'.$maintenance_req["maintenance_request_id"].'">In Progress</option>
                          <option value="Completed,'.$maintenance_req["maintenance_request_id"].'">Completed</option>
                          </select>
                          </td>';
                     echo '</tr>';
                     echo '</form>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
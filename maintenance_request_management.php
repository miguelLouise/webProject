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
    <title>Maintenance Request Management</title>
    <link rel="stylesheet" href="css//maintenanace_request_management.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
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
                    <th>ID</th>
                    <th class="userId">User ID</th>
                    <th class="userName">Name</th>
                    <th class="userEmail">Email</th>
                    <th>Room ID</th>
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
                    echo '<td>'.$maintenance_req["category"].'</td>';
                    echo '<td>'.$maintenance_req["maintenance_urgency"].'</td>';
                    echo '<td>'.$maintenance_req["description"].'</td>';
                    echo '<td>'.format_date($maintenance_req["date"]).'</td>';
                    echo '<td>'.format_time($maintenance_req["date"]).'</td>';
                    echo '<td>
                          <select name="maintenance_request_status" id="maintenance_request_status" class="maintenance_request_status">
                          <option value="" selected hidden>'.$maintenance_req["maintenance_status"].'</option>
                          <option value="Pending,'.$maintenance_req["maintenance_request_id"].'">Pending</option>
                          <option value="Scheduled,'.$maintenance_req["maintenance_request_id"].'">Scheduled</option>
                          <option value="In Progress,'.$maintenance_req["maintenance_request_id"].'">In Progress</option>
                          <option value="Completed,'.$maintenance_req["maintenance_request_id"].'">Completed</option>
                          <option value="Closed,'.$maintenance_req["maintenance_request_id"].'">Closed</option>
                          </select>
                          </td>';
                     echo '</tr>';
                     echo '</form>';
                }
                ?>
                <!-- maintenance request status: Submitted, Scheduled, In Progress, Completed -->
            </tbody>
        </table>
    </div>

    <!-- <script src="javascript/maintenance_request_management.js"></script> -->
     <script type="text/javascript">
          $(document).ready(function(){
            $(document).on("change", "#maintenance_request_status", function() {
                const getMaintenanceStatus = $(this).val().split(",");
                const getStatus = getMaintenanceStatus[0];
                const getMaintenanceId = getMaintenanceStatus[1];

                console.log(getMaintenanceStatus);
                console.log(getStatus);
                console.log(getMaintenanceId);

                $.ajax({
                    type: 'POST',
                    url: 'ajax/updateMaintenanceStatus.php',
                    data: {maintenance_status:getStatus, maintenance_id:getMaintenanceId},
                    success: function(data){

                   }
                });

            });
          });
     </script>

</body>
</html>
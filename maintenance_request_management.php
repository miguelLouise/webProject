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
    <link rel="stylesheet" href="css/maintenanace_request_management.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script> -->
     <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
    <!-- header -->
    <?php include('./templates/logged_in_header_admin.php'); ?>
    <!-- header -->

    <div class="container_one">
        <?php
        disappearing_maintenance_management_message("date_error");
        disappearing_maintenance_management_message("time_error");
        disappearing_maintenance_management_message("maintenance_schedule_set");
        ?>
        <!-- <h1>Manage Maintenance Request</h1> -->
        <div class="filter_container" id="filter_container">
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
                    <th>Room Number</th>
                    <th>Category</th>
                    <th>Urgency</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Set Schedule</th>
                </tr>
            </thead>

            <tbody class="request_table" id="maintenance-requests">
            <?php $get_maintenance_request = get_maintenance_request($dbconn);
             foreach($get_maintenance_request as $maintenance_req){
             ?>
             <tr>
                <td><?php echo $maintenance_req["maintenance_request_id"]; ?></td>
                <td><?php echo $maintenance_req["room_number"]; ?></td>
                <td><?php echo $maintenance_req["category"]; ?></td>
                <td><?php echo $maintenance_req["maintenance_urgency"]; ?></td>
                <td><?php echo $maintenance_req["description"]; ?></td>
                <td><?php echo format_date($maintenance_req["date"]) ?></td>
                <td><?php echo format_time($maintenance_req["time"]); ?></td>
                <td>
                    <select name="maintenance_request_status" id="maintenance_request_status" class="maintenance_request_status">
                        <option value="<?php echo $maintenance_req["maintenance_status"], ",",  $maintenance_req["maintenance_request_id"] ?>" selected hidden><?php echo $maintenance_req["maintenance_status"]; ?></option>
                        <option value="Pending,<?php echo $maintenance_req["maintenance_request_id"]; ?>">Pending</option>
                        <option value="Scheduled,<?php echo $maintenance_req["maintenance_request_id"]; ?>">Scheduled</option>
                        <option value="In Progress,<?php echo $maintenance_req["maintenance_request_id"]; ?>">In Progress</option>
                        <option value="Completed,<?php echo $maintenance_req["maintenance_request_id"]; ?>">Completed</option>
                    </select>
                </td>
                <td><button type="button" class="maintenance_issue_img_btn" id="open_maintenance_issue_img" value="<?php echo $maintenance_req["maintenance_request_id"]; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h560v-280h80v280q0 33-23.5 56.5T760-120H200Zm188-212-56-56 372-372H560v-80h280v280h-80v-144L388-332Z"/></svg></button></td>
                <td><button type="button" class="set_schedule_btn" id="set_schedule_btn" value="<?php echo $maintenance_req["maintenance_request_id"]; ?>">Set Schedule</button></td></td>
             </tr>

             <!-- image container -->
             <div class="img_container" id="<?php echo $maintenance_req["maintenance_request_id"]; ?>=issue_img">
                <button type="button" class="close_btn" id="close_btn" value="<?php echo $maintenance_req["maintenance_request_id"]; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#FFFFFF"><path d="m249-207-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z"/></svg></button>
                <div class="img_container1">
                <img src="uploads/maintenance_requests/<?php echo $maintenance_req["maintenance_issue_image"]; ?>" alt="maintenance_request_id=<?php echo $maintenance_req["maintenance_request_id"]; ?>#img_name=<?php echo $maintenance_req["maintenance_issue_image"]; ?>" height="100px" width="100px">
                </div>
             </div>

             <!-- schedule container -->
             <form action="includes/maintenance_management/set_maintenance_schedule.php" method="post" novalidate>
                <div class="set_maintenance_schedule" id="<?php echo $maintenance_req["maintenance_request_id"]; ?>=maintenance_schedule">
                    <div class="set_maintenance_schedule1">
                        <h2>Set Maintenance Date and Time</h2>
                        <div class="input_group">
                            <label for="message">Set Date</label>
                            <input type="date" name="maintenance_id=<?php echo $maintenance_req["maintenance_request_id"]; ?>_date" class="maintenance_set_date" id="maintenance_id=<?php echo $maintenance_req["maintenance_request_id"]; ?>_set_date" value="<?php current_date(); display_message("current_date"); ?>">
                        </div>

                        <div class="input_group">
                            <label for="message">Set Time</label>
                            <input type="time" name="maintenance_id=<?php echo $maintenance_req["maintenance_request_id"]; ?>_time" class="maintenance_set_time" id="maintenance_id=<?php echo $maintenance_req["maintenance_request_id"]; ?>_set_time">
                        </div>

                        <div class="input_group">
                            <label for="message">Add Message/Reminder</label>
                            <textarea name="maintenance_id=<?php echo $maintenance_req["maintenance_request_id"]; ?>_message" class="maintenance_message" id="maintenance_id=<?php echo $maintenance_req["maintenance_request_id"]; ?>  _addtional_reminder/message" rows="3"></textarea>
                        </div>
                        <button type="submit" name="action" value="<?php echo $maintenance_req["maintenance_request_id"]; ?>" >Confirm</button>
                        <button type="button" class="close_set_schedule" id="close_set_schedule" value="<?php echo $maintenance_req["maintenance_request_id"]; ?>">Cancel</button>
                    </div>
                </div>
             </form>

             <?php
             }
            ?>

            </tbody>
        </table>
    </div>


    <script src="javascript/maintenance_request_management.js"></script>
</body>
</html>
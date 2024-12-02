<?php
require_once '../includes/dbh.inc.php';
require_once '../includes/maintenance_management/maintenance_management_model.php';
require_once '../includes/maintenance_management/maintenance_management_view.php';

$maintenance_status = $_POST['maintenance_status'];
$filter_by_maintenance_status = filter_by_maintenance_status($dbconn, $maintenance_status);

foreach($filter_by_maintenance_status as $data){
echo '<tr>';
echo '<tr>';
    echo '<td>' . $data['maintenance_request_id'] . '</td>';
    // echo '<td class="userId">' . $data['user_id'] . '</td>';
    // echo '<td class="userName">' . $data['name'] . '</td>';
    // echo '<td class="userEmail">' . $data['email'] . '</td>';
    // echo '<td>' . $data['room_id'] . '</td>';
    echo '<td class="room_number">' . $data['room_number'] . '</td>';
    echo '<td class="category">' . $data['category'] . '</td>';
    echo '<td class="maintenance_urgency">' . $data['maintenance_urgency'] . '</td>';
    echo '<td class="description">' . $data['description'] . '</td>';
    echo '<td class="date_submitted">' . format_date($data["date"]) . '</td>';
    echo '<td class="time_submitted">' . format_time($data["time"]) . '</td>';
    echo '<td class="maintenance_status">
            <select name="maintenance_request_status" id="maintenance_request_status" class="maintenance_request_status">
            <option value="" selected hidden>'.$data["maintenance_status"].'</option>
            <option value="Pending,'.$data["maintenance_request_id"].'">Pending</option>
            <option value="Scheduled,'.$data["maintenance_request_id"].'">Scheduled</option>
            <option value="In Progress,'.$data["maintenance_request_id"].'">In Progress</option>
            <option value="Completed,'.$data["maintenance_request_id"].'">Completed</option>
            <option value="Closed,'.$data["maintenance_request_id"].'">Closed</option>
            </select>
            </td>';
    echo '<td><button type="button" class="maintenance_issue_img_btn" id="open_maintenance_issue_img" value="'.$data["maintenance_request_id"].'"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h560v-280h80v280q0 33-23.5 56.5T760-120H200Zm188-212-56-56 372-372H560v-80h280v280h-80v-144L388-332Z"/></svg></button></td>';
    echo '</tr>';
}

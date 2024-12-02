<?php
require_once '../includes/dbh.inc.php';
require_once '../includes/maintenance_management/maintenance_management_model.php';
require_once '../includes/maintenance_management/maintenance_management_view.php';

$maintenance_date_to = $_POST['maintenance_date_to'];
$maintenance_category = $_POST['maintenance_category'];
$maintenance_status = $_POST['maintenance_status'];


$filter_by_status_category_and_date_from = filter_by_status_category_and_date_from($dbconn, $maintenance_date_to, $maintenance_category, $maintenance_status,);

foreach($filter_by_status_category_and_date_from as $data){
    echo '<tr>';
    echo '<td>' . $data['maintenance_request_id'] . '</td>';
    // echo '<td class="userId">' . $data['user_id'] . '</td>';
    // echo '<td class="userName">' . $data['name'] . '</td>';
    // echo '<td class="userEmail">' . $data['email'] . '</td>';
    // echo '<td>' . $data['room_id'] . '</td>';
    echo '<td>' . $data['room_number'] . '</td>';
    echo '<td>' . $data['category'] . '</td>';
    echo '<td>' . $data['maintenance_urgency'] . '</td>';
    echo '<td>' . $data['description'] . '</td>';
    echo '<td>' . format_date($data["date"]) . '</td>';
    echo '<td>' . format_time($data["time"]) . '</td>';
    echo '<td>
            <select name="maintenance_request_status" id="maintenance_request_status" class="maintenance_request_status">
            <option value="" selected hidden>'.$data["maintenance_status"].'</option>
            <option value="Pending,'.$data["maintenance_request_id"].'">Pending</option>
            <option value="Scheduled,'.$data["maintenance_request_id"].'">Scheduled</option>
            <option value="In Progress,'.$data["maintenance_request_id"].'">In Progress</option>
            <option value="Completed,'.$data["maintenance_request_id"].'">Completed</option>
            <option value="Closed,'.$data["maintenance_request_id"].'">Closed</option>
            </select>
            </td>';
    echo '<td><button type="button" class="maintenance_issue_img_btn" id="open_maintenance_issue_img" value="'.$maintenance_req["maintenance_request_id"].'"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h560v-280h80v280q0 33-23.5 56.5T760-120H200Zm188-212-56-56 372-372H560v-80h280v280h-80v-144L388-332Z"/></svg></button></td>';
    echo '</tr>';
}

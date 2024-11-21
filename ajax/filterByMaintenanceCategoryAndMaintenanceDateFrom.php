<?php
require_once '../includes/dbh.inc.php';
require_once '../includes/maintenance_management/maintenance_management_model.php';
require_once '../includes/maintenance_management/maintenance_management_view.php';

$maintenance_category = $_POST['maintenance_category'];
$maintenance_date_from = $_POST['maintenance_date_from'];
$filter_by_category_and_date_from = filter_by_category_and_date_from($dbconn, $maintenance_category, $maintenance_date_from);

foreach($filter_by_category_and_date_from as $data){
    echo '<tr>';
    echo '<td>' . $data['maintenance_request_id'] . '</td>';
    echo '<td class="userId">' . $data['user_id'] . '</td>';
    echo '<td class="userName">' . $data['name'] . '</td>';
    echo '<td class="userEmail">' . $data['email'] . '</td>';
    echo '<td>' . $data['room_id'] . '</td>';
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
    echo '</tr>';
}

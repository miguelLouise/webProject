<?php
require_once '../includes/dbh.inc.php';
require_once '../includes/room_management/room_management_model.php';

$room_status = $_POST['roomStatus'];
$filter_by_room_status = filter_by_room_status($dbconn, $room_status);

foreach($filter_by_room_status as $data){
    echo '<tr>';
    echo '<td id="tbl_room_data">' . $data['room_id'] . '</td>';
    echo '<td id="tbl_room_data">' . $data['room_type'] . '</td>';
    echo '<td id="tbl_room_data">' . $data['floor_number'] . '</td>';
    echo '<td id="tbl_room_data">' . $data['room_number'] . '</td>';
    echo '<td id="tbl_room_data">' . $data['tenants'] . '</td>';
    echo '<td id="tbl_room_data">' . $data['max_capacity'] . '</td>';
    echo '<td id="tbl_room_data">' . $data['room_status'] . '</td>';
    echo '</tr>';
}
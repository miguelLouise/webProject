<?php
require_once '../includes/dbh.inc.php';
require_once '../includes/room_management/room_management_model.php';

$room_type = $_POST['roomType'];
$filter_by_room_type = filter_by_room_type($dbconn, $room_type);

foreach($filter_by_room_type as $data){
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

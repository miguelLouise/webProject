<?php
require_once '../includes/dbh.inc.php';
require_once '../includes/room_management/room_management_model.php';

$floor_number = $_POST['floorNumber'];
$filter_by_floor_number = filter_by_floor_number($dbconn, $floor_number);

foreach($filter_by_floor_number as $data){
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
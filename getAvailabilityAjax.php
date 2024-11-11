<?php
require_once './includes/dbh.inc.php';
require_once './includes/room_management/room_management_view.php';

$rmType = $_POST['room_type'];
$flrNum  = $_POST['flr_num'];
$rmNum  = $_POST['room_num'];

$output = showRoomAvailability($dbconn, $rmType, $flrNum, $rmNum);

foreach ($output as $value) {
    echo 'Room id: ', $value['room_id'];
    echo '<br>';
    echo 'Room type: ',$value['room_type'];
    echo '<br>';
    echo 'Floor number: ',$value['floor_number'];
    echo '<br>';
    echo 'Room number: ',$value['room_number'];
    echo '<br>';
    echo 'tenants: ',$value['tenants'];
    echo '<br>';
    echo 'Max capacity: ',$value['max_capacity'];
    echo '<br>';
    echo 'status: ',$value['room_status'];
}

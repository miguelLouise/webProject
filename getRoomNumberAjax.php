<?php
require_once './includes/dbh.inc.php';
require_once './includes/room_management/room_management_view.php';

$rmType = $_POST['room_type'];
$flrNum  = $_POST['flr_num'];

$output = showRooms($dbconn, $rmType, $flrNum);

foreach ($output as $value) {
    echo '<option value="" selected disabled hidden>Room Number</option>';
    echo '<option value="'.$value['room_number'].'">'.$value['room_number'].'</option>';     
}

<?php
require_once './includes/dbh.inc.php';
require_once './includes/room_management/room_management_view.php';

$rmType = $_POST['roomTyp'];


$output = showFloors($dbconn, $rmType);

foreach ($output as $value) {
    echo '<option value="" selected disabled hidden>Floor Number</option>';
    echo '<option value="'.$rmType.','.$value['floor_number'].'">'.$value['floor_number'].'</option>';    
}

$roomDesc = showRoomDesc($dbconn, $rmType);


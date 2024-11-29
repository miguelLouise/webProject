<?php
require_once './includes/dbh.inc.php';
require_once './includes/room_management/room_management_view.php';

$room_type = $_POST['roomTyp'];

$output = showFloors($dbconn, $room_type);

if ($output) {
    foreach ($output as $value) {
        echo '<option value="" selected disabled hidden>Floor Number</option>';
        echo '<option value="'.$value['floor_number'].'">'.$value['floor_number'].'</option>';
    }
} else {
    echo '<option value="" selected disabled hidden>Floor Number</option>';
}

<?php
require_once './includes/dbh.inc.php';
require_once './includes/room_management/room_management_model.php';

$rmType = $_POST['roomTyp'];

$output = getRoomDesc($dbconn, $rmType);

if ($output) {

} else {
    // echo '<option value="" selected hidden>Room Type</option>';
}

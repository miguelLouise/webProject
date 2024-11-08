<?php
require_once './includes/dbh.inc.php';
require_once './includes/room_management/room_management_model.php';

$reservation_status = $_POST['reservation_status'];
$reservation_id = $_POST['reservation_id'];

update_reservation_status($dbconn, $reservation_status, $reservation_id);
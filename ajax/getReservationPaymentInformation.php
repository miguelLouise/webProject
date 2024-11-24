<?php
require_once '../includes/dbh.inc.php';
require_once '../includes/dp_management/downpayment_management_model.php';
require_once '../includes/maintenance_management/maintenance_management_view.php';

$reservation_Id = $_POST['reservation_Id'];
$filter_by_room_status = get_payment_info($dbconn, $reservation_Id);

if ($filter_by_room_status) {
    $img_path = "uploads/".$filter_by_room_status["image_filename"];

    echo 'Reservation ID: ', $filter_by_room_status["reservation_id"];
    echo '<br>';
    echo 'User ID: ', $filter_by_room_status["user_id"];
    echo '<br>';
    echo 'Name: ', $filter_by_room_status["name"];
    echo '<br>';
    echo 'Reference Number: ', $filter_by_room_status["payment_reference_number"];
    echo '<br>';
    echo 'Date Submitted: ', format_date($filter_by_room_status["date_uploaded"]) ,' ', format_time($filter_by_room_status["date_uploaded"]);
    echo '<br>';
    echo '<img src="'.$img_path.'" alt="'.$filter_by_room_status["image_filename"].'" style="width: 300px; height: 400px;">';
}

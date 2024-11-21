<?php
require_once '../includes/dbh.inc.php';
require_once '../includes/maintenance_management/maintenance_management_model.php';
require_once '../includes/maintenance_management/maintenance_management_view.php';

$maintenance_id = $_POST['maintenance_id'];
$date_completed = date("Y-m-d");

is_delete_maintenance_request($dbconn, $maintenance_id, $date_completed);
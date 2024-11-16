<?php
require_once '../includes/dbh.inc.php';
require_once '../includes/maintenance_management/maintenance_management_model.php';

$maintenance_status = $_POST['maintenance_status'];
$maintenance_id = $_POST['maintenance_id'];

update_maintenance_status($dbconn, $maintenance_status, $maintenance_id);

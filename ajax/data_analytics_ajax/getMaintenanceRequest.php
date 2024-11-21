<?php
require_once '../../includes/dbh.inc.php';
require_once '../../includes/data_analytics/data_analytics_model.php';

$date_start = $_POST['date_start'];
$date_end = $_POST['date_end'];

$get_maintenance_request = get_maintenance_request($dbconn, $date_start, $date_end);

foreach ($get_maintenance_request as $data) {
    $result_array[] = $data;
}

$encoded_result = json_encode($result_array, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

echo $encoded_result;
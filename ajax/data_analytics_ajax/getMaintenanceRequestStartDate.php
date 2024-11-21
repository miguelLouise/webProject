<?php
require_once '../../includes/dbh.inc.php';
require_once '../../includes/data_analytics/data_analytics_model.php';

$date_start = $_POST['date_start'];

$get_maintenance_request_start_date = get_maintenance_request_start_date($dbconn, $date_start);

foreach ($get_maintenance_request_start_date as $data) {
    $result_array[] = $data;
}

$encoded_result = json_encode($result_array, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

echo $encoded_result;
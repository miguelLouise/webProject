<?php
require_once '../includes/dbh.inc.php';
require_once '../includes/maintenance_management/maintenance_management_model.php';

$get_completed_maintenance_request = get_completed_maintenance_request($dbconn);

foreach ($get_completed_maintenance_request as $data) {
    echo '<tr>';
    echo '<td>'.$data['maintenance_request_id'].'</td>';
    echo '<td>'.$data['room_number'].'</td>';
    echo '<td>'.$data['category'].'</td>';
    echo '<td>'.$data['maintenance_urgency'].'</td>';
    echo '<td>'.$data['description'].'</td>';
    echo '<td>'.$data['date'].'</td>';
    echo '<td>'.$data['time'].'</td>';
    echo '<td>'.$data['maintenance_status'].'</td>';
    echo '<td>'.$data['date_completed'].'</td>';
    echo '</tr>';
}
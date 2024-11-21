<?php
require_once '../includes/dbh.inc.php';
require_once '../includes/maintenance_management/maintenance_management_model.php';

$tenant_id = $_POST['tenant_ID'];

$get_user_maintenance_request = get_user_maintenance_request($dbconn, $tenant_id);

if ($get_user_maintenance_request) {
    echo '<table>';
    echo '<thead>
            <tr>
            <th>ID</th>
            <th>Category</th>
            <th>Urgency</th>
            <th>Description</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
             <th>Date Completed</th>
            </tr>
        </thead>';
    echo '<tbody id="maintenance-requests">';
    foreach($get_user_maintenance_request as $data){
        echo '<tr>';
        echo '<td>'.$data["maintenance_request_id"].'</td>';
        echo '<td>'.$data["category"].'</td>';
        echo '<td>'.$data["maintenance_urgency"].'</td>';
        echo '<td>'.$data["description"].'</td>';
        echo '<td>'.$data["date"].'</td>';
        echo '<td>'.$data["time"].'</td>';
        echo '<td>'.$data["maintenance_status"].'</td>';
        echo '<td>'.$data["date_completed"].'</td>';
        echo '</tr>';
    }
    echo '</tbody>
        </table>';
}

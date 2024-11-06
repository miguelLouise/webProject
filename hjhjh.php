<?php
require_once './includes/login/login_view.php';
require_once './includes/tenant_management/tenant_management_model.php';
require_once './includes/tenant_management/tenant_management_view.php';
require_once './includes/dbh.inc.php';
require_once './includes/room_management/room_management_model.php';
// include "./middleware/user_middleware.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css//hjhjh.css">
</head>
<body>

<table>
            <thead>
                <tr>
                    <th>room_id</th>
                    <th>room_type</th>
                    <th>floor_number</th>
                    <th>room_number</th>
                    <th>tenants</th>
                    <th>max_capacity</th>
                </tr>
            </thead>
            <tbody id="tenant-list">
                <?php $showAllRooms = showAllRooms($dbconn);
                foreach($showAllRooms as $roomInfo){
                    echo '<tr>';
                    echo '<td>'.$roomInfo["room_id"].'</td>';
                    echo '<td>'.$roomInfo["room_type"].'</td>';
                    echo '<td>'.$roomInfo["floor_number"].'</td>';
                    echo '<td>'.$roomInfo["room_number"].'</td>';
                    echo '<td>'.$roomInfo["tenants"].'</td>';
                    echo '<td>'.$roomInfo["max_capacity"].'</td>';
                    echo '</tr>';
                }
               show_total_tenants($dbconn);
                ?>
            </tbody>
        </table>
</body>
</html>
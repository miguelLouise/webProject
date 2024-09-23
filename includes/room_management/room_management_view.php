<?php


function showTable(object $pdo)
{
    require_once './includes/room_management/room_management_model.php';
    $result = getRoomMngmtTable($pdo);
    // return $result;

    foreach ($result as $data) {
        echo '<tr>';
        echo '<td>' . $data['roomId'] . '</td>';
        echo '<td>' . $data['roomNumber'] . '</td>';
        echo '<td>' . $data['floorNumber'] . '</td>';
        echo '<td>' . $data['capacity'] . '</td>';
        echo '<td>' . $data['fee'] . '</td>';
        echo '</tr>';
    }
}

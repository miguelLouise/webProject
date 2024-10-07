<?php
$result;

function showTable(object $pdo)
{
    require_once './includes/room_management/room_management_model.php';
    $result = getRoomMngmtTable($pdo);
    return $result;
}

function showRoomTypes(object $pdo)
{
    require_once './includes/room_management/room_management_model.php';
    $result = getRoomTypes($pdo);
    return $result;
}

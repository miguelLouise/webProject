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

function show_tbl_data(object $pdo){
    require_once './includes/room_management/room_management_model.php';
    $result = getTblData($pdo);
    return $result;
}

function query01(object $pdo, $room_type){
    require_once './includes/room_management/room_management_model.php';
    $result = query1($pdo, $room_type);
    return $result;
}

function query02(object $pdo, $room_type, $floor_num){
    require_once './includes/room_management/room_management_model.php';
    $result = query2($pdo, $room_type, $floor_num);
    return $result;
}
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

function showFloors(object $pdo, $room_type){
    require_once './includes/room_management/room_management_model.php';
    $result =  getFloors($pdo, $room_type);
    return $result;
}

function showRooms(object $pdo, $room_type, $floor_num){
    require_once './includes/room_management/room_management_model.php';
    $result =  getRooms($pdo, $room_type, $floor_num);
    return $result;
}

function showRoomDesc(object $pdo, $room_type){
    require_once './includes/room_management/room_management_model.php';
    $result =  getRoomDesc($pdo, $room_type);
    return $result;
}

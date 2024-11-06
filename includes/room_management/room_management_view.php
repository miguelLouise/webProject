<?php

function show_dormlink_rooms(object $pdo)
{
    require_once './includes/room_management/room_management_model.php';
    $result = getDormlinkRooms($pdo);
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

function display_reservation_error(string $var_name)
{
    if (isset($_SESSION[$var_name])) {
        $error_warning = $_SESSION[$var_name];

        echo $error_warning;

        unset($_SESSION[$var_name]);
    }
}

function showRoomAvailability(object $pdo, $room_type, $floor_num, $room_num){
    require_once './includes/room_management/room_management_model.php';
    $result =  getRoomAvailability($pdo, $room_type, $floor_num, $room_num);
    return $result;
}

function reservation_success_message(string $var_name)
{
    if (isset($_SESSION[$var_name])) {
        $reservation_success = $_SESSION[$var_name];

        echo '<div style="background-color: #a0db9d; position: absolute; top: 175px; height: 50px; width: 400px; border: 2px solid #558f52;">' .
            $reservation_success .
            '</div>';

        unset($_SESSION[$var_name]);
    }
}

function show_reservation_table(object $pdo)
{
    require_once './includes/room_management/room_management_model.php';
    $result = getReservationTable($pdo);
    return $result;
}

function show_total_rooms(object $pdo){
    require_once 'room_management_model.php';
    $result = get_total_Rooms($pdo);
    echo $result["total_rooms"];
}
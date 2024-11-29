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
        $message = $_SESSION[$var_name];

        echo $message;

        unset($_SESSION[$var_name]);
    }
}

function showRoomAvailability(object $pdo, $room_type, $floor_num, $room_num){
    require_once './includes/room_management/room_management_model.php';
    $result =  getRoomAvailability($pdo, $room_type, $floor_num, $room_num);
    return $result;
}

function reservation_success_message(string $var_name){
    if (isset($_SESSION[$var_name])) {
        $reservation_success = $_SESSION[$var_name];

        echo '<div style="background-color: #a0db9d; position: absolute; top: 175px; height: 50px; width: 400px; border: 2px solid #558f52;">' .
            $reservation_success .
            '</div>';

        unset($_SESSION[$var_name]);
    }
}

function show_reservation_table(object $pdo){
    require_once './includes/room_management/room_management_model.php';
    $result = getReservationTable($pdo);
    return $result;
}

function show_total_rooms(object $pdo){
    require_once 'room_management_model.php';
    $result = get_total_Rooms($pdo);
    echo $result["total_rooms"];
}

function show_total_beds(object $pdo){
    require_once 'room_management_model.php';
    $result = get_total_Beds($pdo);
    echo $result["total_beds"];
}

function show_total_reservations(object $pdo){
    require_once 'room_management_model.php';
    $result = get_total_reservations($pdo);
    echo $result["total_reservation"];
}

function show_reservation_action($reservation_status){
    if ($reservation_status === "Pending") {
        echo "reservation is still pending";
    } elseif ($reservation_status === "Paid/Reserved"){
        echo "reservation is paid/reserved";
    } elseif ($reservation_status === "Overdue"){
        echo "reservation is overdue";
    }
}

function show_available_rooms(object $pdo){
    require_once 'room_management_model.php';
    $result = get_room_available($pdo);
    echo $result["total"];
}

function show_occupied_rooms(object $pdo){
    require_once 'room_management_model.php';
    $result = get_room_occupied($pdo);
    echo $result["total"];
}

function show_not_available_rooms(object $pdo){
    require_once 'room_management_model.php';
    $result = get_room_not_available($pdo);
    echo $result["total"];
}

function disappearing_error_message(string $var_name){
    if (isset($_SESSION[$var_name])) {
        $reservation_success = $_SESSION[$var_name];

        echo '<div id="message_container" style="background-color: #e14242; position: absolute; height: 100px; width: 500px; top: 40%; left: 50%; transform: translate(-50%, -50%); border-radius: 10px; display: flex; align-items: center; justify-content: center; border: 1px solid #000000; font-size: 18_px">
             ' . $reservation_success .
             '</div>';

        unset($_SESSION[$var_name]);

        echo '<script>
        $(document).ready(function(){
            $("#message_container").show().delay(5000).fadeOut(50);
        });
        </script>';
    }
}

function disappearing_success_message(string $var_name){
    if (isset($_SESSION[$var_name])) {
        $reservation_success = $_SESSION[$var_name];

        echo '<div id="message_container" style="background-color: #ffffff; position: absolute; height: 100px; width: 500px; top: 40%; left: 50%; transform: translate(-50%, -50%); border-radius: 10px; display: flex; align-items: center; justify-content: center; border: 1px solid #000000; font-size: 18_px">
             ' . $reservation_success .
             '</div>';

        unset($_SESSION[$var_name]);

        echo '<script>
        $(document).ready(function(){
            $("#message_container").show().delay(5000).fadeOut(50);
        });
        </script>';
    }
}

function disappearing_room_management_message(string $var_name){
    if (isset($_SESSION[$var_name])) {
        $reservation_success = $_SESSION[$var_name];
        ?>
        <div class="container" id="container">
        <div class="message_container" id="message_container">
            <?php echo $reservation_success; ?>
        </div>
        </div>

        <?php
        unset($_SESSION[$var_name]);
    }
}
?>

<style>
        .container{
            position: absolute;
            height: 100vh;
            width: 100%;
            left: 0;
            z-index: 9;
        }

        .message_container{
            font-family: 'Montserrat', sans-serif;
            font-size: 22px;
            font-weight: 600;
            background-color: rgb(255, 255, 255);
            position: relative;
            height: 25%;
            width: 35%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            border: 2px solid rgb(137, 137, 137);
            font-size: 18px;
            box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
            z-index: 10;
        }

        @media (max-width: 950px) {
            .message_container{
                width: 45%;
            }
        }

        @media (max-width: 690px) {
            .message_container{
                height: 40%;
                width: 60%;
            }
        }

        @media (max-width: 431px) {
            .message_container{
                height: 40%;
                width: 80%;
            }
        }
    </style>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once '../dbh.inc.php';
        require_once 'room_management_model.php';
        require_once 'room_management_view.php';
        require_once '../tenant_management/tenant_management_model.php';
        require_once 'room_management_controller.php';

        $room_type_error = "";
        $floor_number_error = "";
        $room_number_error = "";

        $room_type = $_POST["room_typ"];
        $floor_number = $_POST['flr_num'];
        $room_number = $_POST['room_num'];

        if(empty($room_type)){
            $room_type_error = "Empty Field*";
        }

        if(empty($floor_number)){
            $floor_number_error = "Empty Field*";
        }

        if(empty($room_number)){
            $room_number_error = "Empty Field*";
        }

        session_start();

        if ($room_type_error || $floor_number_error || $room_number_error) {
            $_SESSION["room_type_error"] = $room_type_error;
            $_SESSION["floor_number_error"] = $floor_number_error;
            $_SESSION["room_number_error"] = $room_number_error;

            header("Location: " . $_SERVER['HTTP_REFERER']);
            die();
        } else {
            $check_if_user_is_tenant = check_if_user_is_tenant($dbconn, $_SESSION["user_id"]);
            // if user is already a tenant
            if ($check_if_user_is_tenant) {
                $_SESSION["reservation_error"] = "You are already a tenant";

                header("Location: " . $_SERVER['HTTP_REFERER']);
                die();
            }
            //if user is not a tenant
            else{
                $does_user_have_reservation = does_user_have_reservation($dbconn, $_SESSION["user_id"]);

                if ($does_user_have_reservation) {
                    $_SESSION["user_already_reserved_error"] = "You have an active reservation";

                    header("Location: " . $_SERVER['HTTP_REFERER']);
                    die();
                }else{
                    $isRoomAvailable = isRoomAvailable($dbconn, $room_number);

                    print_r($isRoomAvailable);

                    if ($isRoomAvailable['room_status'] == "Available") {
                        $date = date("Y-m-d");
                        reserveRoom($dbconn, $_SESSION["user_id"], $room_type, $floor_number, $room_number, $date);

                        $_SESSION["reservation_success"] = "Reservation Successful. Proceed to Partial Payment page to secure your reservation.";

                        header("Location: " . $_SERVER['HTTP_REFERER']);
                        die();
                    }
                    else{
                        $_SESSION["room_availability_error"] = "Room not available";

                        header("Location: " . $_SERVER['HTTP_REFERER']);
                        die();
                    }
                }
            }
        }
    } catch (PDOException $e) {
        header('Location: ../../reservation.php');
        die();
    }
}

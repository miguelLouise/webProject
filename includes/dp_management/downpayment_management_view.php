<?php

function does_user_have_a_reservation(object $pdo, $user_id){
    require_once 'downpayment_management_model.php';

    $result =  check_if_user_has_reservation($pdo, $user_id);

    if($result){
        $_SESSION["reservation_name"] = $result["name"];
        $_SESSION["reservation_contact_number"] = $result["contact_number"];
        $_SESSION["room_number"] = $result["room_number"];
    } else {
        $_SESSION["user_does_not_have_a_reservation"] = "You don't have a reservation.";
    }
    return $result;
}
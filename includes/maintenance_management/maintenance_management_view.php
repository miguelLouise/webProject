<?php

function is_user_tenant(object $pdo, $user_id){
    require_once 'maintenance_management_model.php';
    $result =  check_if_user_is_tenant($pdo, $user_id);

    // session_start();

    if($result){
        $_SESSION["name"] = $result["name"];
        $_SESSION["email"] = $result["email"];
        $_SESSION["room_number"] = $result["room_number"];
    } else {
        $_SESSION["user_not_tenant"] = "tenants can only submit maintenance request.";
    }
    return $result;
}

function format_date($date){
    $formatted_date = date('M d, Y', strtotime($date));
    return $formatted_date;
}

function format_time($time){
    $formatted_time = date('g:i A', strtotime($time));
    return $formatted_time;
}
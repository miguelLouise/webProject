<?php

function account_management_message(string $var_name){
    if (isset($_SESSION[$var_name])) {
        $message = $_SESSION[$var_name];

        echo $message;

        unset($_SESSION[$var_name]);
    }
}

function show_user_information_name(object $pdo, string $user_id){
    require_once 'account_management_model.php';
    $get_user_info = get_user_info($pdo, $user_id);
    echo $get_user_info['name'];
}

function show_user_information_email(object $pdo, string $user_id){
    require_once 'account_management_model.php';
    $get_user_info = get_user_info($pdo, $user_id);
    echo $get_user_info['email'];
}

function show_user_information_contact_number(object $pdo, string $user_id){
    require_once 'account_management_model.php';
    $get_user_info = get_user_info($pdo, $user_id);
    echo $get_user_info['contact_number'];
}

function show_user_information_name_upper(object $pdo, string $user_id){
    require_once 'account_management_model.php';
    $get_user_info = get_user_info($pdo, $user_id);
    echo strtoupper($get_user_info['name']);
}

function show_user_information_email_upper(object $pdo, string $user_id){
    require_once 'account_management_model.php';
    $get_user_info = get_user_info($pdo, $user_id);
    echo strtoupper($get_user_info['email']);
}

// function disappearing_error_message(string $var_name){
//     if (isset($_SESSION[$var_name])) {
//         $reservation_success = $_SESSION[$var_name];

//         echo '<div id="message_container" style="background-color: rgba(205, 0, 0, 0.567); position: absolute; height: 100px; width: 500px; top: 40%; left: 50%; transform: translate(-50%, -50%); border-radius: 10px; display: flex; align-items: center; justify-content: center; border: 1px solid rgb(205, 0, 0); font-size: 18_px">
//              ' . $reservation_success .
//              '</div>';

//         unset($_SESSION[$var_name]);

//         echo '<script>

//             $("#message_container").show().delay(1000).fadeOut(50);

//         </script>';
//     }
// }

// function disappearing_success_message(string $var_name){
//     if (isset($_SESSION[$var_name])) {
//         $reservation_success = $_SESSION[$var_name];

//         echo '<div id="message_container" style="background-color: rgb(102, 203, 75); position: absolute; height: 100px; width: 500px; top: 40%; left: 50%; transform: translate(-50%, -50%); border-radius: 10px; display: flex; align-items: center; justify-content: center; border: 1px solid rgb(78, 151, 57); font-size: 18_px">
//              ' . $reservation_success .
//              '</div>';

//         unset($_SESSION[$var_name]);

//         echo '<script>

//             $("#message_container").show().delay(1000).fadeOut(50);

//         </script>';
//     }
// }
// $(document).ready(function(){});
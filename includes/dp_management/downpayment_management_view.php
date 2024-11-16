<?php

function does_user_have_a_reservation(object $pdo, $user_id){
    require_once 'downpayment_management_model.php';

    $result =  check_if_user_has_reservation($pdo, $user_id);

    if($result){
        $_SESSION["reservation_name"] = $result["name"];
        $_SESSION["reservation_contact_number"] = $result["contact_number"];
        $_SESSION["reservation_id"] = $result["reservation_id"];
    } else {
       echo ' <div class="display_msg_container"
               style="
               background-color: rgba(0, 0, 0, 0.3);
               position: absolute;
               height: 100%;
               width: 100%;
               top: 0;
               left: 0;
               display: flex;
               justify-content: center;
               align-items: center;
               color: red;">';
       echo "<p>You don't have a reservation</p>";
       echo '</div>';
    }
    return $result;
}

function display_session_variable(string $var_name){
    if (isset($_SESSION[$var_name])) {
        $session_message = $_SESSION[$var_name];

        echo $session_message;

        unset($_SESSION[$var_name]);
    }
}

function disappearing_message(string $var_name){
    if (isset($_SESSION[$var_name])) {
        $session_message = $_SESSION[$var_name];

        echo '<div id="message_container" style="  background-color: cadetblue;
                position: absolute;
                height: 75px;
                width: 500px;
                top: 40%;
                left: 50%;
                transform: translate(-50%, -50%);
                border-radius: 10px;
                display: flex;
                align-items: center;
                justify-content: center;">'. $session_message.'</div>';

        unset($_SESSION[$var_name]);

        echo '<script>
            $(document).ready(function(){
                $("#message_container").show().delay(3000).fadeOut(70);
            });
            </script>';
    }
}
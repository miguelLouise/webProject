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

        echo '<div id="message_container" style="
                background-color: rgb(173, 173, 173);
                position: absolute;
                height: 75px;
                width: 500px;
                top: 40%;
                left: 50%;
                transform: translate(-50%, -50%);
                border-radius: 10px;
                border: 1px solid black;
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

function disappearing_downpayment_management_message(string $var_name){
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

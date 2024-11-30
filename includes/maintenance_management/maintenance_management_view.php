<?php

function is_user_tenant(object $pdo, $user_id){
    require_once 'maintenance_management_model.php';
    $result =  check_if_user_is_tenant1($pdo, $user_id);

    if($result){
        $_SESSION["name"] = $result["name"];
        $_SESSION["email"] = $result["email"];
        $_SESSION["room_number"] = $result["room_number"];
    } else {
        echo '<div class="display_msg_container" style=" background-color: #4b4b4b6e; height: 100%; width: 100%; position: absolute; top: 70px; left: 0;">
                <div id="message_container" style="background-color: white; position: absolute; height: 100px;  width: 500px; top: 40%; left: 50%; transform: translate(-50%, -50%); border-radius: 10px; display: flex; align-items: center; justify-content: center; z-index: 0;">
                '. $_SESSION["user_not_tenant"] = "tenants can only submit maintenance request".'
                </div>
              </div>';
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

function show_active_maintenance_request(object $pdo){
    require_once 'maintenance_management_model.php';
    $result = get_active_maintenance_request($pdo);
    echo $result["total"];
}

function disappearing_maintenance_management_message(string $var_name){
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

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

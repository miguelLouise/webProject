<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    try {
        require_once '../dbh.inc.php';
        require_once '../room_management/room_management_model.php';
        require_once 'tenant_management_model.php';
        require_once 'tenant_management_view.php';
        require_once 'tenant_management_controller.php';
        require_once '../signup_process_controller.php';

        $name_error = "";
        $email_error = "";
        $birthday_error = "";
        $room_typ_error = "";
        $flr_num_error = "";
        $room_num_error = "";
        $contact_num_error = "";
        $contract_date_error = "";


        $name = $_POST["name"];
        $email = $_POST["email"];
        $birthday = $_POST["birthday"];
        $room_typ = $_POST["room_typ"];
        $flr_num = $_POST["flr_num"];
        $room_number = $_POST["room_num"];
        $contact_number = $_POST["contact_num"];
        $contract_date = $_POST["start_of_contract"];

        if(empty($name)){
            $name_error = "Empty Field*";
        }
        if(is_empty($email)){
            $email_error = "Empty Field*";
        }elseif (is_email_valid($email)) {
            $email_error = "Invalid Email";
        }

        if(empty($birthday)){
            $birthday_error = "Empty Field*";
        }
        if (check_age($birthday)) {
            $birthday_error  = "tenant must me 18 years old*";
        }
        if(empty($room_typ)){
            $room_typ_error = "Empty Field*";
        }
        if(empty($flr_num)){
            $flr_num_error = "Empty Field*";
        }
        if(empty($room_number)){
            $room_num_error = "Empty Field*";
        }
        if(empty($contact_number)){
            $contact_num_error = "Empty Field*";
        }
        if(empty($contract_date)){
            $contract_date_error = "Empty Field*";
        }

        session_start();

        if($name_error || $email_error || $birthday_error || $room_typ_error || $flr_num_error || $room_num_error || $contact_num_error || $contract_date_error){
            $_SESSION["name_error"] = $name_error;
            $_SESSION["email_error"] = $email_error;
            $_SESSION["birthday_error"] = $birthday_error;
            $_SESSION["room_typ_error"] = $room_typ_error;
            $_SESSION["flr_num_error"] = $flr_num_error;
            $_SESSION["room_num_error"] = $room_num_error;
            $_SESSION["contact_num_error"] = $contact_num_error;
            $_SESSION["contract_date_error"] = $contract_date_error;

            header("Location: " . $_SERVER['HTTP_REFERER']);
            die();
        }
        else {
            if (isset($_SESSION['reservation_user_id']) && !empty($_SESSION['reservation_user_id'])) {

                $reservation_user_id = $_SESSION['reservation_user_id'];
                unset_session_variable("reservation_user_id");

                $get_user = get_user($dbconn, $reservation_user_id);
                $isRoomAvailable = isRoomAvailable($dbconn, $room_number);

                if ($isRoomAvailable["tenants"] < $isRoomAvailable["max_capacity"]) {
                    $check_if_user_is_tenant = check_if_user_is_tenant($dbconn, $reservation_user_id);

                    if (!$check_if_user_is_tenant) {
                        $room_tenants = $isRoomAvailable['tenants'];
                        $room_tenants++;
                        $date_today = date("Y-m-d");

                        add_user_tenant($dbconn, $reservation_user_id, $name, $contact_number, $email, $birthday, $isRoomAvailable["room_id"], $contract_date,  $date_today);
                        $update_room_status = update_room_status($room_tenants, $isRoomAvailable["max_capacity"]);
                        change_room_status($dbconn, $update_room_status, $isRoomAvailable["room_id"]);
                        update_room_tenant($dbconn, $room_tenants, $room_number);
                        deleteReservation($dbconn, $reservation_user_id, $date_today);


                        $_SESSION["tenant_added"] = "new tenant added";

                        header("Location: " . $_SERVER['HTTP_REFERER']);
                        die();
                    } else {
                        $_SESSION["user_is_tenant"] = "user is already a tenant";

                        header("Location: " . $_SERVER['HTTP_REFERER']);
                        die();
                    }
                } else {
                    $_SESSION["room_is_full"] = "room is full";

                    header("Location: " . $_SERVER['HTTP_REFERER']);
                    die();
                }
            } else {
                $isRoomAvailable = isRoomAvailable($dbconn, $room_number);

                if ($isRoomAvailable["tenants"] < $isRoomAvailable["max_capacity"]) {
                    $room_tenants = $isRoomAvailable['tenants'];
                    $room_tenants++;
                    $date_today = date("Y-m-d");

                    add_walkin_tenant($dbconn, $name, $contact_number, $email, $birthday, $isRoomAvailable["room_id"], $contract_date, $date_today);
                    $update_room_status = update_room_status($room_tenants, $isRoomAvailable["max_capacity"]);
                    change_room_status($dbconn, $update_room_status, $isRoomAvailable["room_id"]);
                    update_room_tenant($dbconn, $room_tenants, $room_number);

                    $_SESSION["tenant_added"] = "new tenant added";

                    header("Location: " . $_SERVER['HTTP_REFERER']);
                    die();
                } else {
                    $_SESSION["room_is_full"] = "room is full";

                    header("Location: " . $_SERVER['HTTP_REFERER']);
                    die();
                }
            }
        }
    } catch (PDOException $e) {
        die("Query failed" . $e->getMessage());
    }
} else {
    header("Location: ../../tenant_management_page_admin.php");
    die();
}
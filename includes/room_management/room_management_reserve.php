<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once '../dbh.inc.php';
        require_once 'room_management_model.php';
        require_once 'room_management_view.php';
        require_once '../tenant_management/tenant_management_model.php';
        require_once 'room_management_controller.php';
        require '../../vendor/autoload.php';

        $room_type_error = "";
        $floor_number_error = "";
        $room_number_error = "";

        $room_type = $_POST["action"];
        $floor_number = $_POST['room_type_'.$room_type.'_flr_num'];
        $room_number = $_POST['room_type_'.$room_type.'_room_num'];
        $number_of_tenants = $_POST['room_type_'.$room_type.'_tenants'];

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

            // header("Location: " . $_SERVER['HTTP_REFERER'] . "_empty_floor_number_room_number");
            header('Location: ../../reservation.php?empty_input_fields');
            die();
        } else {
            $check_if_user_is_tenant = check_if_user_is_tenant($dbconn, $_SESSION["user_id"]);

            if ($check_if_user_is_tenant) { // if user is already a tenant
                $_SESSION["reservation_error"] = "You are already a tenant";

                header("Location: " . $_SERVER['HTTP_REFERER']);
                die();
            } else {  //if user is not a tenant
                $does_user_have_reservation = does_user_have_reservation($dbconn, $_SESSION["user_id"]);

                if ($does_user_have_reservation) {
                    $_SESSION["user_already_reserved_error"] = "You have an active reservation";

                    header("Location: " . $_SERVER['HTTP_REFERER']);
                    die();
                }else{
                    date_default_timezone_set('Asia/Manila');
                    $current_date = date("Y-m-d");
                    $current_time = date("H:i:s");
                    $isRoomAvailable = isRoomAvailable($dbconn, $room_number);
                    $available_beds = $isRoomAvailable['max_capacity'] -  $isRoomAvailable['tenants'];

                    print_r($isRoomAvailable);

                    if (strcasecmp($isRoomAvailable['room_status'], "available") == 0) {
                        if ($number_of_tenants <= $available_beds) {
                            reserveRoom($dbconn, $_SESSION["user_id"], $room_type, $floor_number, $room_number, $number_of_tenants, $current_date, $current_time);

                            $mail = new PHPMailer(true);

                            $mail->isSMTP();

                            $mail->Host ="smtp.gmail.com";
                            $mail->SMTPAuth = true;
                            $mail->Username = "dormlink.apartments11@gmail.com";
                            $mail->Password = "lxkchshounmuphdt";
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                            $mail->Port = 465;

                            $mail->setFrom("dormlink.apartments11@gmail.com");
                            $mail->addAddress($_SESSION["user_email"]);

                            $mail->isHTML(true);
                            $mail->Subject = "Dormlink Reservation";
                            $mail->Body ='
                            <p><h3>Reservation Details<h3></p>
                            <p><span style="font-weight:bold">Room Type: </span>'.$room_type.'</p>
                            <p><span style="font-weight:bold">Floor Number: </span>'.$floor_number.'</p>
                            <p><span style="font-weight:bold">Room Number: </span>'.$room_number.'</p>
                            <p><span style="font-weight:bold">Number of Tenants: </span>'.$number_of_tenants.'</p>
                            <p><span style="font-weight:bold">Date and Time of Reservation: </span>'.$current_date.'/'.$current_time.'</p>
                            <br>
                            <p>Secure your room reservation by paying the reservation downpayment.</p>';
                            $mail->send();

                            $_SESSION["reservation_success"] = "Reservation Successful. Proceed to Partial Payment page to secure your reservation.";

                            header("Location: " . $_SERVER['HTTP_REFERER']);
                            die();
                        } else {
                            $_SESSION["exceed_number_of_tenants"] = "number of tenants exceeds the room max capacity";

                            header('Location: ../../reservation.php?sfs');
                            die();
                        }

                    } elseif (strcasecmp($isRoomAvailable['room_status'], "occupied") == 0) {
                        echo "<br>";
                        echo "room is occupied";
                        echo "<br>";
                        echo $room_type;
                        echo "<br>";
                        echo $floor_number;
                        echo "<br>";
                        echo $room_number;
                        echo "<br>";
                        echo $number_of_tenants;
                    } else {
                        $_SESSION["room_availability_error"] = "Room not available";


                        header('Location: ../../reservation.php?qwqw');
                        die();
                    }
                }
            }
        }
    } catch (PDOException $e) {
        // echo $e;
        header('Location: ../../reservation.php?bvbvbv');
        die();
    }
}

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once '../dbh.inc.php';
        require_once 'maintenance_management_model.php';
        require_once 'maintenance_management_view.php';
        require '../../vendor/autoload.php';

        $date_error = "";
        $time_error = "";

        $maintenance_request_id = $_POST["action"];
        $maintenance_date = $_POST["maintenance_id=".$maintenance_request_id."_date"];
        $maintenance_time = $_POST["maintenance_id=".$maintenance_request_id."_time"];
        $message = $_POST["maintenance_id=".$maintenance_request_id."_message"];

        $get_user_maintenance_request_by_maintenance_id = get_user_maintenance_request_by_maintenance_id($dbconn, $maintenance_request_id);

        date_default_timezone_set('Asia/Manila');

        $date = date("Y-m-d");
        $time = date("H:i:s");
        // if(empty($maintenance_date)){
        //     $date_error = "Empty Field*";
        // }
        if(empty($maintenance_time)){
            $time_error = "Set time of maintenance*";
        }

        session_start();

        if ($maintenance_date < $date) {
            echo "Date should be today or later only";
            $_SESSION["date_error"] = "Date should be today or Later only";

            header('Location: ../../maintenance_request_management.php?error');
            die();
        } else {
            if ($time_error) {
                echo $time_error;
                $_SESSION["time_error"] = $time_error;

                header('Location: ../../maintenance_request_management.php?error');
                die();
            } else {
                    $mail = new PHPMailer(true);

                    $mail->isSMTP();

                    $mail->Host ="smtp.gmail.com";
                    $mail->SMTPAuth = true;
                    $mail->Username = "dormlink.apartments11@gmail.com";
                    $mail->Password = "lxkchshounmuphdt";
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port = 465;

                    $mail->setFrom("dormlink.apartments11@gmail.com");
                    $mail->addAddress($get_user_maintenance_request_by_maintenance_id["email"]);

                    $mail->isHTML(true);
                    $mail->Subject = "Maintenance Schedule";
                    $mail->Body ='
                    <p>Your Maintenance Request has been scheduled</p>
                    <p><span style="font-weight:bold">Request ID: </span>'.$get_user_maintenance_request_by_maintenance_id["maintenance_request_id"].'</p>
                    <p><span style="font-weight:bold">Maintenance Category: </span>'.$get_user_maintenance_request_by_maintenance_id["category"].'</p>
                    <p><span style="font-weight:bold">Urgency: </span>'.$get_user_maintenance_request_by_maintenance_id["maintenance_urgency"].'</p>
                    <p><span style="font-weight:bold">Description: </span>'.$get_user_maintenance_request_by_maintenance_id["description"].'</p>
                    <p><span style="font-weight:bold">Date and Time of Submission: </span>'.$get_user_maintenance_request_by_maintenance_id["date"].'/'.format_time($get_user_maintenance_request_by_maintenance_id["time"]).'</p>
                    <br>
                    <p><span style="font-weight:bold">Date and Time of Maintenance: </span>'.$maintenance_date.'/'.format_time($maintenance_time).'</p>
                    <p><span style="font-weight:bold">Message/Reminder: </span>'.$message.'</p>';
                    $mail->send();

                    // echo "maintenance scheduled successfully";
                    $_SESSION["maintenance_schedule_set"] = "Maintenance scheduled successfully";

                header('Location: ../../maintenance_request_management.php?error');
                die();
            }
        }

        // if ($time_error) {
        //     // $_SESSION["date_error"] = $date_error;
        //     $_SESSION["time_error"] = $time_error;

        //     header('Location: ../../maintenance_request_management.php?error');
        //     die();
        // } else {
        //     print_r($get_user_maintenance_request_by_maintenance_id);
        //     echo "<br>";
        //     echo $maintenance_request_id;
        //     echo "<br>";
        //     echo $maintenance_date;
        //     echo "<br>";
        //     echo $maintenance_time;
        //     echo "<br>";
        //     echo $message;
        //     echo "<br>";
        //     echo $date;
        //     echo "<br>";
        //     echo $time;
        // }



    } catch (PDOException $e) {
        die("Query failed" . $e->getMessage());
      }
} else {
    header("Location: ../../maintenance_request_management.php");
    die();
}
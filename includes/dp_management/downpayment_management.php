<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once '../dbh.inc.php';
        require_once 'downpayment_management_model.php';

        $reference_number_error = "";
        $file_name_error = "";

        $reference_number = $_POST["reference"];
        $file_name = $_FILES["screenshot"]["name"];
        $reservation_Id = $_POST["reservation_Id"];

        $img_ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $allowed_img_ext = array("jpg", "jpeg", "png");

        $temporary_img_name =  $_FILES["screenshot"]["tmp_name"];
        $folder_path = "../../uploads/".$file_name;

        if(empty($reference_number)){
            $reference_number_error = "Empty Field*";
        }
        if(empty($file_name)){
            $file_name_error = "Empty Field*";
        }

        session_start();

        if ($reference_number_error || $file_name_error) {
            $_SESSION["reference_number_error"] = $reference_number_error;
            $_SESSION["file_name_error"] = $file_name_error;

            header("Location: " . $_SERVER['HTTP_REFERER']);
            die();
        } else {
            date_default_timezone_set('Asia/Manila');

            $date_and_time = date("Y-m-d H:i:s");

            if (in_array($img_ext, $allowed_img_ext)) {
                if (move_uploaded_file($temporary_img_name, $folder_path)) {
                    upload_payment_image($dbconn, $reservation_Id, $_SESSION["user_id"], $reference_number, $file_name, $date_and_time);

                    $_SESSION["payment_submitted_successfully"] = "payment submitted successfully";

                    header("Location: " . $_SERVER['HTTP_REFERER']);
                    die();
                } else {
                    header("Location: " . $_SERVER['HTTP_REFERER'] . "#upload_error");
                    die();
                }
            } else {
                header("Location: " . $_SERVER['HTTP_REFERER']."#file_extension_invalid");
                die();
            }

            // echo "payment reference number: ",$reference_number;
            // echo "<br>";
            // echo "image file name: ",$file_name;
            // echo "<br>";
            // echo "reservation id: ",$reservation_Id;
            // echo "<br>";
            // echo  "user id: ",$_SESSION["user_id"];
            // echo "<br>";
            // echo "date and time: ", $date_and_time;
            // echo "<br>";
            // echo "date and time: ", $currentDate;
        }
    } catch (PDOException $e) {
        die("Query failed" . $e->getMessage());
    }
} else {
    header("Location: " . $_SERVER['HTTP_REFERER'] . "#method_error");
    die();
}
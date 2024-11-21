<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once '../dbh.inc.php';
        require_once 'maintenance_management_model.php';
        require_once '../tenant_management/tenant_management_model.php';
        require_once 'maintenance_management_view.php';

        session_start();

        $name_error = "";
        $email_error = "";
        $unit_number_error = "";
        $urgency_error = "";
        $urgency_error = "";
        $category_error = "";
        $description_error = "";

        $user_id = $_SESSION["user_id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $unit_number = $_POST["room_number"];
        $category = $_POST["category"];
        $urgency = $_POST["urgency"];
        $description = $_POST["description"];

        if(empty($name)){
            $name_error = "Empty Field*";
        }
        if(empty($email)){
            $email_error = "Empty Field*";
        }
        if(empty($unit_number)){
            $unit_number_error = "Empty Field*";
        }
        if(empty($category)){
            $category_error = "Empty Field*";
        }
        if(empty($urgency)){
            $urgency_error = "Empty Field*";
        }
        if(empty($description)){
            $description_error = "Empty Field*";
        }

        $check_if_user_is_tenant = check_if_user_is_tenant($dbconn, $_SESSION["user_id"]);

        if ($check_if_user_is_tenant) {
            if ($name_error || $email_error || $unit_number_error || $category_error || $urgency_error || $description_error) {
                $_SESSION["name_error"] = $name_error;
                $_SESSION["email_error"] = $email_error;
                $_SESSION["unit_number_error"] = $unit_number_error;
                $_SESSION["category_error"] = $category_error;
                $_SESSION["urgency_error"] = $urgency_error;
                $_SESSION["description_error"] = $description_error;

                header('Location: ../../maintenance_request_page.php');
                die();
            } else {
                date_default_timezone_set('Asia/Manila');

                // $currentDate = date("F d, Y h:i A");
                $date = date("Y-m-d");
                $time = date("H:i");
                // $date_time_obj = new DateTime($date_and_time);

                submit_maintenance_request($dbconn, $check_if_user_is_tenant["tenant_id"], $user_id, $name, $email, $check_if_user_is_tenant["room_id"], $category, $urgency, $description, $date, $time);

                $_SESSION["maintenance_request_submitted"] = "Maintenance Request Submitted Successfully.";

                header('Location: ../../maintenance_request_page.php');
                die();
            }
        } else {
            header("Location: ../../maintenance_request_page.php");
            die();
        }

    } catch (PDOException $e) {
        die("Query failed" . $e->getMessage());
      }
} else {
    header("Location: ../../maintenance_request_page.php");
    die();
}
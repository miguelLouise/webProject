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
        $maintenance_issue_img_error = "";

        $user_id = $_SESSION["user_id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $unit_number = $_POST["room_number"];
        $category = $_POST["category"];
        $urgency = $_POST["urgency"];
        $description = $_POST["description"];

        $maintenance_issue_img = $_FILES["maintenance_issue_img"]["name"];
        $maintenance_issue_img_size = $_FILES["maintenance_issue_img"]["size"];
        $max_file_size = 5 * 1024 * 1024;

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
        if(empty($maintenance_issue_img)){
            $maintenance_issue_img_error = "Empty Field*";
        }

        $img_ext = pathinfo($maintenance_issue_img, PATHINFO_EXTENSION);
        $allowed_img_ext = array("jpg", "jpeg", "png");

        $temporary_img_name =  $_FILES["maintenance_issue_img"]["tmp_name"];
        $folder_path = "../../uploads/maintenance_requests/".$maintenance_issue_img;

        $check_if_user_is_tenant = check_if_user_is_tenant($dbconn, $user_id);

        if ($check_if_user_is_tenant) {
            if ($name_error || $email_error || $unit_number_error || $category_error || $urgency_error || $description_error || $maintenance_issue_img_error) {
                $_SESSION["name_error"] = $name_error;
                $_SESSION["email_error"] = $email_error;
                $_SESSION["unit_number_error"] = $unit_number_error;
                $_SESSION["category_error"] = $category_error;
                $_SESSION["urgency_error"] = $urgency_error;
                $_SESSION["description_error"] = $description_error;
                $_SESSION["maintenance_issue_img_error"] = $maintenance_issue_img_error;

                header('Location: ../../maintenance_request_page.php?main_req_error');
                die();
            } else {
                if ($maintenance_issue_img_size > $max_file_size) {
                    $_SESSION["file_size_too_large"] = "File size too large (Image size should not exceed 5MB)";

                    header("Location: " . $_SERVER['HTTP_REFERER']."#file_size_too_large");
                    die();
                } else {
                    if (in_array($img_ext, $allowed_img_ext)) {
                        if (move_uploaded_file($temporary_img_name, $folder_path)) {
                            date_default_timezone_set('Asia/Manila');

                            $date = date("Y-m-d");
                            $time = date("H:i:s");

                            submit_maintenance_request($dbconn, $check_if_user_is_tenant['tenant_id'], $user_id, $name, $email, $check_if_user_is_tenant['room_id'], $category, $urgency, $description, $date, $time, $maintenance_issue_img);

                            $_SESSION["maintenance_request_submitted"] = "Maintenance Request Submitted Successfully.";

                            header("Location: " . $_SERVER['HTTP_REFERER']);
                            die();
                        } else {
                            header("Location: " . $_SERVER['HTTP_REFERER'] . "#upload_error");
                            die();
                        }
                    } else {
                        $_SESSION["file_invalid"] = "Uploaded file invalid";

                        header("Location: " . $_SERVER['HTTP_REFERER']."#file_extension_invalid");
                        die();
                    }
                }
            }
        } else {
            header("Location: ../../maintenance_request_page.php#maintenance_request_error");
            die();
        }
    } catch (PDOException $e) {
        die("Query failed" . $e->getMessage());
      }
} else {
    header("Location: ../../maintenance_request_page.php");
    die();
}
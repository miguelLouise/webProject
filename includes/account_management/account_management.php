<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once '../dbh.inc.php';
        require_once 'account_management_model.php';
        require_once 'account_management_controller.php';

        $email_error = "";
        $contact_number_error = "";
        $current_user_password_error = "";
        $new_user_password_error = "";

        $user_id = $_POST["user_id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $contact_number = $_POST["contact_number"];
        $current_user_password = $_POST["current_user_password"];
        $new_user_password = $_POST["new_user_password"];

        $get_user_info = get_user_info($dbconn, $user_id);

        // Password@00
        // Password@001
        $is_password_matched = is_password_matched($current_user_password, $get_user_info["password"]);
        $check_email = check_if_matched($email, $get_user_info["email"]);
        $check_number = check_if_matched($contact_number, $get_user_info["contact_number"]);


        if (!$check_email) {
            $is_email_valid = is_email_valid($email);

           if ($is_email_valid) {
            $email_error = "email is not valid";
           }
        }

        if (!$check_number) {
            $check_number_format = check_number_format($contact_number);

            if (!$check_number_format) {
                $contact_number_error =  "number format is invalid";

            }
        }

        if ($current_user_password === "" && $new_user_password !== ""){
            $current_user_password_error =  "current password field empty";
        } else if ($current_user_password !== "" && $new_user_password === ""){
            $new_user_password_error =  "new password field empty";
        } else if ($current_user_password !== "" && $new_user_password !== ""){
            if ($is_password_matched) {
                $check_password_format = check_password_format($new_user_password);

                if ($check_password_format) {
                    $new_user_password_error = "Password must be atleast 8 characters with 1 uppercase, 1 lowercase, 1 digit and 1 special character except for the following (# ^ ( ) - _ + = | \ [ ] { } : , / . < > ? ~ ` ;)";
                }
            } else {
                    $current_user_password_error = "Current password does not match";
            }
        }

        session_start();

        if ($email_error || $contact_number_error) {
            $_SESSION["email_error"] = $email_error;
            $_SESSION["contact_number_error"] = $contact_number_error;
            $_SESSION["current_user_password_error"] = $current_user_password_error;
            $_SESSION["new_user_password_error"] = $new_user_password_error;

            header("Location: " . $_SERVER['HTTP_REFERER'] . "#errorboss");
            die();
        } else {

            if (!$email_error || !$contact_number_error) {
                update_user_info($dbconn, $user_id, $contact_number, $email);

                if (!$current_user_password_error && !$new_user_password_error) {

                    if ($current_user_password === "" || $new_user_password === "") {
                        header("Location: " . $_SERVER['HTTP_REFERER'] . "#passwordinputsarenull");
                        die();
                    } else {
                        update_user_password($dbconn, $user_id, $new_user_password);

                        $_SESSION["account_updated"] = "Account Updated";
                        header("Location: " . $_SERVER['HTTP_REFERER'] . "#account_updated");
                        die();
                    }
                } else if ($current_user_password_error || $new_user_password_error){
                    $_SESSION["current_user_password_error"] = $current_user_password_error;
                    $_SESSION["new_user_password_error"] = $new_user_password_error;

                    header("Location: " . $_SERVER['HTTP_REFERER'] . "#errorsapasswordboss");
                    die();
                }


            }



            // $_SESSION["account_updated"] = "Account Updated";
            // header("Location: " . $_SERVER['HTTP_REFERER'] . "#account_updated");
            // die();
        }




    } catch (PDOException $e) {
        header("Location: " . $_SERVER['HTTP_REFERER'] . "#error");
        die();
    }
} else {
    header("Location: " . $_SERVER['HTTP_REFERER'] . "#error");
    die();
}

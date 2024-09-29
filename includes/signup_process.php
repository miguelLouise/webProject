<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once 'dbh.inc.php';
        require_once 'signup_process_model.php';
        require_once 'signup_process_controller.php';

        $name_error = "";
        $contact_number_error = "";
        $email_error = "";
        $birthday_error = "";
        $password_error = "";
        $password_confirmation_error = "";

        $role = 0;
        $name = $_POST['name'];
        $contact_number = $_POST["contact_number"];
        $email = $_POST["email"];
        $birthday = $_POST["birthday"];
        $password = $_POST["password"];
        $password_confirmation = $_POST["password_confirmation"];

        if (is_empty($name)) {
            $name_error = "Required*";
        }

        if (empty($contact_number)) {
            $contact_number_error = "Required*";
        } else {
            if (check_number_format($contact_number)) {
                $contact_number_error = "Invalid Contact Number Format*";
            }
        }

        if (is_empty($email)) {
            $email_error = "Required*";
            echo $email_error;
        } else {
            if (check_email($dbconn, $email)) {
                $email_error = "email is already registered*";
                echo $email_error;
            }
            if (is_email_valid($email)) {
                $email_error = "Invalid Email";
                echo $email_error;
            }
        }

        if (empty($birthday)) {
            $birthday_error = "Required*";
        }
        if (check_age($birthday)) {
            $birthday_error  = "you must me 18 years old*";
        }

        if (is_empty($password)) {
            $password_error = "Required*";
        } else {
            if (check_password_format($password)) {
                $password_error = "Password must be atleast 8 characters with 1 uppercase, 1 lowercase, 1 digit and 1 special character except for the following (#^()-_+=|\[]{}:,/.<>?~`;)";
            }
        }

        if (is_empty($password_confirmation)) {
            $password_confirmation_error = "Required*";
        } else {
            if (match_password($password, $password_confirmation)) {
                $password_confirmation_error = "Password does not match";
            }
        }

        session_start();
        // require_once './config.php';

        if ($name_error || $contact_number_error || $email_error || $birthday_error || $password_error || $password_confirmation_error) {
            $_SESSION["name_error"] = $name_error;
            $_SESSION["contact_number_error"] = $contact_number_error;
            $_SESSION["email_error"] = $email_error;
            $_SESSION["birthday_error"] = $birthday_error;
            $_SESSION["password_error"] = $password_error;
            $_SESSION["password_confirmation_error"] = $password_confirmation_error;
            header('Location: ../signup_page.php');
            die();
        } else {
            signup_user($dbconn, $name, $contact_number, $email, $birthday, $password);
            $_SESSION["signup_success"] = "Account created successfully";
            header('Location: ../signup_page.php');
            die();
        }
    } catch (PDOException $e) {
        die("Query failed" . $e->getMessage());
    }
} else {
    header("Location: ../signup.php");
    die();
}

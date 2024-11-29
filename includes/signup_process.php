<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once 'dbh.inc.php';
        require_once 'signup_process_model.php';
        require_once 'signup_process_controller.php';
        require '../vendor/autoload.php';

        $name_error = "";
        $contact_number_error = "";
        $email_error = "";
        $birthday_error = "";
        $password_error = "";
        $password_confirmation_error = "";

        $role = 0;
        $name = ucwords($_POST['name']);
        $contact_number = $_POST["contact_number"];
        $email = $_POST["email"];
        $birthday = $_POST["birthday"];
        $password = $_POST["password"];
        $password_confirmation = $_POST["password_confirmation"];

        $activation_token = bin2hex(random_bytes(16));
        $activation_token_hash = hash("sha256", $activation_token);

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
        } else {
            if (check_email($dbconn, $email)) {
                $email_error = "Email is already registered to another user*";
            }
            if (is_email_valid($email)) {
                $email_error = "Invalid Email";
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
            signup_user($dbconn, $name, $contact_number, $email, $birthday, $password, $activation_token_hash);

            $mail = new PHPMailer(true);

            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();

            $mail->Host ="smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "dormlink.apartments11@gmail.com";
            $mail->Password = "lxkchshounmuphdt";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port = 465;

            $mail->setFrom("dormlink.apartments11@gmail.com");
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = "Account Activation";
            $mail->Body ='Click <a href="http://webproject.test/includes/verify_account.php?token='.$activation_token_hash.'">here</a> to activate your dormlink account';

            try {
                $mail->send();

                $_SESSION["signup_success"] = "Check your email to activate your dormlink account.";
                header('Location: ../signup_page.php');
                die();
            } catch (Exception $e) {
                die("Error info: " . $mail->ErrorInfo);
            }
        }
    } catch (PDOException $e) {
        die("Query failed" . $e->getMessage());
    }
} else {
    header("Location: ../signup.php");
    die();
}

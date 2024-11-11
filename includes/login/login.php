<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once '../dbh.inc.php';
        require_once 'login_model.php';
        require_once 'login_controller.php';

        $username_error = "";
        $password_error = "";

        $username = trim($_POST["username"]);
        $password = $_POST["user_password"];

        $user_info = get_user_info($dbconn, $username);

        if (is_empty($username)) {
            $username_error = "Required*";
        } else {
            if (username_exist($user_info)) {
                $username_error = "Email is not found*";
            }
        }
        if (is_empty($password)) {
            $password_error = "Required*";
        } else {
            if (!is_empty($user_info)) {
                if (check_password($password, $user_info["password"])) {
                    $password_error = "incorrect password*";
                }
            }
        }

        //louisemiguel1999@gmail.com (Password@00)
        //capua@email.com (Capua@000)
        //locymon@gmail.com (Password@11)

        //admin@gmail.com (adminPassword@01)

        session_start();

        if ($username_error || $password_error) {
            $_SESSION["username_error"] = $username_error;
            $_SESSION["username"] = $username;
            $_SESSION["password_error"] = $password_error;
            header('Location: ../../login_page.php');
            die();
        } else {
            $_SESSION["user_logged_in"] = true;
            $_SESSION["user_id"] = $user_info["user_id"];
            $_SESSION["user_role"] = $user_info["role"];
            $_SESSION["user_name"] = $user_info["name"];
            $_SESSION["user_num"] = $user_info["contact_number"];
            $_SESSION["user_email"] = $user_info["email"];
            $_SESSION["user_bday"] = $user_info["birthday"];

            if ($_SESSION["user_role"] == 0) {
                header("Location: ../../user_homepage.php?login=success");
            }
            else {
                header("Location: ../../admin_dashboard.php?login=success");
            }

            $pdo = null;
            $statement = null;

            die();
        }
    } catch (PDOException $e) {
        die("Query failed" . $e->getMessage());
    }
} else {
    header("Location: ../../login_page.php");
    die();
}

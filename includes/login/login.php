<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once '../dbh.inc.php';
        require_once 'login_model.php';
        require_once 'login_controller.php';

        $username_error = "";
        $password_error = "";
        $account_error = null;

        $username = trim($_POST["username"]);
        $password = $_POST["user_password"];

        $user_info = get_user_info($dbconn, $username);

        if (is_empty($username)) {
            echo $username_error = "Required*";

            // if(!username_exist($user_info) && $user_info["account_activation_hash"] !== NULL){
            //     echo $account_error = "Account has not been activated yet*";
            // }
        } elseif(username_exist($user_info)){
            echo $username_error = "Email is not found*";
        }  elseif(!username_exist($user_info) && $user_info["account_activation_hash"] !== NULL){
            echo $account_error = "Account has not been activated yet*";
        }

        if (is_empty($password)) {
            echo $password_error = "Required*";
        } else {
            if (!is_empty($user_info)) {
                if (check_password($password, $user_info["password"])) {
                    echo $password_error = "incorrect password*";
                }
            }
        }

        //louisemiguel1999@gmail.com (Estacio@007)
        //cymonlo@gmail.com (cymonLo@2002)
        //capua_kyle@gmail.com (CapuaKyle@2002)
        //vinceleomo@gmail.com (LeomoVince@0)

        //admin@gmail.com (adminPassword@01)

        session_start();

        if ($username_error || $password_error || $account_error) {
            $_SESSION["username_error"] = $username_error;
            $_SESSION["username"] = $username;
            $_SESSION["password_error"] = $password_error;
            $_SESSION["account_activation_error"] = $account_error;

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
                // header("Location: ../../user_homepage.php?login=success");
                header("Location: ../../user_homepage.php");
            }
            else {
                // header("Location: ../../admin_dashboard.php?login=success");
                header("Location: ../../admin_dashboard.php");
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

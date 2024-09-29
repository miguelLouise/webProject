<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once '../dbh.inc.php';
        require_once 'login_model.php';
        require_once 'login_controller.php';

        $username_error = "";
        $password_error = "";

        $username = $_POST['username'];
        $password = $_POST['user_password'];

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

        // ynnehjestacio150@gmail.com (Hahahaha$00) USER - 0
        // miguellouiseestacio@gmail.com (VinceLeomo$008) ADMIN - 1

        // adminemail@sample.com (passwordAdmin$00) - 1

        //louisemiguel1999@gmail.com (Password@00)
        //admin@gmail.com (adminPassword@01)

        session_start();

        if ($username_error || $password_error) {
            $_SESSION["username_error"] = $username_error;
            $_SESSION["password_error"] = $password_error;
            header('Location: ../../login_page.php');
            die();
        }

        $_SESSION["user_logged_in"] = true;
        $_SESSION["user_id"] = htmlspecialchars($user_info["Id"]);
        $_SESSION["user_role"] = htmlspecialchars($user_info["role"]);
        $_SESSION["user_name"] = htmlspecialchars($user_info["name"]);
        $_SESSION["user_num"] = htmlspecialchars($user_info["contact_number"]);
        $_SESSION["user_email"] = htmlspecialchars($user_info["email"]);
        $_SESSION["user_bday"] = htmlspecialchars($user_info["birthday"]);


        if ($_SESSION["user_role"] == 0) {
            header("Location: ../../user_homepage.php?login=success");
        }
        else {
            header("Location: ../../admin_dashboard.php?login=success");
            //header("Location: ../../samplePage.php?login=success");
        }

        $pdo = null;
        $statement = null;

        die();
    } catch (PDOException $e) {
        die("Query failed" . $e->getMessage());
    }
} else {
    header("Location: ../../login_page.php");
    die();
}

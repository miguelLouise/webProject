<?php

if (isset($_SESSION["user_logged_in"])) {
    if ($_SESSION["user_role"] != 0) {
        $_SESSION["auth_error"] = "page not accessible";
        header("Location: ../error_page.php");
    }
} else {
    header("Location: ../login_page.php");
}

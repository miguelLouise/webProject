<?php
session_start();

function display_login_error(string $var_name)
{
    if (isset($_SESSION[$var_name])) {
        $error_warning = $_SESSION[$var_name];

        echo $error_warning;

        unset($_SESSION[$var_name]);
    }
}

function displayInfo(string $var_name)
{
    if (isset($_SESSION[$var_name])) {
        $email = $_SESSION[$var_name];

        echo $email;

        unset($_SESSION[$var_name]);
    }
}

function display_user_info()
{

    if (isset($_SESSION["user_logged_in"])) {
        echo $_SESSION["user_id"];
        echo "<br>";
        echo $_SESSION["user_role"];
        echo "<br>";
        echo $_SESSION["user_name"];
        echo "<br>";
        echo $_SESSION["user_num"];
        echo "<br>";
        echo $_SESSION["user_email"];
        echo "<br>";
        echo $_SESSION["user_bday"];
    }
}

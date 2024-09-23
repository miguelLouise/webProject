<?php
session_start();

function display_signup_error(string $var_name)
{
    if (isset($_SESSION[$var_name])) {
        $error_warning = $_SESSION[$var_name];

        echo $error_warning;

        unset($_SESSION[$var_name]);
    }
}

function signup_success_message(string $var_name)
{
    if (isset($_SESSION[$var_name])) {
        $signup_success = $_SESSION[$var_name];

        echo '<div style="background-color: #a0db9d; position: absolute; top: 175px; height: 50px; width: 400px; border: 2px solid #558f52;">' .
            $signup_success .
            '</div>';

        unset($_SESSION[$var_name]);
    }
}

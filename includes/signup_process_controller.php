<?php

function is_empty(string $var)
{
    if (empty($var)) {
        return true;
    } else {
        return false;
    }
}

function is_email_valid(string $email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

// /^[0][9]\d{9}$/g - phone number regex
function check_number_format(string $phone_number)
{
    $number_format = "^[0][9]\d{9}$^";

    if (!preg_match($number_format, $phone_number)) {
        return true;
    } else {
        return false;
    }
}

function check_email(object $pdo, string $email)
{
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

function check_age(string $birthday)
{
    $birthday = strtotime($birthday);
    $today = strtotime(date("Y-m-d"));

    $diff = abs($today - $birthday);

    $years = floor($diff / 31536000);
    $months = floor(($diff % 31536000) / 2628000);
    $days = floor(($diff % 2628000) / 86400);

    if ($years >= 18) {
        return false;
    } else {
        return true;
    }
}

function check_password_format(string $password)
{
    // #^()-_+=|\[]{}:"'/,.<>?~`; - EXCEPTIONS
    // ^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$
    $password_format = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$^";

    if (!preg_match($password_format, $password)) {
        return true;
    } else {
        return false;
    }
}

function match_password(string $pass, string $pass_confirmation)
{
    if (!$pass == $pass_confirmation) {
        return true;
    } else {
        return false;
    }
}

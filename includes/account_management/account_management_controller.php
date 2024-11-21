<?php

 function is_password_matched(string $password, string $hashed_pass){
    if (password_verify($password, $hashed_pass)) {
        return true;
    } else {
        return false;
    }
}

function check_password_format(string $password){
    // #^()-_+=|\[]{}:"'/,.<>?~`; - EXCEPTIONS
    // ^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$
    $password_format = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$^";

    if (!preg_match($password_format, $password)) {
        return true;
    } else {
        return false;
    }
}


function check_if_matched(string $var1, string $var2){
    if ($var1 ===  $var2) {
        return true;
    } else {
        return false;
    }
}

// /^[0][9]\d{9}$/g - phone number regex
function check_number_format(string $phone_number){
    $number_format = "^[0][9]\d{9}$^";

    if (preg_match($number_format, $phone_number)) {
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
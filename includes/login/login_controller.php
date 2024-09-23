<?php

function is_empty(string|array $var)
{
    if (empty($var)) {
        return true;
    } else {
        return false;
    }
}


function username_exist(bool|array $username)
{
    if (!$username) {
        return true;
    } else {
        return false;
    }
}

function check_password(string $password, string $hashed_pass)
{
    if (!password_verify($password, $hashed_pass)) {
        return true;
    } else {
        return false;
    }
}

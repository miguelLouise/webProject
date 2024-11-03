<?php

function display_message(string $var_name)
{
    if (isset($_SESSION[$var_name])) {
        $error = $_SESSION[$var_name];

        echo $error; 
    }
}

function unset_session_variable(string $var_name){
    unset($_SESSION[$var_name]);
}

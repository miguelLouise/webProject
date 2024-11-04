<?php

function display_message(string $var_name)
{
    if (isset($_SESSION[$var_name])) {
        $var = $_SESSION[$var_name];

        echo $var; 
    }
}

function unset_session_variable(string $var_name){
    unset($_SESSION[$var_name]);
}


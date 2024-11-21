<?php

if (isset($_SESSION["user_logged_in"])) {
    if (isset($_SERVER['HTTP_REFERER'])) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        session_start();

        echo  $_SESSION["user_name"];
        echo  $_SESSION["user_id"];
    } catch (PDOException $e) {
        die("Query failed" . $e->getMessage());
    }
} else {
    header("Location: " . $_SERVER['HTTP_REFERER']);
    die();
}
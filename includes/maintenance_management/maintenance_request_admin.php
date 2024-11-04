<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once '../dbh.inc.php';
       session_start();

    //     echo $_SESSION["user_id"];
    //     echo $_SESSION["user_role"];
    //     echo $_SESSION["user_name"];
    //     echo $_SESSION["user_num"];
    //     echo $_SESSION["user_email"];
    //     echo $_SESSION["user_bday"];
    $user_name = $_POST["name"];
    $user_email = $_POST["email"];

    echo $_SESSION["user_id"];
    echo "<br>";
    echo $user_name;
    echo "<br>";
    echo $user_email;
    } catch (PDOException $e) {
        die("Query failed" . $e->getMessage());
      }
} else {
    header("Location: ../../maintenance_request_page.php");
    die();
}
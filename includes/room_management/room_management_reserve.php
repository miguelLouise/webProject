<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once '../config.php';
    $aaa = $_POST['flr_num'];
    // $bbb = $_POST['flr_num'];
    $bbb = preg_split("/,/", $aaa);
    $ccc = $_POST['room_num'];

    echo 'room type is ';
    echo $bbb[0];
    echo '<br>';
    echo 'floor number is ';
    echo $bbb[1];
    echo '<br>';
    echo 'room number is ';
    echo $ccc;
    echo '<br>';
    echo $_SESSION["user_id"];
    echo '<br>';
    echo $_SESSION["user_role"];
    echo '<br>';
    echo $_SESSION["user_name"];
    echo '<br>';
    echo $_SESSION["user_num"];
    echo '<br>';
    echo $_SESSION["user_email"];
    echo '<br>';
    echo $_SESSION["user_bday"];
        
    
    } catch (PDOException $e) {
        die("Query failed" . $e->getMessage());
    }
}

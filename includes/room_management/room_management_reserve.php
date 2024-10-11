<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // require_once '../dbh.inc.php';
        // require_once 'room_management_model.php';

        $room = $_POST["selected_room"];
        $flrnum = $_POST["floorName"];
        
       

       print_r($room);
       echo $flrnum;
    // echo $room[0];
    
    } catch (PDOException $e) {
        die("Query failed" . $e->getMessage());
    }
}

<?php
if($_SERVER["REQUEST_METHOD"] == "GET"){
    try {
      require_once '../dbh.inc.php';
      require_once 'tenant_management_model.php';
      require_once 'tenant_management_controller.php';

      $reservation_id = $_GET["id"];
      $user_id  = $_GET["user_id"];
      $room_type  = $_GET["room_type"];
      $floor_number  = $_GET["floor_number"];
      $room_number  = $_GET["room_number"];
      $reservation_date  = $_GET["reservation_date"];

      $user = getUser($dbconn, $user_id);
      $room = getRoom($dbconn, $room_type, $floor_number,  $room_number);
      session_start();
      // accept reservation and add user as tenant
      if ($_GET['action'] == 'add') 
      {
        // if room is not full
        if ($room["tenants"] < $room["max_capacity"]) 
        {
          add_new_tenant($dbconn, $user["user_id"], $room["room_id"]);
          deleteReservation($dbconn, $reservation_id);
          $_SESSION["tenant_added"] = "new tenant added";

          header('Location: ../../reservation_management_page_admin.php#user_is_added_as_tenant');
          die();
        }
        // if room is full
        else
        {
          $_SESSION["room_full"] = "room is full";

          header('Location: ../../reservation_management_page_admin.php#room_is_full');
          die();
        }
        
        }
        // delete reservation
        elseif ($_GET['action'] == 'delete')
        {
          deleteReservation($dbconn, $reservation_id);

          header('Location: ../../reservation_management_page_admin.php#record_deleted'); 
          die();
        }
    } catch (PDOException $e) {
      die("Query failed" . $e->getMessage());
    }
} else {
    header("Location: ../../reservation_management_page_admin.php#error");
    die();
}
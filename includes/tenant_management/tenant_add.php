<?php
if($_SERVER["REQUEST_METHOD"] == "GET"){
    try {
        require_once '../dbh.inc.php';
        require_once 'tenant_management_model.php';
        require_once 'tenant_management_controller.php';

        $reservation_id = $_GET["id"];//
        $user_id  = $_GET["user_id"];
        $room_type  = $_GET["room_type"];//
        $floor_number  = $_GET["floor_number"];//
        $room_number  = $_GET["room_number"];
        $reservation_date  = $_GET["reservation_date"];//

        $get_user = get_user($dbconn, $user_id);
        $get_room = get_room($dbconn, $room_number);

        session_start();

        // accept reservation and add user as tenant
        if ($_GET['action'] == 'add')  {
          $_SESSION["reservation_user_id"] = $user_id;
          $_SESSION["name"] = $get_user["name"];
          $_SESSION["email"] = $get_user["email"];
          $_SESSION["birthday"] = $get_user["birthday"];
          $_SESSION["contact_number"] = $get_user["contact_number"];
          $_SESSION["room_type"] = $get_room["room_type"];
          $_SESSION["floor_number"] = $get_room["floor_number"];
          $_SESSION["room_number"] = $get_room["room_number"];
          
          header('Location: ../../tenant_management_page_admin.php'); 
          die();
        }
        // delete reservation
        elseif ($_GET['action'] == 'delete') {
          deleteReservation($dbconn, $user_id);

          $_SESSION["delete_reservation"] = "reservation deleted";

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
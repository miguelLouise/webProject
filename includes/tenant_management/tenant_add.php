<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
    try {
        require_once '../dbh.inc.php';
        require_once 'tenant_management_model.php';
        require_once 'tenant_management_controller.php';

        $reservation_id = $_POST["id"];//
        $user_id  = $_POST["user_id"];
        $room_type  = $_POST["room_type"];//
        $floor_number  = $_POST["floor_number"];//
        $room_number  = $_POST["room_number"];
        $reservation_date  = $_POST["reservation_date"];//

        $get_user = get_user($dbconn, $user_id);
        $get_room = get_room($dbconn, $room_number);

        session_start();

        if (isset($_POST['add_tenant_btn']))  {
          $_SESSION["reservation_user_id"] = $get_user["user_id"];
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
        elseif (isset($_POST['confirm_delete_btn'])) {
          // deleteReservation($dbconn, $user_id);

          $_SESSION["delete_reservation"] = "Reservation Deleted Successfully";

          header("Location: " . $_SERVER['HTTP_REFERER']);
          die();
        }
      } catch (PDOException $e) {
        die("Query failed" . $e->getMessage());
      }
} else {
    header("Location: " . $_SERVER['HTTP_REFERER']);
    die();
}
<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    try {

        $room_status_selected = $_GET["action"];

        session_start();

        if ($room_status_selected === "vacant_rooms") {
            $_SESSION["selected_room_status"] = "Available";

            header("Location: ../../room_management_page_admin.php");
            die();
        } else if ($room_status_selected === "occupied_rooms") {
            $_SESSION["selected_room_status"] = "Occupied";

            header("Location: ../../room_management_page_admin.php");
            die();
        } else if ($room_status_selected === "not_available_rooms") {
            $_SESSION["selected_room_status"] = "Not Available";

            header("Location: ../../room_management_page_admin.php");
            die();
        } else {
            $_SESSION["selected_room_status"] = "Room Status";

            header("Location: " . $_SERVER['HTTP_REFERER']);
            die();
        }
    } catch (PDOException $e) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        die();
    }
} else {
    header("Location: " . $_SERVER['HTTP_REFERER']);
    die();
}

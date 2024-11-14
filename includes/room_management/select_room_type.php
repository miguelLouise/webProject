<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    try {

        $room_type_selected = $_GET["action"];

        session_start();

        if ($room_type_selected === "no_room") {
            $_SESSION["selected_room"] = "Room Type";

            header("Location: ../../reservation.php");
            die();
        } else if ($room_type_selected === "room_one") {
            $_SESSION["selected_room"] = 1;

            header("Location: ../../reservation.php");
            die();
        } else if ($room_type_selected === "room_two") {
            $_SESSION["selected_room"] = 2;

            header("Location: ../../reservation.php");
            die();
        } else if ($room_type_selected === "room_three") {
            $_SESSION["selected_room"] = 3;

            header("Location: ../../reservation.php");
            die();
        } else if ($room_type_selected === "room_four") {
            $_SESSION["selected_room"] = 4;

            header("Location: ../../reservation.php");
            die();
        } else {
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

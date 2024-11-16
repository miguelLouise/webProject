<?php
require_once './includes/dbh.inc.php';
require_once './includes/room_management/room_management_view.php';

$rmType = $_POST['roomTyp'];



if ($rmType == 1) {
    $roomDesc = showRoomDesc($dbconn, $rmType);
    foreach ($roomDesc as $value) {
        echo '<div style="display: flex; align-items: center; width: 65%">
            <ul style="list-style-type: none;">
            <li>'.$value['room_description'].'<li>
            <ul>
            </div>
            <div style="right: 0; padding: 5px; border: 1px solid; width: 35%; display: flex; justify-content: center;">
            <img height="100%" width="auto" src="Assets/room1pic1.png" onclick="changeImage("room1-large", "Assets/room1pic1.png")" alt="Room 1 Image 1">
            </div>';
    }
} elseif ($rmType == 2) {
    $roomDesc = showRoomDesc($dbconn, $rmType);
    foreach ($roomDesc as $value) {
        echo '<div style="display: flex; align-items: center; width: 65%">
            <ul style="list-style-type: none;">
            <li>'.$value['room_description'].'<li>
            <ul>
            </div>
            <div style="right: 0; padding: 5px; border: 1px solid; width: 35%; display: flex; justify-content: center;">
            <img height="100%" width="auto" src="Assets/room1pic1.png" onclick="changeImage("room1-large", "Assets/room1pic1.png")" alt="Room 1 Image 1">
            </div>';
    }
} elseif ($rmType == 3) {
    $roomDesc = showRoomDesc($dbconn, $rmType);
    foreach ($roomDesc as $value) {
        echo '<div style="display: flex; align-items: center; width: 65%">
            <ul style="list-style-type: none;">
            <li>'.$value['room_description'].'<li>
            <ul>
            </div>
            <div style="right: 0; padding: 5px; border: 1px solid; width: 35%; display: flex; justify-content: center;">
            <img height="100%" width="auto" src="Assets/room1pic1.png" onclick="changeImage("room1-large", "Assets/room1pic1.png")" alt="Room 1 Image 1">
            </div>';
    }
} elseif ($rmType == 4) {
    $roomDesc = showRoomDesc($dbconn, $rmType);
    foreach ($roomDesc as $value) {
        echo '<div style="display: flex; align-items: center; width: 65%">
            <ul style="list-style-type: none;">
            <li>'.$value['room_description'].'<li>
            <ul>
            </div>
            <div style="right: 0; padding: 5px; border: 1px solid; width: 35%; display: flex; justify-content: center;">
            <img height="100%" width="auto" src="Assets/room1pic1.png" onclick="changeImage("room1-large", "Assets/room1pic1.png")" alt="Room 1 Image 1">
            </div>';
    }
}

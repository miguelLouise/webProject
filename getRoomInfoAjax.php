<?php
require_once './includes/dbh.inc.php';
require_once './includes/room_management/room_management_view.php';

$rmType = $_POST['roomTyp'];

$roomDesc = showRoomDesc($dbconn, $rmType);
foreach ($roomDesc as $value) {
    echo '<ul>';
    echo '<li>'.$value['room_type'].'<li>';
    echo '<li>'.$value['max_capacity'].'<li>';
    echo '<li>'.$value['price'].'<li>';
    echo '<li>'.$value['room_description'].'<li>';
    echo '<ul>';
}
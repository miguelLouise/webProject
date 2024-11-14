<?php

function check_if_user_has_reservation(object $pdo, $user_id){
    $query = "SELECT dormlink_reservations.reservation_id, users.user_id, users.name, users.contact_number, rooms.* FROM dormlink_reservations JOIN users ON dormlink_reservations.user_id = users.user_id  JOIN rooms ON dormlink_reservations.room_number = rooms.room_number WHERE dormlink_reservations.user_id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
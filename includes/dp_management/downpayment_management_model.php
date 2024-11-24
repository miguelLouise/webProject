<?php

function check_if_user_has_reservation(object $pdo, $user_id){
    $query = "SELECT dormlink_reservations.reservation_id, users.user_id, users.name, users.contact_number, rooms.* FROM dormlink_reservations JOIN users ON dormlink_reservations.user_id = users.user_id  JOIN rooms ON dormlink_reservations.room_number = rooms.room_number WHERE dormlink_reservations.user_id = :user_id AND is_deleted = 0;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function upload_payment_image(object $pdo, $reservation_id, $user_id, $payment_reference_number, $image_filename, $date_uploaded){
    $query = "INSERT INTO dormlink_reservation_down_payment (reservation_id, user_id, payment_reference_number, image_filename, date_uploaded) VALUES (:reservation_id, :user_id, :payment_reference_number, :image_filename, :date_uploaded);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":reservation_id", $reservation_id, PDO::PARAM_INT);
    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
    $stmt->bindParam(":payment_reference_number", $payment_reference_number);
    $stmt->bindParam(":image_filename", $image_filename);
    $stmt->bindParam(":date_uploaded", $date_uploaded);
    $stmt->execute();
}

function get_payment_info(object $pdo, $reservation_id){
    $query = "SELECT dormlink_reservations.reservation_id, users.user_id, users.name, users.contact_number, rooms.room_id, rooms.room_type, rooms.floor_number, rooms.room_number, dormlink_reservation_down_payment.payment_reference_number, dormlink_reservation_down_payment.image_filename, dormlink_reservation_down_payment.date_uploaded
                FROM dormlink_reservations
                JOIN users ON dormlink_reservations.user_id = users.user_id
                JOIN rooms ON dormlink_reservations.room_number = rooms.room_number
                JOIN dormlink_reservation_down_payment ON dormlink_reservations.reservation_id = dormlink_reservation_down_payment.reservation_id
                WHERE is_deleted = 0 AND dormlink_reservations.reservation_id = :reservation_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":reservation_id", $reservation_id, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

<?php

function get_user(object $pdo, $user_id){
    $query = "SELECT  user_id, name, contact_number, email, birthday FROM users WHERE user_id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
// 
function getRoom(object $pdo, $room_type, $floor_num, $room_num){
    $query = "SELECT * FROM rooms WHERE room_type = :room_type AND floor_number = :floor_number AND room_number = :room_number;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":room_type", $room_type, PDO::PARAM_INT);
    $stmt->bindParam(":floor_number", $floor_num, PDO::PARAM_INT);
    $stmt->bindParam(":room_number", $room_num, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_room(object $pdo, $room_num){
    $query = "SELECT * FROM rooms WHERE room_number = :room_number;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":room_number", $room_num, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function deleteReservation(object $pdo, $user_id){
    $query = "DELETE FROM dormlink_reservations WHERE user_id = :user_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();
}

function add_new_tenant(object $pdo, $user_id, $room_id)
{
    $query = "INSERT INTO dormlink_tenants (user_id, room_id) VALUES (:user_id, :room_id);";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":room_id", $room_id);
    $stmt->execute();
}

function update_room_tenant(object $pdo, $tenant_num, $room_num){
    $query = "UPDATE rooms SET tenants = :tenants WHERE room_number = :room_number;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":tenants", $tenant_num, PDO::PARAM_INT);
    $stmt->bindParam(":room_number", $room_num, PDO::PARAM_INT);
    $stmt->execute();
}

function check_if_user_is_tenant(object $pdo, $user_id){
    $query = "SELECT * FROM dormlink_tenants WHERE user_id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function tenant_info(object $pdo){
    $query = "SELECT users.user_id, users.name, users.contact_number, users.email, users.birthday, rooms.room_id, rooms.floor_number, rooms.room_number FROM dormlink_tenants JOIN users ON dormlink_tenants.user_id = users.user_id JOIN rooms ON dormlink_tenants.room_id = rooms.room_id";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
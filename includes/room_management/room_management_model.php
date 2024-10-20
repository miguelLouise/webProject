<?php

function getRoomMngmtTable(object $pdo)
{
    $query = "SELECT * FROM rooms";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getRoomTypes(object $pdo){
    $query = "SELECT * FROM room_types";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getFloors(object $pdo, $room_type){
    $query = "SELECT DISTINCT floor_number FROM rooms WHERE room_type = :room_type;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":room_type", $room_type, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function query1(object $pdo, $room_type){
    $query = "SELECT * FROM rooms WHERE room_type = :room_type AND floor_number = 5;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":room_type", $room_type);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getRooms(object $pdo, $room_type, $floor_num){
    $query = "SELECT * FROM rooms WHERE room_type = :room_type AND floor_number = :floor_number;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":room_type", $room_type, PDO::PARAM_INT);
    $stmt->bindParam(":floor_number", $floor_num, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getRoomDesc(object $pdo, $room_type){
    $query = "SELECT * FROM room_types WHERE room_type = :room_type;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":room_type", $room_type, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getRoomAvailability(object $pdo, $room_type, $floor_num, $room_num){
    $query = "SELECT * FROM rooms WHERE room_type = :room_type AND floor_number = :floor_number AND room_number = :room_number;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":room_type", $room_type, PDO::PARAM_INT);
    $stmt->bindParam(":floor_number", $floor_num, PDO::PARAM_INT);
    $stmt->bindParam(":room_number", $room_num, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getRoomAvailabilityStatus(object $pdo, $room_type, $floor_num, $room_num){
    $query = "SELECT status FROM rooms WHERE room_type = :room_type AND floor_number = :floor_number AND room_number = :room_number;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":room_type", $room_type, PDO::PARAM_INT);
    $stmt->bindParam(":floor_number", $floor_num, PDO::PARAM_INT);
    $stmt->bindParam(":room_number", $room_num, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function reserveRoom(object $pdo, $user_id, $room_type, $floor_num, $room_num, $date){
    $query = "INSERT INTO dormlink_reservations (user_id, room_type, floor_number, room_number, reservation_date) VALUES (:user_id, :room_type, :floor_number,  :room_number, :reservation_date);";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":room_type", $room_type);
    $stmt->bindParam(":floor_number", $floor_num);
    $stmt->bindParam(":room_number", $room_num);
    $stmt->bindParam(":reservation_date", $date);
    $stmt->execute();
}

function getReservationTable(object $pdo)
{
    $query = "SELECT * FROM dormlink_reservations";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


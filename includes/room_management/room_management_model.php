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



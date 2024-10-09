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

function getTblData (object $pdo){
    $query = "SELECT * FROM rooms RIGHT JOIN room_types ON rooms.room_type = room_types.room_type";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

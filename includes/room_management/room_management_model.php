<?php

function getDormlinkRooms(object $pdo){
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

function isRoomAvailable(object $pdo, $room_num){
    $query = "SELECT * FROM rooms WHERE room_number = :room_number;";
    $stmt = $pdo->prepare($query);
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

function getReservationTable(object $pdo){
    $query = "SELECT * FROM dormlink_reservations";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function does_user_have_reservation(object $pdo, $user_id){
    $query = "SELECT * FROM dormlink_reservations WHERE user_id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function showAllRooms(object $pdo){
    $query = "SELECT * FROM rooms";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_total_Rooms(object $pdo){
    $query = "SELECT COUNT(*) AS total_rooms FROM rooms";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_total_Beds(object $pdo){
    $query = "SELECT SUM(max_capacity) AS total_beds FROM rooms;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function update_reservation_status(object $pdo, $reservation_status, $reservation_id){
    $query = "UPDATE dormlink_reservations SET reservation_status = :reservation_status WHERE reservation_id = :reservation_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":reservation_status", $reservation_status);
    $stmt->bindParam(":reservation_id", $reservation_id, PDO::PARAM_INT);
    $stmt->execute();
}

function get_total_reservations(object $pdo){
    $query = "SELECT COUNT(*) AS total_reservation FROM dormlink_reservations";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_room_types(object $pdo){
    $query = "SELECT DISTINCT room_type FROM rooms;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_floor_numbers(object $pdo){
    $query = "SELECT DISTINCT floor_number FROM rooms;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_room_status(object $pdo){
    $query = "SELECT * FROM room_status;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function filter_by_room_type(object $pdo, $room_type){
    $query = "SELECT * FROM rooms WHERE room_type  = :room_type;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":room_type", $room_type, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function filter_by_floor_number(object $pdo, $floor_number){
    $query = "SELECT * FROM rooms WHERE floor_number  = :floor_number;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":floor_number", $floor_number,  PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function filter_by_room_status(object $pdo, $room_status){
    $query = "SELECT * FROM rooms WHERE room_status  = :room_status;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":room_status", $room_status);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function filter_by_room_type_and_floor_number(object $pdo, $room_type, $floor_number){
    $query = "SELECT * FROM rooms WHERE room_type  = :room_type AND floor_number  = :floor_number;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":room_type", $room_type, PDO::PARAM_INT);
    $stmt->bindParam(":floor_number", $floor_number, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function filter_by_room_type_and_room_status(object $pdo, $room_type, $room_status){
    $query = "SELECT * FROM rooms WHERE room_type  = :room_type AND room_status  = :room_status;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":room_type", $room_type, PDO::PARAM_INT);
    $stmt->bindParam(":room_status", $room_status);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function filter_by_floor_number_and_room_status(object $pdo, $floor_number, $room_status){
    $query = "SELECT * FROM rooms WHERE room_number  = :room_number AND room_status  = :room_status;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":room_number", $floor_number, PDO::PARAM_INT);
    $stmt->bindParam(":room_status", $room_status);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function filter_by_room_type_floor_number_and_room_status(object $pdo, $room_type, $floor_number, $room_status){
    $query = "SELECT * FROM rooms WHERE room_type = :room_type AND room_number  = :room_number AND room_status  = :room_status;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":room_type", $room_type, PDO::PARAM_INT);
    $stmt->bindParam(":room_number", $floor_number, PDO::PARAM_INT);
    $stmt->bindParam(":room_status", $room_status);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

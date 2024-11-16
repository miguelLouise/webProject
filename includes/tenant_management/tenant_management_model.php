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

function add_user_tenant(object $pdo, $user_id, $name, $contact_number, $email, $birthday, $room_id, $start_of_contract)
{
    $query = "INSERT INTO dormlink_tenants (user_id, name, contact_number, email, birthday, room_id, start_of_contract) VALUES (:user_id, :name, :contact_number, :email, :birthday, :room_id, :start_of_contract);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":contact_number", $contact_number);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":birthday", $birthday);
    $stmt->bindParam(":room_id", $room_id);
    $stmt->bindParam(":start_of_contract", $start_of_contract);
    $stmt->execute();
}

function add_walkin_tenant(object $pdo, $name, $contact_number, $email, $birthday, $room_id, $start_of_contract)
{
    $query = "INSERT INTO dormlink_tenants (name, contact_number, email, birthday, room_id, start_of_contract) VALUES (:name, :contact_number, :email, :birthday, :room_id, :start_of_contract);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":contact_number", $contact_number);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":birthday", $birthday);
    $stmt->bindParam(":room_id", $room_id);
    $stmt->bindParam(":start_of_contract", $start_of_contract);
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
    $query = "SELECT dormlink_tenants.*, rooms.*  FROM dormlink_tenants JOIN rooms ON dormlink_tenants.room_id = rooms.room_id WHERE dormlink_tenants.user_id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function tenant_info(object $pdo){
    $query = "SELECT dormlink_tenants.*, rooms.*  FROM dormlink_tenants JOIN rooms ON dormlink_tenants.room_id = rooms.room_id;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function delete_tenant(object $pdo, $tenant_id){
    $query = "DELETE FROM dormlink_tenants WHERE tenant_id = :tenant_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":tenant_id", $tenant_id, PDO::PARAM_INT);
    $stmt->execute();
}

function get_tenant_info(object $pdo, $tenant_id){
    $query = "SELECT dormlink_tenants.*, rooms.*  FROM dormlink_tenants JOIN rooms ON dormlink_tenants.room_id = rooms.room_id WHERE tenant_id = :tenant_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":tenant_id", $tenant_id, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_total_tenants(object $pdo){
    $query = "SELECT COUNT(*) AS total_tenants FROM dormlink_tenants";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function change_room_status(object $pdo, $room_status, $room_id){
    $query = "UPDATE rooms SET room_status = :room_status WHERE room_id = :room_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":room_status", $room_status);
    $stmt->bindParam(":room_id", $room_id);
    $stmt->execute();
}

function archive_user_info(object $pdo, $tenant_id, $user_id, $name, $contact_number, $email, $birthday, $room_id, $contract, $start_of_contract, $archive_date){
    $query = "INSERT INTO dormlink_tenant_archive (tenant_id, user_id, name, contact_number, email, birthday, room_id, contract, start_of_contract, archive_date) VALUES (:tenant_id, :user_id, :name, :contact_number, :email, :birthday, :room_id, :contract, :start_of_contract, :archive_date);";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":tenant_id", $tenant_id, PDO::PARAM_INT);
    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":contact_number", $contact_number);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":birthday", $birthday);
    $stmt->bindParam(":room_id", $room_id, PDO::PARAM_INT);
    $stmt->bindParam(":contract", $contract, PDO::PARAM_INT);
    $stmt->bindParam(":start_of_contract", $start_of_contract);
    $stmt->bindParam(":archive_date", $archive_date);

    $stmt->execute();
}


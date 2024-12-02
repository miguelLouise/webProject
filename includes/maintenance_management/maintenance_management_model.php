<?php

function submit_maintenance_request(object $pdo, $tenant_id, $user_id, $name, $email, $room_id, $category, $maintenance_urgency, $description, $date, $time, $maintenance_issue_image){
    $query = "INSERT INTO dormlink_maintenance_request (tenant_id, user_id, name, email, room_id, category, maintenance_urgency, description, date, time, maintenance_issue_image) VALUES (:tenant_id, :user_id, :name, :email, :room_id, :category, :maintenance_urgency, :description, :date, :time, :maintenance_issue_image);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":tenant_id", $tenant_id);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":room_id", $room_id);
    $stmt->bindParam(":category", $category);
    $stmt->bindParam(":maintenance_urgency", $maintenance_urgency);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":date", $date);
    $stmt->bindParam(":time", $time);
    $stmt->bindParam(":maintenance_issue_image", $maintenance_issue_image);
    $stmt->execute();
}

function get_maintenance_request(object $pdo){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE is_archived = 0 ORDER BY date DESC;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_completed_maintenance_request(object $pdo){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE is_archived = 1 ORDER BY date DESC;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_user_maintenance_request_by_maintenance_id(object $pdo, $maintenance_id){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE maintenance_request_id = :maintenance_request_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":maintenance_request_id", $maintenance_id, PDO::PARAM_INT);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

// show to user side
function get_user_maintenance_request(object $pdo, $tenant_id){
    $query = "SELECT * FROM dormlink_maintenance_request WHERE tenant_id = :tenant_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":tenant_id", $tenant_id, PDO::PARAM_INT);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function delete_maintenance_request(object $pdo, $tenant_id){
    $query = "UPDATE dormlink_maintenance_request SET is_deleted = 1, date_deleted = :date_deleted WHERE tenant_id = :tenant_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":tenant_id", $tenant_id, PDO::PARAM_INT);

    $stmt->execute();
}

// archive
function archive_maintenance_request(object $pdo, $maintenance_request_id, $user_id, $tenant_id, $room_id, $room_type, $floor_number, $room_number, $category, $maintenance_urgency, $description, $date_submitted, $time_submitted, $maintenance_status, $date_completed, $archive_date){
    $query = "INSERT INTO dormlink_maintenance_request_archive (maintenance_request_id, user_id, tenant_id, room_id, room_type, floor_number, room_number, category, maintenance_urgency, description, date_submitted, time_submitted, maintenance_status, date_completed, archive_date) VALUES (:maintenance_request_id, :user_id, :tenant_id, :room_id, :room_type, :floor_number, :room_number, :category, :maintenance_urgency, :description, :date_submitted, :time_submitted, :maintenance_status, :date_completed, :archive_date);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":maintenance_request_id", $maintenance_request_id, PDO::PARAM_INT);
    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
    $stmt->bindParam(":tenant_id", $tenant_id, PDO::PARAM_INT);
    $stmt->bindParam(":room_id", $room_id, PDO::PARAM_INT);
    $stmt->bindParam(":room_type", $room_type, PDO::PARAM_INT);
    $stmt->bindParam(":floor_number", $floor_number, PDO::PARAM_INT);
    $stmt->bindParam(":room_number", $room_number, PDO::PARAM_INT);
    $stmt->bindParam(":category", $category);
    $stmt->bindParam(":maintenance_urgency", $maintenance_urgency);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":date_submitted", $date_submitted);
    $stmt->bindParam(":time_submitted", $time_submitted);
    $stmt->bindParam(":maintenance_status", $maintenance_status);
    $stmt->bindParam(":date_completed", $date_completed);
    $stmt->bindParam(":archive_date", $archive_date);

    $stmt->execute();
}

function archive_active_maintenance_request(object $pdo, $maintenance_request_id, $user_id, $tenant_id, $room_id, $room_type, $floor_number, $room_number, $category, $maintenance_urgency, $description, $date_submitted, $time_submitted, $maintenance_status, $archive_date){
    $query = "INSERT INTO dormlink_maintenance_request_archive (maintenance_request_id, user_id, tenant_id, room_id, room_type, floor_number, room_number, category, maintenance_urgency, description, date_submitted, time_submitted, maintenance_status, archive_date) VALUES (:maintenance_request_id, :user_id, :tenant_id, :room_id,  :room_type, :floor_number, :room_number, :category, :maintenance_urgency, :description, :date_submitted, :time_submitted, :maintenance_status, :archive_date);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":maintenance_request_id", $maintenance_request_id, PDO::PARAM_INT);
    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
    $stmt->bindParam(":tenant_id", $tenant_id, PDO::PARAM_INT);
    $stmt->bindParam(":room_id", $room_id, PDO::PARAM_INT);
    $stmt->bindParam(":room_type", $room_type, PDO::PARAM_INT);
    $stmt->bindParam(":floor_number", $floor_number, PDO::PARAM_INT);
    $stmt->bindParam(":room_number", $room_number, PDO::PARAM_INT);
    $stmt->bindParam(":category", $category);
    $stmt->bindParam(":maintenance_urgency", $maintenance_urgency);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":date_submitted", $date_submitted);
    $stmt->bindParam(":time_submitted", $time_submitted);
    $stmt->bindParam(":maintenance_status", $maintenance_status);
    $stmt->bindParam(":archive_date", $archive_date);

    $stmt->execute();
}

function check_if_user_is_tenant1(object $pdo, $user_id){
    $query = "SELECT dormlink_tenants.*, rooms.*  FROM dormlink_tenants JOIN rooms ON dormlink_tenants.room_id = rooms.room_id WHERE dormlink_tenants.user_id = :user_id AND is_deleted = 0;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function update_maintenance_status(object $pdo, $maintenance_status, $maintenance_request_id){
    $query = "UPDATE dormlink_maintenance_request SET maintenance_status = :maintenance_status WHERE maintenance_request_id = :maintenance_request_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":maintenance_status", $maintenance_status);
    $stmt->bindParam(":maintenance_request_id", $maintenance_request_id, PDO::PARAM_INT);
    $stmt->execute();
}

function is_delete_maintenance_request(object $pdo, $maintenance_request_id, $date_completed){
    $query = "UPDATE dormlink_maintenance_request SET is_archived = 1, date_completed = :date_completed WHERE maintenance_request_id = :maintenance_request_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":date_completed", $date_completed);
    $stmt->bindParam(":maintenance_request_id", $maintenance_request_id, PDO::PARAM_INT);
    $stmt->execute();
}

function set_maintenance_request_is_archive(object $pdo, $maintenance_request_id){
    $query = "UPDATE dormlink_maintenance_request SET is_archived = 1 WHERE maintenance_request_id = :maintenance_request_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":maintenance_request_id", $maintenance_request_id, PDO::PARAM_INT);
    $stmt->execute();
}

function get_active_maintenance_request(object $pdo){
    $query = "SELECT COUNT(*) AS total FROM dormlink_maintenance_request WHERE is_archived  = 0;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}



//maintenance filtering search
function filter_by_category(object $pdo, $maintenance_category){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE category = :category;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":category", $maintenance_category);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function filter_by_urgency(object $pdo, $maintenance_urgency){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE maintenance_urgency = :maintenance_urgency;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":maintenance_urgency", $maintenance_urgency);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function filter_by_date_from(object $pdo, $maintenance_date_from){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE date >= :maintenance_date_from;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":maintenance_date_from", $maintenance_date_from);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function filter_by_date_to(object $pdo, $maintenance_date_to){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE date <= :maintenance_date_to;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":maintenance_date_to", $maintenance_date_to);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function filter_by_maintenance_status(object $pdo, $maintenance_status){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE maintenance_status = :maintenance_status;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":maintenance_status", $maintenance_status);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// 2 parameters
function filter_by_category_and_urgency(object $pdo, $maintenance_category, $maintenance_urgency){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE category = :category AND maintenance_urgency = :maintenance_urgency;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":category", $maintenance_category);
    $stmt->bindParam(":maintenance_urgency", $maintenance_urgency);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function filter_by_category_and_date_from(object $pdo, $maintenance_category, $maintenance_date_from){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE category = :category AND date >= :maintenance_date_from;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":category", $maintenance_category);
    $stmt->bindParam(":maintenance_date_from", $maintenance_date_from);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function filter_by_category_and_date_to(object $pdo, $maintenance_category, $maintenance_date_to){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE category = :category AND date <= :maintenance_date_to;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":category", $maintenance_category);
    $stmt->bindParam(":maintenance_date_to", $maintenance_date_to);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function filter_by_category_and_status(object $pdo, $maintenance_category, $maintenance_status){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE category = :category AND maintenance_status = :maintenance_status;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":category", $maintenance_category);
    $stmt->bindParam(":maintenance_status", $maintenance_status);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function filter_by_urgency_and_date_from(object $pdo, $maintenance_urgency, $maintenance_date_from){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE maintenance_urgency = :maintenance_urgency AND date >= :maintenance_date_from;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":maintenance_urgency", $maintenance_urgency);
    $stmt->bindParam(":maintenance_date_from", $maintenance_date_from);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function filter_by_urgency_and_date_to(object $pdo, $maintenance_urgency, $maintenance_date_to){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE maintenance_urgency = :maintenance_urgency AND date <= :maintenance_date_to;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":maintenance_urgency", $maintenance_urgency);
    $stmt->bindParam(":maintenance_date_to", $maintenance_date_to);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function filter_by_urgency_and_status(object $pdo, $maintenance_urgency, $maintenance_status){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE maintenance_urgency = :maintenance_urgency AND maintenance_status = :maintenance_status;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":maintenance_urgency", $maintenance_urgency);
    $stmt->bindParam(":maintenance_status", $maintenance_status);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function filter_by_date_from_and_date_to(object $pdo, $maintenance_date_from, $maintenance_date_to){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE date BETWEEN :maintenance_date_from AND :maintenance_date_to;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":maintenance_date_from", $maintenance_date_from);
    $stmt->bindParam(":maintenance_date_to", $maintenance_date_to);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function filter_by_date_from_and_status(object $pdo, $maintenance_date_from, $maintenance_status){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE date >= :maintenance_date_from AND maintenance_status = :maintenance_status;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":maintenance_date_from", $maintenance_date_from);
    $stmt->bindParam(":maintenance_status", $maintenance_status);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function filter_by_date_to_and_status(object $pdo, $maintenance_date_to, $maintenance_status){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE date <= :maintenance_date_to AND maintenance_status = :maintenance_status;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":maintenance_date_to", $maintenance_date_to);
    $stmt->bindParam(":maintenance_status", $maintenance_status);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// 3 parameters
function filter_by_category_and_urgency_and_date_from(object $pdo, $maintenance_category, $maintenance_urgency, $maintenance_date_from){//1
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE category = :category AND maintenance_urgency = :maintenance_urgency AND date >= :maintenance_date_from;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":category", $maintenance_category);
    $stmt->bindParam(":maintenance_urgency", $maintenance_urgency);
    $stmt->bindParam(":maintenance_date_from", $maintenance_date_from);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function filter_by_category_and_urgency_and_date_to(object $pdo, $maintenance_category, $maintenance_urgency, $maintenance_date_to){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE category = :category AND maintenance_urgency = :maintenance_urgency AND date <= :maintenance_date_to;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":category", $maintenance_category);
    $stmt->bindParam(":maintenance_urgency", $maintenance_urgency);
    $stmt->bindParam(":maintenance_date_to", $maintenance_date_to);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function filter_by_category_and_urgency_and_status(object $pdo, $maintenance_category, $maintenance_urgency, $maintenance_status){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE category = :category AND maintenance_urgency = :maintenance_urgency AND maintenance_status = :maintenance_status;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":category", $maintenance_category);
    $stmt->bindParam(":maintenance_urgency", $maintenance_urgency);
    $stmt->bindParam(":maintenance_status", $maintenance_status);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function filter_by_date_from_and_category_and_date_to(object $pdo, $maintenance_date_from, $maintenance_category, $maintenance_date_to){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE date BETWEEN :maintenance_date_from AND :maintenance_date_to AND category = :category;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":maintenance_date_from", $maintenance_date_from);
    $stmt->bindParam(":category", $maintenance_category);
    $stmt->bindParam(":maintenance_date_to", $maintenance_date_to);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function filter_by_date_to_and_category_and_status(object $pdo, $maintenance_date_to, $maintenance_category, $maintenance_status){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE date <= :maintenance_date_to AND category = :category AND maintenance_status = :maintenance_status;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":maintenance_date_to", $maintenance_date_to);
    $stmt->bindParam(":category", $maintenance_category);
    $stmt->bindParam(":maintenance_status", $maintenance_status);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function filter_by_status_category_and_date_from(object $pdo, $maintenance_status,$maintenance_category, $maintenance_date_from){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE date >= :maintenance_date_from AND category = :category AND maintenance_status = :maintenance_status;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":maintenance_date_from", $maintenance_date_from);
    $stmt->bindParam(":maintenance_status", $maintenance_status);
    $stmt->bindParam(":category", $maintenance_category);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

//4 parameters
function filter_by_category_and_urgency_and_date_from_and_date_to(object $pdo, $maintenance_category, $maintenance_urgency, $maintenance_date_from, $maintenance_date_to){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE category = :category AND maintenance_urgency = :maintenance_urgency AND date BETWEEN :maintenance_date_from AND :maintenance_date_to;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":category", $maintenance_category);
    $stmt->bindParam(":maintenance_urgency", $maintenance_urgency);
    $stmt->bindParam(":maintenance_date_from", $maintenance_date_from);
    $stmt->bindParam(":maintenance_date_to", $maintenance_date_to);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function filter_by_category_and_urgency_and_date_from_and_status(object $pdo, $maintenance_category, $maintenance_urgency, $maintenance_date_from, $maintenance_status){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE category = :category AND maintenance_urgency = :maintenance_urgency AND date >= :maintenance_date_from AND maintenance_status = :maintenance_status;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":category", $maintenance_category);
    $stmt->bindParam(":maintenance_urgency", $maintenance_urgency);
    $stmt->bindParam(":maintenance_date_from", $maintenance_date_from);
    $stmt->bindParam(":maintenance_status", $maintenance_status);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function filter_by_category_and_urgency_and_date_to_and_status(object $pdo, $maintenance_category, $maintenance_urgency, $maintenance_date_to, $maintenance_status){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE category = :category AND maintenance_urgency = :maintenance_urgency AND date <= :maintenance_date_from AND maintenance_status = :maintenance_status;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":category", $maintenance_category);
    $stmt->bindParam(":maintenance_urgency", $maintenance_urgency);
    $stmt->bindParam(":maintenance_date_to", $maintenance_date_to);
    $stmt->bindParam(":maintenance_status", $maintenance_status);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function filter_by_category_and_date_from_and_date_to_and_status(object $pdo, $maintenance_category, $maintenance_date_from, $maintenance_date_to,$maintenance_status){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE category = :category AND date BETWEEN :maintenance_date_from AND :maintenance_date_to AND maintenance_status = :maintenance_status;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":category", $maintenance_category);
    $stmt->bindParam(":maintenance_date_from", $maintenance_date_from);
    $stmt->bindParam(":maintenance_date_to", $maintenance_date_to);
    $stmt->bindParam(":maintenance_status", $maintenance_status);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function filter_by_urgency_and_date_from_and_date_to_and_status(object $pdo, $maintenance_urgency, $maintenance_date_from, $maintenance_date_to,$maintenance_status){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE maintenance_urgency = :maintenance_urgency AND date BETWEEN :maintenance_date_from AND :maintenance_date_to AND maintenance_status = :maintenance_status;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":maintenance_urgency", $maintenance_urgency);
    $stmt->bindParam(":maintenance_date_from", $maintenance_date_from);
    $stmt->bindParam(":maintenance_date_to", $maintenance_date_to);
    $stmt->bindParam(":maintenance_status", $maintenance_status);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// 5 parameters
function filter_by_category_and_urgency_and_date_from_and_date_to_and_status(object $pdo, $maintenance_category,$maintenance_urgency, $maintenance_date_from, $maintenance_date_to,$maintenance_status){
    $query = "SELECT dormlink_maintenance_request.*, rooms.room_number FROM dormlink_maintenance_request JOIN rooms ON dormlink_maintenance_request.room_id = rooms.room_id WHERE category = :category AND maintenance_urgency = :maintenance_urgency AND date BETWEEN :maintenance_date_from AND :maintenance_date_to AND maintenance_status = :maintenance_status;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":category", $maintenance_category);
    $stmt->bindParam(":maintenance_urgency", $maintenance_urgency);
    $stmt->bindParam(":maintenance_date_from", $maintenance_date_from);
    $stmt->bindParam(":maintenance_date_to", $maintenance_date_to);
    $stmt->bindParam(":maintenance_status", $maintenance_status);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
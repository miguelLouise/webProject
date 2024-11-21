<?php

function get_monthly_reservations(object $pdo, $start_date, $end_date){
    $query = "SELECT MONTH(reservation_date) AS month_name, COUNT(*) AS total_rows
              FROM dormlink_reservations WHERE reservation_date BETWEEN :start_date AND :end_date
              GROUP BY MONTH(reservation_date) ORDER BY MONTH(reservation_date) ASC;";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":start_date", $start_date);
    $stmt->bindParam(":end_date", $end_date);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_dormlink_tenants(object $pdo,  $start_date, $end_date){
    $query = "SELECT
              MONTH(start_of_contract) AS month_name,
              COUNT(CASE WHEN user_id IS NOT NULL THEN 1 ELSE NULL END) AS online_tenants,
              COUNT(CASE WHEN user_id IS NULL THEN 1 ELSE NULL END) AS walkin_tenants
              FROM dormlink_tenants WHERE start_of_contract BETWEEN :start_date AND :end_date AND is_deleted = 0
              GROUP BY MONTH(start_of_contract) ORDER BY MONTH(start_of_contract) ASC;";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":start_date", $start_date);
    $stmt->bindParam(":end_date", $end_date);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_maintenance_request(object $pdo,  $start_date, $end_date){
    $query = "SELECT
              MONTH(date) AS month_name,
              COUNT(*) AS total_maintenance,
              COUNT(CASE WHEN is_archived = 0 THEN 1 ELSE NULL END) AS active_maintenance,
              COUNT(CASE WHEN is_archived = 1 THEN 1 ELSE NULL END) AS solved_maintenance
              FROM dormlink_maintenance_request WHERE date BETWEEN :start_date AND :end_date
              GROUP BY MONTH(date) ORDER BY MONTH(date) ASC;";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":start_date", $start_date);
    $stmt->bindParam(":end_date", $end_date);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

//END DATE ONLY
function get_monthly_reservations_end_date(object $pdo, $end_date){
    $query = "SELECT MONTH(reservation_date) AS month_name, COUNT(*) AS total_rows
              FROM dormlink_reservations WHERE reservation_date <= :end_date
              GROUP BY MONTH(reservation_date) ORDER BY MONTH(reservation_date) ASC;";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":end_date", $end_date);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_dormlink_tenants_end_date(object $pdo, $end_date){
    $query = "SELECT
              MONTH(start_of_contract) AS month_name,
              COUNT(CASE WHEN user_id IS NOT NULL THEN 1 ELSE NULL END) AS online_tenants,
              COUNT(CASE WHEN user_id IS NULL THEN 1 ELSE NULL END) AS walkin_tenants
              FROM dormlink_tenants WHERE start_of_contract <= :end_date AND is_deleted = 0
              GROUP BY MONTH(start_of_contract) ORDER BY MONTH(start_of_contract) ASC;";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":end_date", $end_date);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_maintenance_request_end_date(object $pdo, $end_date){
    $query = "SELECT
              MONTH(date) AS month_name,
              COUNT(*) AS total_maintenance,
              COUNT(CASE WHEN is_archived = 0 THEN 1 ELSE NULL END) AS active_maintenance,
              COUNT(CASE WHEN is_archived = 1 THEN 1 ELSE NULL END) AS solved_maintenance
              FROM dormlink_maintenance_request WHERE date <= :end_date
              GROUP BY MONTH(date) ORDER BY MONTH(date) ASC;";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":end_date", $end_date);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

//START DATE ONLY
function get_monthly_reservations_start_date(object $pdo, $start_date){
    $query = "SELECT MONTH(reservation_date) AS month_name, COUNT(*) AS total_rows
              FROM dormlink_reservations WHERE reservation_date  >= :start_date
              GROUP BY MONTH(reservation_date) ORDER BY MONTH(reservation_date) ASC;";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":start_date", $start_date);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_dormlink_tenants_start_date(object $pdo, $start_date){
    $query = "SELECT
              MONTH(start_of_contract) AS month_name,
              COUNT(CASE WHEN user_id IS NOT NULL THEN 1 ELSE NULL END) AS online_tenants,
              COUNT(CASE WHEN user_id IS NULL THEN 1 ELSE NULL END) AS walkin_tenants
              FROM dormlink_tenants WHERE start_of_contract  >= :start_date AND is_deleted = 0
              GROUP BY MONTH(start_of_contract) ORDER BY MONTH(start_of_contract) ASC;";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":start_date", $start_date);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_maintenance_request_start_date(object $pdo, $start_date){
    $query = "SELECT
              MONTH(date) AS month_name,
              COUNT(*) AS total_maintenance,
              COUNT(CASE WHEN is_archived = 0 THEN 1 ELSE NULL END) AS active_maintenance,
              COUNT(CASE WHEN is_archived = 1 THEN 1 ELSE NULL END) AS solved_maintenance
              FROM dormlink_maintenance_request WHERE date >= :start_date
              GROUP BY MONTH(date) ORDER BY MONTH(date) ASC;";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":start_date", $start_date);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


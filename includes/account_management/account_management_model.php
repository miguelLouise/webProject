<?php

function get_user_info(object $pdo, string $user_id){
    $query = "SELECT * FROM users WHERE user_id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();

    $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user_data;
}

function update_user_info(object $pdo, $user_id, $contact_number, $email){
    $query = "UPDATE users SET contact_number = :contact_number, email = :email WHERE user_id = :user_id;";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":contact_number", $contact_number);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();
}

function update_user_password(object $pdo, $user_id, $password){
    $query = "UPDATE users SET password = :password WHERE user_id = :user_id;";
    $stmt = $pdo->prepare($query);

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":password", $hashed_password);

    $stmt->execute();
}
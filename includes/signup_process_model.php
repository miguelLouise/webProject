<?php

function get_email(object $pdo, string $email)
{
    $query = "SELECT email FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function signup_user(object $pdo, $name, $contact_number, $email, $birthday, $password, $account_activation_hash)
{
    $query = "INSERT INTO users (name, contact_number, email, birthday, password, account_activation_hash) VALUES (:name, :contact_number, :email,  :birthday, :password, :account_activation_hash);";
    $stmt = $pdo->prepare($query);

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":contact_number", $contact_number);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":birthday", $birthday);
    $stmt->bindParam(":password", $hashed_password);
    $stmt->bindParam(":account_activation_hash", $account_activation_hash);
    $stmt->execute();
}

function select_user_by_activation_token_hash(object $pdo, $account_activation_hash){
    $query = "SELECT * FROM users WHERE account_activation_hash = :account_activation_hash;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":account_activation_hash", $account_activation_hash);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_activation_token_to_null(object $pdo, $user_id){
    $query = "UPDATE users SET account_activation_hash = NULL WHERE user_id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();
}
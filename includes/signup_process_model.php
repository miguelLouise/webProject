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

function signup_user(object $pdo, $name, $contact_number, $email, $birthday, $password)
{
    $query = "INSERT INTO users (name, contact_number, email, birthday, password) VALUES (:name, :contact_number, :email,  :birthday, :password);";
    $stmt = $pdo->prepare($query);

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":contact_number", $contact_number);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":birthday", $birthday);
    $stmt->bindParam(":password", $hashed_password);
    $stmt->execute();
}

<?php

function get_user_info(object $pdo, string $username)
{
    $query = "SELECT * FROM users WHERE email = :username;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user_data;
}

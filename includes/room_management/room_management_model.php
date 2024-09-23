<?php

function getRoomMngmtTable(object $pdo)
{
    $query = "SELECT * FROM dormlink_rooms";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

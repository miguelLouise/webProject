<?php

$host = '127.0.0.1';
$dbname = 'Dormlink';
$dbusername = 'root';
$dbpassword = '';

try {
    $dbconn = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);

    $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection Failed: " . $e->getMessage());
}

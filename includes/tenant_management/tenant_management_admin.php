<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    try {
        $name = $_POST["name"];
        echo $name;
    } catch (PDOException $e) {
      die("Query failed" . $e->getMessage());
    }
} else {
    header("Location: ../../tenant_management_page_admin.php");
    die();
}
<?php
require_once "./includes/login/login_view.php";
require_once "./includes/tenant_management/tenant_management_model.php";
require_once "./includes/tenant_management/tenant_management_view.php";
require_once './includes/dbh.inc.php';
require_once './includes/room_management/room_management_view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css//hjhjh.css">
</head>
<body>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="Email">

    <button type="submit">Sign up</button>
</body>
</html>
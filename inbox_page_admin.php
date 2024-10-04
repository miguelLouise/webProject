<?php
require_once "./includes/login/login_view.php";
include "./middleware/admin_middleware.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css//inbox_admin.css">
</head>
<body>
    <!-- header -->
    <?php include('./templates/logged_in_header_admin.php'); ?>
    <!-- header -->

    <!-- page content -->
    <div class="inbox_admin_container1">
        admin inbox
    </div>
</body>
</html>
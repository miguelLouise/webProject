<?php
require_once './includes/dbh.inc.php';
require_once './includes/room_management/room_management_view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation - Admin</title>
    <link rel="stylesheet" href="css/reservation_management_admin.css">
</head>
<body>
    <!-- header -->
    <?php include('./templates/logged_in_header.php'); ?>
    <!-- header -->

    <div class="reservation_management_contaienr1">
        <?php $output = show_reservation_table($dbconn);
        print_r($output);
        ?>
    </div>

</body>
</html>
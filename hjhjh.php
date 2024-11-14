<?php
require_once './includes/login/login_view.php';
require_once './includes/tenant_management/tenant_management_model.php';
require_once './includes/tenant_management/tenant_management_view.php';
require_once './includes/dbh.inc.php';
require_once './includes/room_management/room_management_model.php';
require_once 'includes/dp_management/downpayment_management_view.php';
include "./middleware/user_middleware.php";
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
<?php
$get_room_status =  get_room_status ($dbconn);
print_r($get_room_status[0]);
print_r($get_room_status[1]);
print_r($get_room_status[2]);

$var = "Available";

if ($var === $get_room_status[0]) {
    echo "match";
} else {
    echo "not match";
}

does_user_have_a_reservation($dbconn, $_SESSION["user_id"]);
?>
</body>
</html>
<?php
require_once './includes/login/login_view.php';
require_once './includes/tenant_management/tenant_management_model.php';
require_once './includes/tenant_management/tenant_management_view.php';
require_once './includes/dbh.inc.php';
require_once './includes/room_management/room_management_model.php';
require_once 'includes/dp_management/downpayment_management_view.php';
require_once 'includes/account_management/account_management_model.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css//hjhjh.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
</head>
<body>
<?php
date_default_timezone_set('Asia/Manila');

// $currentDate = date("F d, Y h:i A");
echo $datetime = date("Y-m-d");
echo $time = date("H:i");
echo '<br>';
$get_user_info = get_user_info($dbconn, 3);

print_r($get_user_info);
?>
<script>

window.addEventListener('popstate', function() {
    console.log("test");
});


</script>
</body>
</html>
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
    <link rel="stylesheet" href="css/hjhjh.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <style>
        .message_container{
            font-family: 'Montserrat', sans-serif;
            font-size: 18px;
            font-weight: 600;
            background-color: rgb(255, 255, 255);
            position: absolute;
            height: 25%;
            width: 35%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            /* text-align: right; */
            justify-content: center;
            border: 2px solid rgb(137, 137, 137);
            font-size: 18px;
            box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
        }

        @media (max-width: 950px) {
        .message_container{
            width: 45%;
        }

        @media (max-width: 690px) {
        .message_container{
            height: 40%;
            width: 60%;
        }

        @media (max-width: 431px) {
        .message_container{
            height: 40%;
            width: 80%;
        }
        }
    </style>

</head>
<body>
<div class="message_container" id="message_container">TEST MESSAGE</div>

</body>
</html>
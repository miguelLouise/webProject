<?php
require_once 'dbh.inc.php';
require_once 'signup_process_model.php';

$token = $_GET["token"];

$token_hash = hash("sha256", $token);


$select_user_by_activation_token_hash = select_user_by_activation_token_hash($dbconn, $token);

if ($select_user_by_activation_token_hash === null) {
    die("token not found");
}

set_activation_token_to_null($dbconn, $select_user_by_activation_token_hash['user_id']);

session_start();
$_SESSION["account_activated"] = "Account has been activated";

header('Location: ../login_page.php');
die();


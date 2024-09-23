<?php

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

session_start();

if (!isset($_SESSION["last_regen"])) {
    session_regenerate_id();
    $_SESSION["last_regen"] = time();
} else {
    $interval = 60 * 30;
    if (time() - $_SESSION["last_regen"] >= $interval) {
        session_regenerate_id();
        $_SESSION["last_regen"] = time();
    }
}

// if (isset($_SESSION["user_id"])) {
//     if (!isset($_SESSION["last_regen"])) {
//         session_regenerate_id();
//         $_SESSION["last_regen"] = time();
//     } else {
//         $interval = 60 * 30;
//         if (time() - $_SESSION["last_regen"] >= $interval) {
//             session_regenerate_id();
//             $_SESSION["last_regen"] = time();
//         }
//     }
// } else {
// }

// function regenerate_session_id_logged_in()
// {
//     session_regenerate_id();
//     $_SESSION["last_regen"] = time();
// }

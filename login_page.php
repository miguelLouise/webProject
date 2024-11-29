<?php
require_once './includes/login/login_view.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dormlink - Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .floating-fb-btn {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 1000;
            background-color: #42326E;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.3);
        }

        .floating-fb-btn img {
            width: 70px;
            height: 700px;
            object-fit: contain;
        }
    </style>
</head>

<body style="background-image: url('Assets/lavanderBLDG.jpg'); background-repeat: no-repeat; background-position: center; background-size: cover;">
    <div class="container">
        <!-- header -->
        <?php include('./templates/header.php'); ?>
        <!-- header -->


        <div class="container2">
        <?php disappearing_login_success_message("account_activated"); ?>
        <?php disappearing_login_success_message("account_activation_error"); ?>
            <div class="container3">
                <h1>Login</h1>
                <form action="./includes/login/login.php" method="post" id="login" novalidate>

                    <div class="input-group">
                        <label for="name">Email <span style="color: red;"><?php display_login_error("username_error");?></span></label>
                        <input type="text" id="name" name="username" placeholder="Email" value="<?php displayInfo("username") ?>">
                    </div>


                    <div class="input-group">
                        <label for="password">Password <span style="color: red;"><?php display_login_error("password_error") ?></span></label>
                        <input type="password" id="password" name="user_password" placeholder="Password">
                        <i class="bi bi-eye-slash-fill" id="hide"></i>
                    </div>

                    <button type="submit">Log in</button>

                    <a href="signup_page.php" class="signup_link">Sign up</a>
                </form>
            </div>
        </div>
    </div>
    <!-- javascript -->
    <script src="javascript/login_page.js"></script>
    <a href="https://web.facebook.com/1277apartments/?_rdc=1&_rdr" target="_blank" class="floating-fb-btn">
        <img src="Assets/fbpc.png" alt="Facebook Icon">
    </a>
</body>

</html>
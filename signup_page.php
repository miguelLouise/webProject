<?php
// require_once 'includes/config.php';
require_once 'includes/signup_process_view.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dormlink - Signup</title>
    <link rel="stylesheet" href="css//signup.css">
    <style>
        .floating-fb-btn {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 1000;
            background-color: ##42326E;
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

<body>
    <div class="container">
        <!-- header -->
        <?php include('./templates/header.php'); ?>
        <!-- header -->

        <!-- page content -->
        <div class="container2">
            <div class="sub_con1"><?php signup_success_message("signup_success") ?></div>
            <div class="container3">
                <h1>Signup</h1>
                <form action="./includes/signup_process.php" method="post" id="signup" novalidate>
                    <div class="input-group">
                        <label for="name">Name <span style="color: red;"><?php display_signup_error("name_error") ?></span></label>
                        <input type="text" id="name" name="name" placeholder="Name">
                    </div>

                    <div class=" input-group">
                        <label for="contact_number">Contact Number <span style="color: red;"><?php display_signup_error("contact_number_error") ?></span></label>
                        <input type="text" id="contact_number" name="contact_number" placeholder="Contact Number">
                    </div>

                    <div class="input-group">
                        <label for="email">Email <span style="color: red;"><?php display_signup_error("email_error") ?></span></label>
                        <input type="email" id="email" name="email" placeholder="Email">
                    </div>

                    <div class="input-group">
                        <label for="birthday">Birthday <span style="color: red;"><?php display_signup_error("birthday_error") ?></span></label>
                        <input type="date" id="birthday" name="birthday">
                    </div>

                    <div class="input-group">
                        <label for="password">Password <span style="color: red;"><?php display_signup_error("password_error") ?></span></label>
                        <input type="password" id="password" name="password" placeholder="Password">

                    </div>

                    <div class="input-group">
                        <label for="password_confirmation">Repeat Password <span style="color: red;"><?php display_signup_error("password_confirmation_error") ?></span></label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                    </div>

                    <button type="submit">Sign up</button>
                </form>
                Already have an account? <a href="login_page.php" class="login_link">login</a>

            </div>
            <!-- page content -->
        </div>
    </div>
            <!-- Floating Facebook Button -->
    <a href="https://web.facebook.com/1277apartments/?_rdc=1&_rdr" target="_blank" class="floating-fb-btn">
        <img src="Assets/fbpc.png" alt="Facebook Icon">
    </a>
</body>

</html>
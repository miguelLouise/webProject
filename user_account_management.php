<?php
require_once './includes/login/login_view.php';
include './middleware/user_middleware.php';
require_once './includes/account_management/account_management_view.php';
require_once 'includes/room_management/room_management_view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Management</title>
    <link rel="stylesheet" href="css/user_account_management.css">
</head>
<body>
    <!-- header -->
    <?php include('templates/logged_in_header.php'); ?>
    <!-- header -->

    <div class="user_account_div">

        <div class="user_account_div1">Edit Profile
        <form action="includes/account_management/account_management.php" method="post" novalidate>
            <input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"]; ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo $_SESSION["user_name"]; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="email">Email <span style="color: red;"><?php account_management_message("email_error"); ?></span></label>
                <input type="email" id="email" name="email" value="<?php echo $_SESSION["user_email"]; ?>">
            </div>

            <div class="form-group">
                <label for="contact_number">Contact Number<span style="color: red;"><?php account_management_message("contact_number_error"); ?></span></label>
                <input type="text" id="contact_number" name="contact_number" value="<?php echo $_SESSION["user_num"]; ?>">
            </div>

            <div class="form-group">
                <label for="password">Current Password<span style="color: red;"><?php account_management_message("current_user_password_error"); ?></span></label>
                <input type="password" id="current_password" name="current_user_password" placeholder="Password">
                <i class="bi bi-eye-slash-fill" id="current_hide"></i>
            </div>

            <div class="form-group">
                <label for="password">New Password<span style="color: red;"><?php account_management_message("new_user_password_error"); ?></span></label>
                <input type="password" id="new_password" name="new_user_password" placeholder="Password">
                <i class="bi bi-eye-slash-fill" id="new_hide"></i>
            </div>
            <button type="submit">Apply Changes</button>
            <?php disappearing_success_message("account_updated"); ?>
            </form>
        </div>
    </div>

    <script>
        const current_hide = document.getElementById("current_hide");
        const new_hide = document.getElementById("new_hide");
        const current_password = document.getElementById("current_password");
        const new_password = document.getElementById("new_password");

        current_hide.onclick = (icon) => {
            if (current_password.type == "password") {
                current_password.type = "text";
                current_hide.className = 'bi-eye-fill';
            } else {
                current_password.type = "password";
                current_hide.className = 'bi-eye-slash-fill';
            }
        }

        new_hide.onclick = (icon) => {
            if (new_password.type == "password") {
                new_password.type = "text";
                new_hide.className = 'bi-eye-fill';
            } else {
                new_password.type = "password";
                new_hide.className = 'bi-eye-slash-fill';
            }
        }

        // trim whitespaces in email login
        const input = document.getElementById("name");
        input.value = input.value.trim();
    </script>
</body>
</html>
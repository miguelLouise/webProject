<?php
require_once './includes/dbh.inc.php';
require_once './includes/account_management/account_management_view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<<<<<<< HEAD
    <link rel="stylesheet" href="../css/logged_in_header.css">
=======
    <link rel="stylesheet" href="/css//logged_in_header.css">
>>>>>>> 08aa88696f7510739278db19c899069ffdc27a13
</head>
<body>
    <div class="logged_in_header_container1">
        <div class="logged_in_header_container2">
            <a href="../user_homepage.php"><img src="../Assets/DDLOGO.png" class="logo" id="logo" alt="DormLink Logo"></a>

            <!-- Header buttons -->
            <div class="header_buttons" id="header_buttons">
                <a href="../user_homepage.php" class="header_button" data-title="Home">Home</a>
                <a href="../maintenance_request_page.php" class="header_button" data-title="Maintenance Request">Maintenance Request</a>
                <a href="../aboutus.php" class="header_button" data-title="About Us">About Us</a>
                <a href="../contactus.php" class="header_button" data-title="Contact Us">Contact Us</a>
            </div>

            <!-- <div class="notif_icon_con">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000" id="notification_icon" class="notification_icon"><path d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z"/></svg>
            <div class="notif_con1" id="notif_con1">
                    notification box
                    contents
                </div>
            </div> -->

            <div class="side_nav_icon" id="side_nav_icon">
                <img src="../Assets/profl.png" class="profile_icon" id="profile_icon">
            </div>
        </div>


    </div>

    <!-- Side navigation -->
    <div class="side_nav_div" id="side_nav_div">
        <div class="side_nav" id="menu_nav">
            <div class="user_info">
                <img src="../Assets/profile.png" class="user_icon" id="user_icon">
                    <div class="side_nav_con1">
                        <?php show_user_information_name($dbconn, $_SESSION["user_id"]); ?>
                        <br>
                        <?php show_user_information_email($dbconn, $_SESSION["user_id"]); ?>
                    </div>
            </div>

            <div class="side_nav_con2">
                <ul class="side_nav_btn" id="side_nav_btn">
                    <li><a href="../user_homepage.php" class="page_link_btn"><button class="nav_btn"><img src="../Assets/home.png" class="nav_icon">Home</button></a></li>
                    <li><a href="../messaging_page.php" class="page_link_btn"><button class="nav_btn"><img src="../Assets/mail.png" class="nav_icon">Send us an email</button></a></li>
                    <li><a href="../reservation.php" class="page_link_btn"><button class="nav_btn"><img src="../Assets/reservation.png" class="nav_icon">Reservation</button></a></li>
                    <li><a href="../payment_page.php" class="page_link_btn"><button class="nav_btn"><img src="../Assets/wallet.png" class="nav_icon">Partial Payment</button></a></li>
                    <li><a href="../user_account_management.php" class="page_link_btn"><button class="nav_btn"><img src="../Assets/account.png" class="nav_icon">Account Management</button></a></li>
                        <form action="../includes/logout/logout.php" method="post" id="login" novalidate>
                            <button type="submit" class="nav_btn">
                                <img src="../Assets/logout.png" class="nav_icon">Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $(document).on("click", "#notification_icon", function() {
                const notif_box = document.getElementById("notif_con1");

                $(notif_box).toggle();
            });

            // side nav
            $(document).on("click", "#profile_icon", function() {
                right_position = $("#menu_nav").css("right");
                width = $("#menu_nav").css("width");

                if (right_position == "-270px"){
                    $("#menu_nav").css("right", "0px");
                } else {
                    $("#menu_nav").css("right", "-270px");
                }
            });
        });
    </script>
</body>
</html>
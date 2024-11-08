<?php
require_once 'includes/login/login_view.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/logged_in_header.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>

<body>
    <div class="logged_in_header_container1">
        <div class="logged_in_header_container2">
            <a href="../user_homepage.php"><img src="../Assets/DDLOGO.png" class="logo" alt="DormLink Logo"></a>
        </div>
        
        <!-- Header buttons -->
        <div class="header_buttons">
            <a href="../user_homepage.php" class="header_button" data-title="Home">Home</a>
            <a href="../maintenance_request_page.php" class="header_button" data-title="Maintenance Request">Maintenance Request</a>
            <a href="../aboutus.php" class="header_button" data-title="About Us">About Us</a>
            <a href="#contactus" class="header_button" data-title="Contact Us">Contact Us</a>
            <!-- <a href="../messaging_page.php" class="header_button" data-title="Message/Inquire">Message/Inquire</a>-->
            <!--<a href="../reservation.php" class="header_button" data-title="Reservation">Reservation</a>-->
        </div>
        
        <div class="side_nav_icon">
            <img src="../Assets/profl.png" id="menu_btn" class="profile_icon">
        </div>
    </div>

    <!-- Side navigation -->
    <div class="side_nav_div">
        <div class="side_nav" id="menu_nav">
            <div class="user_info">
                <div class="side_nav_con1">
                <img src="../Assets/profile.png" class="nav_icon">
                <h1 class="head1">User Profile</h1>
                </div>
            </div>

            <div class="side_nav_con2">
                <ul>
                    <li><a href="../user_homepage.php"><button class="nav_btn"><img src="../Assets/home.png" class="nav_icon">Home</button></a></li>
                    <!-- <li><a href="../maintenance_request_page.php"><button class="nav_btn"><img src="../Assets/maintenancereq.png" class="nav_icon">Maintenance Request</button></a></li>-->
                    <!--<li><a href="../messaging_page.php"><button class="nav_btn"><img src="../Assets/mail.png" class="nav_icon">Message/Inquire</button></a></li>-->
                    <li><a href="../reservation.php"><button class="nav_btn"><img src="../Assets/reservation.png" class="nav_icon">Reservation</button></a></li>
                    <li><a href="../payment_page.php"><button class="nav_btn"><img src="../Assets/wallet.png" class="nav_icon">Partial Payment</button></a></li>
                    <li><a href="#accountmanagement"><button class="nav_btn"><img src="../Assets/account.png" class="nav_icon">Account Management</button></a></li>
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

    <!-- Javascript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuBtn = document.getElementById('menu_btn');
            const menuNav = document.getElementById("menu_nav");

            menuBtn.addEventListener("click", function() {
                const rightPos = window.getComputedStyle(menuNav).getPropertyValue("right");

                if (rightPos === "-300px") { 
                    menuNav.style.right = "0";
                } else {
                    menuNav.style.right = "-300px";
                }
            });
        });
    </script>
</body>

</html>

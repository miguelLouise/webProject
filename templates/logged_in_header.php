<?php
require_once 'includes/login/login_view.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
    <link rel="stylesheet" href="css//logged_in_header.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>

<body>
    <div class="logged_in_header_container1">
        <div class="logged_in_header_container2">
            <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#E0D4FC" id="menu_btn">
                <path d="M120-240v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z" />
            </svg>
            <a href="../user_homepage.php"><img src="../Assets/DDLOGO.png" class="logo" alt="DormLink Logo"></a>
        </div>
    </div>

    <!-- side navigation bar -->
    <div class="side_nav_div">
        <div class="side_nav" id="menu_nav">
        <div class="user_info">     
                <div class="side_nav_con1">
                    <img src="../Assets/profile.png" class="nav_icon">
                    <h1 class="head1">User Profile</h1> 
                </div>       
                    <div class="info"><?php display_user_info() ?></div>                                    
            </div>

            <div class="side_nav_con2">
                <ul>
                <li><a href="../user_homepage.php"><button class="nav_btn"><img src="../Assets/home.png" class="nav_icon">Home</button></a></li>
                <li><a href="../maintenance_request_page.php"><button class="nav_btn"><img src="../Assets/maintenancereq.png" class="nav_icon">Maintenance Request</button></a></li>
                <li><a href="#userpayment"><button class="nav_btn"><img src="../Assets/wallet.png" class="nav_icon">Payment</button></a></li>
                <li><a href="#inbox"><button class="nav_btn"><img src="../Assets/mail.png" class="nav_icon">Inbox</button></a></li>
                <li><a href="../reservation.php"><button class="nav_btn"><img src="../Assets/mail.png" class="nav_icon">reservation</button></a></li>
                <li><a href="#roomAvailability"><button class="nav_btn"><img src="../Assets/door.png" class="nav_icon">Room Availability</button></a></li>
                <li><a href="#reserve_inquire"><button class="nav_btn"><img src="../Assets/clipboard.png" class="nav_icon">Reserve/Inquire</button></a></li>
                <li><a href="#accountmanagement"><button class="nav_btn"><img src="../Assets/account.png" class="nav_icon">Account management</button></a></li>

                <li>
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
                const leftPos = window.getComputedStyle(menuNav).getPropertyValue("left");

                if (leftPos > "0") {
                    menuNav.style.left = "-300px";
                } else {
                    menuNav.style.left = "0";
                }
            })
        })
    </script>
</body>

</html>
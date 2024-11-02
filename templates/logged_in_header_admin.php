<?php
require_once 'includes/login/login_view.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
    <link rel="stylesheet" href="css//logged_in_header_admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>

<body>
    <div class="logged_in_header_container1">
        <div class="logged_in_header_container2">
            <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#E0D4FC" id="menu_btn">
                <path d="M120-240v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z" />
            </svg>
            <a href="../admin_dashboard.php"><img src="../Assets/DDLOGO.png" class="logo" alt="DormLink Logo"></a>
        </div>
        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16" id="notif_icon">
          <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901"/>
        </svg>-->
    </div>

    <!-- side navigation bar -->
    <div class="side_nav_div">
        <div class="side_nav" id="menu_nav">
            <div class="user_info">     
                <div class="side_nav_con1">
                    <img src="../Assets/profile.png" class="nav_icon">
                    <h1 class="head1">Admin Profile</h1>
                </div>                                        
            </div>
           
            <div class="side_nav_con2">
                <ul>
                <li><a href="../admin_dashboard.php"><button class="nav_btn"><img src="../Assets/home.png" class="nav_icon">Home</button></a></li>
                <li><a href="../payment_page_admin.php"><button class="nav_btn"><img src="../Assets/wallet.png" class="nav_icon">Billing</button></a></li>
                <li><a href="../reservation_management_page_admin.php"><button class="nav_btn"><img src="../Assets/reservation.png" class="nav_icon">Reservations</button></a></li>
                <li><a href="#maintenencemanagement"><button class="nav_btn"><img src="../Assets/maintenancereq.png" class="nav_icon">Maintenance Management</button></a></li>
                <li><a href="../inbox_page_admin.php"><button class="nav_btn"><img src="../Assets/inbox.png" class="nav_icon">Inbox</button></a></li>
                <li><a href="../room_management_page_admin.php"><button class="nav_btn"><img src="../Assets/door.png" class="nav_icon">Room Management</button></a></li>
                <li><a href="#dataanalytics"><button class="nav_btn"><img src="../Assets/chart.png" class="nav_icon">Data Analytics</button></a></li>
                <li><a href="../maintenance_request_management.php"><button class="nav_btn"><img src="../Assets/maintenancereq.png" class="nav_icon">Maintenance Management</button></a></li>
                <li><a href="../room_management_page_admin.php"><button class="nav_btn"><img src="../Assets/door.png" class="nav_icon">Room Management</button></a></li>
                <li><a href="../data_analytics_page.php"><button class="nav_btn"><img src="../Assets/chart.png" class="nav_icon">Data Analytics</button></a></li>
                <li><a href="../tenant_management_page_admin.php"><button class="nav_btn"><img src="../Assets/tenants.png" class="nav_icon">Manage Tenants</button></a></li>
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
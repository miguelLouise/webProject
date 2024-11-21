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
    </div>

    <!-- side navigation bar -->
    <div class="side_nav_div">
        <div class="side_nav" id="menu_nav">
            <div class="side_nav_con2">
                <ul>
                <li><a href="../admin_dashboard.php"><button class="nav_btn"><img src="../Assets/home.png" class="nav_icon">Home</button></a></li>
                <li><a href="../reservation_management_page_admin.php"><button class="nav_btn"><img src="../Assets/reservation.png" class="nav_icon">Reservations</button></a></li>
                <li><a href="../data_analytics_page.php"><button class="nav_btn"><img src="../Assets/chart.png" class="nav_icon">Data Analytics</button></a></li>
                <li><a href="../maintenance_request_management.php"><button class="nav_btn"><img src="../Assets/maintenancereq.png" class="nav_icon">Maintenance Management</button></a></li>
                <li><a href="../room_management_page_admin.php"><button class="nav_btn"><img src="../Assets/door.png" class="nav_icon">Rooms</button></a></li>
                <li><a href="../tenant_management_page_admin.php"><button class="nav_btn"><img src="../Assets/tenants.png" class="nav_icon">Manage Tenants</button></a></li>
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
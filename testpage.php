<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css///testpage.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>

<body>

    <div class="container1">
        <!-- header -->
        <?php include('./templates/logged_in_header.php'); ?>
        <!-- <div class="container2">
            <i class="bi bi-list" id="menu_btn"></i>
            <a href="../" class="logo_con"><img src="Assets/DDLOGO.png" class="logo" alt="DormLink Logo"></a>
        </div> -->
        <!-- header -->

        <!-- page content -->
        <!-- <div class="side_nav_div">
            <div class="side_nav" id="menu_nav">
                <h1>user info</h1>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Search Available Rooms</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#contact">Account managmement</a></li>
                    <li><a href="#contact">Logout</a></li>
                </ul>
            </div>

            <div class="content_div">
                this is where the page content goes
            </div>
        </div> -->
    </div>

    <!-- Javascript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuBtn = document.getElementById('menu_btn');
            const menuNav = document.getElementById("menu_nav");

            menuBtn.addEventListener("click", function() {
                const aaa = window.getComputedStyle(menuNav);
                const leftPos = window.getComputedStyle(menuNav).getPropertyValue("left");

                if (leftPos > "0") {
                    menuNav.style.left = "-300px";
                } else {
                    menuNav.style.left = "0";
                }
                console.log(aaa.left);
            })
        })
    </script>

</body>

</html>
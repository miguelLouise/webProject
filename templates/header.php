<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="..//css/header.css">
</head>

<body>
    <div class="header_container1">
        <div class="header_container2">
            <a href="../"><img src="../Assets/DDLOGO.png" class="logo" alt="DormLink Logo"></a>

            <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="40px" fill="#42326e" id="menu_btn">
                <path d="M105.87-219.09v-79.78H854.7v79.78H105.87Zm0-221.3v-79.22H854.7v79.22H105.87Zm0-220.74v-79.78H854.7v79.78H105.87Z" />
            </svg>
        </div>
    </div>

    <div class="header_container3" id="menu_div">
        <a href="../signup_page.php" id="signup_btn">Signup</a>
        <a href="../login_page.php" id="login_btn">Login</a>
    </div>

    <!-- Javascript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuBtn = document.getElementById('menu_btn');
            const menuNav = document.getElementById("menu_div");

            menuBtn.addEventListener("click", function() {
                const aaa = window.getComputedStyle(menuNav);
                const topPos = window.getComputedStyle(menuNav).getPropertyValue("top");

                if (topPos == "0px") {
                    menuNav.style.top = "70px";
                } else {
                    menuNav.style.top = "0";
                }
                console.log(aaa.top);
            })
        })
    </script>
</body>

</html>
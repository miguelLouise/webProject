<?php
require_once './includes/login/login_view.php';
require_once './includes/tenant_management/tenant_management_model.php';
require_once './includes/tenant_management/tenant_management_view.php';
require_once './includes/dbh.inc.php';
require_once './includes/room_management/room_management_model.php';
require_once 'includes/dp_management/downpayment_management_view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css//hjhjh.css">
</head>
<body>
<div class="sliders-container">
        <!-- Room Slider 1 -->
        <div class="slider-box">
            <div class="slider">
                    <img class="slide" style="background-image: url('Assets/room1pic1.png');">
                    <img class="slide" style="background-image: url('Assets/room1pic2.png');"></img>
                    <img class="slide" style="background-image: url('Assets/room1pic4.png');"></img>
                    <img class="slide" style="background-image: url('Assets/room1pic5.png');"></img>
                    <img class="slide" style="background-image: url('Assets/room1pic6.png');"></img>
                    <img class="slide" style="background-image: url('Assets/room1pic7.png');"></img>
                    <img class="slide" style="background-image: url('Assets/room1pic8.png');"></img>
                </div>
                <button class="prev" onclick="moveSlide(-1, 0)">&#10094;</button>
                <button class="next" onclick="moveSlide(1, 0)">&#10095;</button>
                </div>
            <h3>Studio Type Room 1</h3>
            <p>Images Preview</p>
        </div>

        <!-- Slider 2 -->
        <div class="slider-box">
            <div class="slider">
                <div class="slides" id="slider2">
                    <div class="slide" style="background-image: url('Assets/room2pic1.png');"></div>
                    <div class="slide" style="background-image: url('Assets/room2pic2.png');"></div>
                    <div class="slide" style="background-image: url('Assets/room2pic3.png');"></div>
                    <div class="slide" style="background-image: url('Assets/room2pic4.png');"></div>
                    <div class="slide" style="background-image: url('Assets/room2pic5.png');"></div>
                    <div class="slide" style="background-image: url('Assets/room2pic6.png');"></div>
                    <div class="slide" style="background-image: url('Assets/room2pic7.png');"></div>
                    <div class="slide" style="background-image: url('Assets/room2pic8.png');"></div>
                    <div class="slide" style="background-image: url('Assets/room2pic9.png');"></div>
                </div>
                <button class="prev" onclick="moveSlide(-1, 1)">&#10094;</button>
                <button class="next" onclick="moveSlide(1, 1)">&#10095;</button>
            </div>
            <h3>Studio Type Room 2</h3>
            <p>Images Preview </p>
        </div>

        <!-- Slider 3 -->
        <div class="slider-box">
            <div class="slider">
                <div class="slides" id="slider3">
                    <div class="slide" style="background-image: url('Assets/room3pic1.png');"></div>
                    <div class="slide" style="background-image: url('Assets/room3pic2.png');"></div>
                    <div class="slide" style="background-image: url('Assets/room3pic3.png');"></div>
                    <div class="slide" style="background-image: url('Assets/room3pic4.png');"></div>
                    <div class="slide" style="background-image: url('Assets/room3pic5.png');"></div>
                    <div class="slide" style="background-image: url('Assets/room3pic6.png');"></div>
                    <div class="slide" style="background-image: url('Assets/room3pic7.png');"></div>
                    <div class="slide" style="background-image: url('Assets/room3pic8.png');"></div>
                    <div class="slide" style="background-image: url('Assets/room3pic9.png');"></div>
                </div>
                <button class="prev" onclick="moveSlide(-1, 2)">&#10094;</button>
                <button class="next" onclick="moveSlide(1, 2)">&#10095;</button>
            </div>
            <h3>Studio Type Room 3</h3>
            <p>Images Preview</p>
        </div>

        <!-- Slider 4 -->
        <div class="slider-box">
            <div class="slider">
                <div class="slides" id="slider4">
                    <div class="slide" style="background-image: url('Assets/room4pic1.png');"></div>
                    <div class="slide" style="background-image: url('Assets/room4pic2.png');"></div>
                    <div class="slide" style="background-image: url('Assets/room4pic3.png');"></div>
                    <div class="slide" style="background-image: url('Assets/room4pic4.png');"></div>
                </div>
                <button class="prev" onclick="moveSlide(-1, 3)">&#10094;</button>
                <button class="next" onclick="moveSlide(1, 3)">&#10095;</button>
            </div>
            <h3>Studio Type Room 3</h3>
            <p>Images Preview</p>
        </div>
    </div>
</body>
</html>
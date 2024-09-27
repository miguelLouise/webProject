<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dormlink</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container">
        <!-- Header -->
        <?php include('./templates/header.php'); ?>
        
        <!-- Page Content -->
        <div class="container2">
            <div class="text-overlay">
                <h1>LAVENDER PLACE</h1>
                <h2>1277 APARTMENTS</h2>
                <p>Lavanderos Manila</p>
            </div>
            <img src="Assets/slider.png" alt="slider">
            <img src="Assets/labas2.png" alt="labas2">
            <img src="Assets/labas.png" alt="loob">
            <img src="Assets/loob.png" alt="loob">
        </div>

        <!-- Room Slider -->
        <div class="room-slider">
            <div class="room-slider-header">
                <h2>Available Rooms</h2>
            </div>
            <div class="room-slider-container">
                <!-- Room 1 -->
                <div class="room-slider-item">
                    <div class="room-slider-images">
                        <div class="image-card"><img src="Assets/room1pic1.png" alt="Studio Room 1 Image 1"></div>
                        <div class="image-card"><img src="Assets/room1pic2.png" alt="Studio Room 1 Image 2"></div>
                        <div class="image-card"><img src="Assets/room1pic3.png" alt="Studio Room 1 Image 3"></div>
                        <div class="image-card"><img src="Assets/room1pic4.png" alt="Studio Room 1 Image 4"></div>
                    </div>
                    <div class="room-slider-description">
                        <h3>Studio Room 1</h3>
                        <p>Description for Studio Room 1...</p>
                    </div>
                </div>

                <!-- Room 2 -->
                <div class="room-slider-item">
                    <div class="room-slider-images">
                        <div class="image-card"><img src="Assets/room2pic1.png" alt="Studio Room 2 Image 1"></div>
                        <div class="image-card"><img src="Assets/room2pic2.png" alt="Studio Room 2 Image 2"></div>
                        <div class="image-card"><img src="Assets/room2pic3.png" alt="Studio Room 2 Image 3"></div>
                        <div class="image-card"><img src="Assets/room2pic4.png" alt="Studio Room 2 Image 4"></div>
                    </div>
                    <div class="room-slider-description">
                        <h3>Studio Room 2</h3>
                        <p>Description for Studio Room 2...</p>
                    </div>
                </div>

                <!-- Room 3 -->
                <div class="room-slider-item">
                    <div class="room-slider-images">
                        <div class="image-card"><img src="Assets/room3pic1.png" alt="Studio Room 3 Image 1"></div>
                        <div class="image-card"><img src="Assets/room3pic2.png" alt="Studio Room 3 Image 2"></div>
                        <div class="image-card"><img src="Assets/room3pic3.png" alt="Studio Room 3 Image 3"></div>
                        <div class="image-card"><img src="Assets/room3pic4.png" alt="Studio Room 3 Image 4"></div>
                    </div>
                    <div class="room-slider-description">
                        <h3>Studio Room 3</h3>
                        <p>Description for Studio Room 3...</p>
                    </div>
                </div>

                <!-- Room 4 -->
                <div class="room-slider-item">
                    <div class="room-slider-images">
                        <div class="image-card"><img src="Assets/room4pic1.png" alt="Studio Room 4 Image 1"></div>
                        <div class="image-card"><img src="Assets/room4pic2.png" alt="Studio Room 4 Image 2"></div>
                        <div class="image-card"><img src="Assets/room4pic3.png" alt="Studio Room 4 Image 3"></div>
                        <div class="image-card"><img src="Assets/room4pic4.png" alt="Studio Room 4 Image 4"></div>
                    </div>
                    <div class="room-slider-description">
                        <h3>Studio Room 4</h3>
                        <p>Description for Studio Room 4...</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container3">
            <p class="map-text">Come and Find us here!</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15443.854818264015!2d120.9953097!3d14.6011435!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9fbb3d6286b%3A0x76b86b0b5fffd23!2sLavender%20Place!5e0!3m2!1sen!2sph!4v1724571728226!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="container4">
            <div class="info">
                <h4>Lavender Place</h4>
                <p><img src="Assets/locationpin.gif" alt="Location Icon" class="icon"> 1277 Lavanderos St, Sampaloc, Manila, Metro Manila</p>
                <h4>Contact Us</h4>
                <p><img src="Assets/phoneicon.gif" alt="Phone Icon" class="icon"> 09977316010</p>
            </div>
        </div>

        <!-- Chatbot -->
        <?php include('./templates/chatbot.php'); ?>
    </div>

    <!-- Floating Facebook Button -->
    <a href="https://web.facebook.com/1277apartments/?_rdc=1&_rdr" target="_blank" class="floating-fb-btn">
        <img src="Assets/fbpc.png" alt="Facebook Icon">
    </a>

    <script src="JavaScript/index.js"></script>
</body>

</html>

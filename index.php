<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dormlink</title>
    <link rel="stylesheet" href="css///index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .floating-fb-btn {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 1000;
            background-color: ##42326E;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.3);
        }

        .floating-fb-btn img {
            width: 70px;
            height: 700px;
            object-fit: contain;
        }
    </style>

</head>

<body>
    <div class="container">
        <!-- header -->
        <?php include('./templates/header.php'); ?>
        <!-- header -->

        <!-- page content -->
        <div class="container2">
            <div class="text-overlay">
                <h1>LAVENDER PLACE</h1>
                <h2>1277 APARTMENTS</h2>
                <p>Lavanderos Manila</p>
            </div>
            <img src="Assets/slider.png" alt="slider">
            <img src="Assets/labas2.png" alt="labas2">
            <img src="Assets/labas.png" alt="labas">
            <img src="Assets/loob.png" alt="loob">
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

        <!-- chatbot -->
        <?php include('./templates/chatbot.php'); ?>
        <!-- chatbot -->
    </div>

    <script>
        let currentIndex = 0;
        const images = document.querySelectorAll('.container2 img');
        const totalImages = images.length;

        function showNextImage() {
            images[currentIndex].classList.remove('active');
            currentIndex = (currentIndex + 1) % totalImages;
            images[currentIndex].classList.add('active');
        }

        // Show the first image initially
        images[currentIndex].classList.add('active');

        // Change image every 3 seconds
        setInterval(showNextImage, 3000);
    </script>
    <!-- Floating Facebook Button -->
    <a href="https://web.facebook.com/1277apartments/?_rdc=1&_rdr" target="_blank" class="floating-fb-btn">
        <img src="Assets/fbpc.png" alt="Facebook Icon">
    </a>

</body>

</html>
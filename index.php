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

        <div class="custom-card-header">
                <h2>About Us</h2>
        </div>
        <div class="custom-card">
            <div class="custom-card-text">
                <h2 class="card-title">1277 Apartments (Lavanders Place)</h2>
                <p class="card-description">
                    is ideally located in the center of University Belt, offering a convenient and affordable living option. Designed for students and professionals, the residence focuses on creating a comfortable environment with modern amenities and well-maintained facilities. Lavender's Place is committed to addressing tenant concerns quickly, ensuring a smooth and stress-free stay for all residents.
                </p>
            </div>
            <div class="custom-card-image">
                <img src="Assets/lpview.jpg" alt="Lavender's Place View">
            </div>
        </div>

        <div class="custom-card2">
        <div class="custom-card-image2">
                <img src="Assets/pestcontrol.png" alt="Pest Control">
            </div>
            <div class="custom-card-text2">
                <h2 class="card-title2">Pest Control Routine</h2>
                <p class="card-description2">
                At Lavenders Place, we prioritize the health and well-being of our residents. To ensure a clean and pest-free living environment, we've implemented a regular pest control program. This proactive approach helps prevent pests from entering your units, safeguarding your health and creating a more comfortable living space. We're committed to maintaining the highest standards of cleanliness and sanitation for your benefit.
                </p>
            </div>
        </div>

        <div class="room-slider-header">
                <h2>Available Rooms</h2>
        </div>
            <!-- Room Sliders -->
        <div class="sliders-container">
            <!-- Room Slider 1 -->
            <div class="slider-box">
                <div class="slider">
                    <div class="slides" id="slider1">
                        <div class="slide" style="background-image: url('Assets/room1pic1.png');"></div>
                        <div class="slide" style="background-image: url('Assets/room1pic2.png');"></div>
                        <div class="slide" style="background-image: url('Assets/room1pic4.png');"></div>
                        <div class="slide" style="background-image: url('Assets/room1pic5.png');"></div>
                        <div class="slide" style="background-image: url('Assets/room1pic6.png');"></div>
                        <div class="slide" style="background-image: url('Assets/room1pic7.png');"></div>
                        <div class="slide" style="background-image: url('Assets/room1pic8.png');"></div>
                    </div>
                    <button class="prev" onclick="moveSlide(-1, 0)">&#10094;</button>
                    <button class="next" onclick="moveSlide(1, 0)">&#10095;</button>
                </div>
                <h3>Studio Type Room 1</h3>
                <p>P 9,500 Monthly Rent good for 3 Pax</p>
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
                <p>P 10,500 Monthly Rent good for 4 Pax </p>
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
                <p>P 10,500 Monthly Rent good for 4 Pax</p>
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
                <p>P 15,000 Monthly Rent good for 6 Pax</p>
            </div>
        </div>

        <div class="container3">
            <p class="map-text">Come and Find us here!</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15443.854818264015!2d120.9953097!3d14.6011435!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9fbb3d6286b%3A0x76b86b0b5fffd23!2sLavender%20Place!5e0!3m2!1sen!2sph!4v1724571728226!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="container4">
            <div class="footer-content">
                <h1>Lavender Place</h1>
                <div class="address">
                    <img src="../Assets/locationpin.gif" alt="Location" class="icon">
                    <span>1277 Lavanderos St, Sampaloc, Manila, Metro Manila</span>
                </div>
                <div class="contact">
                    <img src="../Assets/phoneicon.gif" alt="Phone" class="icon">
                    <span>09977316010</span>
                </div>
            </div>
            <div class="footer-links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">FAQ</a>
                <a href="#">Support</a>
            </div>
            <!--<div class="social-media">
                <a href="#"><img src="../Assets/facebook.png" alt="Facebook" class="icon"></a>
                <a href="#"><img src="../Assets/instagram.png" alt="Instagram" class="icon"></a>
            </div> -->
            <div class="footer-bottom">
                <p>&copy; 2024 DormLink. All rights reserved.</p>
            </div>
        </div>

        <!-- Chatbot -->
        <?php include('./templates/chatbot.php'); ?>
        <!-- Chatbot -->
    </div>


    <a href="https://www.instagram.com/lavanderplace_1277apartments?igsh=dzJwbnUxdDJwOGsx" target="_blank" class="floating-ig-btn">
        <img src="Assets/igpc.png" alt="Instagram Icon">
    </a>

    <!-- Floating Facebook Button -->
    <a href="https://web.facebook.com/1277apartments/?_rdc=1&_rdr" target="_blank" class="floating-fb-btn">
        <img src="Assets/fbpc.png" alt="Facebook Icon">
    </a>

    <script>
        let slideIndex = [0, 0, 0, 0]; // Stores the current index for each slider
        let slideIds = ['slider1', 'slider2', 'slider3', 'slider4']; // Corresponding slider IDs

        function moveSlide(n, sliderNum) {
            let slider = document.getElementById(slideIds[sliderNum]);
            let slides = slider.getElementsByClassName("slide");
            slideIndex[sliderNum] += n;

            if (slideIndex[sliderNum] >= slides.length) {
                slideIndex[sliderNum] = 0; // Wrap back to the first slide
            }

            if (slideIndex[sliderNum] < 0) {
                slideIndex[sliderNum] = slides.length - 1; // Wrap to the last slide
            }

            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none"; // Hide all slides
            }

            slides[slideIndex[sliderNum]].style.display = "block"; // Show the current slide
        }

        // Initialize the sliders by showing the first slide of each
        for (let i = 0; i < slideIds.length; i++) {
            moveSlide(0, i); // Show the first slide of each slider
        }
    </script>

    <script src="javascript/index.js">
    </script>
</body>

</html>

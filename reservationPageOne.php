<?php
require_once './includes/login/login_view.php';
//include './middleware/admin_middleware.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Reservation</title>
    <link rel="stylesheet" href="css/reservationPageOne.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
</head>
<body>
    <div class="new_reservation_container1">
        <!-- header -->
        <?php include('./templates/logged_in_header.php'); ?>
        <!-- header -->
    </div>

    <div class="container">
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
    </div>
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




</body>
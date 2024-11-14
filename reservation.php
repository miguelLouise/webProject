<?php
require_once './includes/login/login_view.php';
include './middleware/user_middleware.php';
require_once './includes/dbh.inc.php';
require_once './includes/room_management/room_management_view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="stylesheet" href="css///reservation.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

</head>
<body>
    <!-- header -->
    <?php include('./templates/logged_in_header.php'); ?>
    <!-- header -->

    <!-- page content -->
    <div class="reservation_container1">
            <div class="contact-left-title">
                <h2>Reservation</h2>
                <p>Choose your room and submit your reservation here!</p>
                <hr>
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
    
       <div class="reservation_container2">
        <form action="./includes/room_management/room_management_reserve.php" method="post" id="reservation" novalidate>
        <div class="reservation_container3" id="reservation_container3"><!-- room type description --></div>
        <div class="reservation_container4">
            <!-- display for 5 seconds -->
            <div id="reservation_error" style="color: red;"><?php reservation_success_message("reservation_error"); ?></div>
            <div id="reservation_success"><?php reservation_success_message("reservation_success"); ?></div>

            <!-- room type -->
            <div class="input-group">
                <label for="room_typ">ROOM TYPE <span style="color: red;"><?php display_reservation_error("room_type_error") ?></span></label>
                <select name="room_typ" id="room_typ">
                    <option value="" selected hidden>Room Type</option>
                    <?php
                    $roomTypes = showRoomTypes($dbconn);
                    foreach ($roomTypes as $room_types) {
                        echo '<option value="'.$room_types["room_type"].'">'.$room_types["room_type"].'</option>';
                    }
                    ?>
                </select>
            </div>

            <!-- floor number -->
            <div class="input-group">
            <label for="flr_num">FLOOR NUMBER <span style="color: red;"><?php display_reservation_error("floor_number_error") ?></span></label>
            <select name="flr_num" id="flr_num">
                <option value="" selected hidden>Floor Number</option>
            </select>
            </div>

            <!-- room number -->
            <div class="input-group">
            <label for="room_num">ROOM NUMBER <span style="color: red;"><?php display_reservation_error("room_number_error") ?></span></label>
            <select name="room_num" id="room_num">
                <option value="" selected hidden>Room Number</option>
            </select>
            </div>
        </div>

        <button type="submit" id="confirm_reservation_btn" >Reserve</button>

        <div class="reservation_confirmation" id="reservation_confirmation" style="background-color:blue;">
            <!-- room details -->
        </div>
        <div id="room_availability_error" style="color: red;"><?php display_reservation_error("room_availability_error"); ?></div>
        <div id="user_already_reserved_error" style="color: red;"><?php display_reservation_error("user_already_reserved_error"); ?></div>

        </form>
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

    <script src="javascript/reservation.js"></script>

</body>
</html>
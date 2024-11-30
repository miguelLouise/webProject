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
            <h2>Make your Reservation</h2>
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
            </div>

            <div class="info-box">
                <h3>Studio Type Room 1</h3>
                    <p>9,500.00 monthly 1 month advance and 2 months deposit.</p>
                    <p>( 6 ) months minimum contract.</p>
                    <p>Maximum of 3 persons only.</p>
                    <p>Semi-furnished unit</p>
                    <p>Exclusive water and electric bill</p>
                    <p>With one double deck, one bed, cabinet, table, chair, ceiling fan & aircon</p>
                    <p>Free wifi internet in each room</p>
                    <p>Good for student, reviewee, working couple with no baby.</p>
            </div>
            <div class="input-box">
                <h3>Input</h3>
                <p>Section</p>
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
            </div>

            <div class="info-box">
                <h3>Studio Type Room 2</h3>
                    <p>10,500.00 monthly 1 month advance and 2 months deposit.</p>
                    <p>( 6 ) months minimum contract.</p>
                    <p>Maximum of 4 persons only.</p>
                    <p>Semi-furnished unit</p>
                    <p>Exclusive water and electric bill</p>
                    <p>With two ( 2 ) double deck, one cabinet, table, chair, ceiling fan & aircon</p>
                    <p>Free wifi internet in each room</p>
                    <p>Good for student, reviewee, working couple with no baby.</p>
            </div>
            <div class="input-box">
                <h3>Input</h3>
                <p>Section</p>
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
            </div>
            
            <div class="info-box">
                <h3>Studio Type Room 3</h3>
                    <p>10,500.00 monthly 1 month advance and 2 months deposit.</p>
                    <p>( 6 ) months minimum contract.</p>
                    <p>Maximum of 4 persons only.</p>
                    <p>Semi-furnished unit</p>
                    <p>Exclusive water and electric bill</p>
                    <p>With two ( 2 ) double deck, one cabinet, table, chair, ceiling fan & aircon</p>
                    <p>Free wifi internet in each room</p>
                    <p>Good for student, reviewee, working couple with no baby.</p>
            </div>
            <div class="input-box">
                <h3>Input</h3>
                <p>Section</p>
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
            </div>

            <div class="info-box">
                <h3>Studio Type Room 4</h3>
                    <p>15,000.00 monthly 1 month advance and 2 months deposit.</p>
                    <p>( 6 ) months minimum contract.</p>
                    <p>Maximum of 6 persons only.</p>
                    <p>Semi-furnished unit</p>
                    <p>Exclusive water and electric bill</p>
                    <p>With three ( 3 ) double deck, one cabinet, table, chair, ceiling fan & aircon</p>
                    <p>Free wifi internet in each room</p>
                    <p>Good for student, reviewee, working couple with no baby.</p>
            </div>

            <div class="input-box">
                <h3>Input</h3>
                <p>Section</p>
            </div>

        </div>
    </div>

    <script src="javascript/reservationPageOne.js"></script>




</body>
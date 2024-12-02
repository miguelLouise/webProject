<?php
require_once './includes/login/login_view.php';
include './middleware/user_middleware.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dormlink - User Homepage</title>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="css//user_homepage.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
</head>

<body>
    <!-- header -->
    <?php include('./templates/logged_in_header.php'); ?>
    <!-- header -->
    <div class="user_homepage_container1">
        <!-- page content -->

        <div class="custom-card">
            <div class="custom-card-text">
                <h2 class="card-title">Welcome to Lavenders Place</h2>
                <p class="card-description">
                Discover comfort and convenience at Lavender's Place, your ideal dorm and apartment reservation destination in the heart of Manila’s University Belt (UBELT). Offering modern amenities, secure facilities, and a welcoming environment, we provide the perfect home for students and professionals alike. Reserve your space today and experience the best in city living, tailored to meet your needs.
                </p>
                <form action="includes/room_management/select_room_type.php" method="get" novalidate>
                <button class="reserve-button" name="action" value="room_one">Reserve Now</button>
                <button class="message-button"><a href="messaging_page.php" class="message_btn">Contact Us</a></button>
            </div>
            <div class="custom-card-image">
                <img src="Assets/lpview.jpg" alt="Lavender's Place View">
            </div>
        </div>

        <div class="custom-card-header">
            <h1>Our Lobby Area</h1>
        </div>

        <div class="container2">
            <img src="Assets/lavenders1.png">
            <img src="Assets/lavenders2.png">
            <img src="Assets/lavenders3.png">
            <img src="Assets/lavenders4.png">
            <img src="Assets/lavenders5.png">
        </div>

        <!-- <form action="includes/room_management/select_room_type.php" method="get" novalidate> -->
        <div class="info-section">
        <!-- <form action="includes/room_management/select_room_type.php" method="get" novalidate> -->
            <div class="info-container">
                <!-- Left Section -->
                <div class="info-left">
                    <h2>Description</h2>
                    <p class="description-text">
                        Accessible Area, Located near Arellano University, National University, and LRT Legarda Station.
                    </p>

                    <h2>Other Details</h2>
                    <p class="details-text">
                        7 storey Dorm/Apartment building<br>
                        69 Rooms with own bathroom and sink<br>
                        Solo or Shared room unit type<br>
                        24-hour security service<br>
                        24-hour elevator service<br>
                        CCTV surveillance camera on each floor
                    </p>
                </div>

                <!-- Right Section -->
                <div class="info-right">
                    <h2>Amenities</h2>
                    <p class="amenities-text">
                        <span class="amenity-icon">📚</span> <span class="clickable-amenity" onclick="showPopup('Assets/studyarea.jpg')"style="width: 100%; height: 100%;">Study Area</span><br>
                        <span class="amenity-icon">🛋️</span> <span class="clickable-amenity" onclick="showPopup('Assets/lobby.jpg')">Lobby</span><br>
                        <span class="amenity-icon">🅿️</span> <span class="clickable-amenity" onclick="showPopup('Assets/parkingpc.jpg')">Parking</span><br>
                        <span class="amenity-icon">📶</span> <span class="clickable-amenity" onclick="showPopup('Assets/wifipic.png')">Wifi</span><br>
                        <span class="amenity-icon">🧺</span> <span class="clickable-amenity" onclick="showPopup('Assets/laundromatpc.jpg')">Laundromat</span><br>
                        <span class="amenity-icon">🛗</span> <span class="clickable-amenity" onclick="showPopup('Assets/elevatorpc.jpg')">Elevator</span><br>
                    </p>
                    <a href="reservation.php"><button type="button" class="reserve-button">Reserve Now</button></a>
                </div>
            </div>
        </div>

        <!-- Popup Image Container -->
        <div id="popup" class="popup-container">
            <span id="closeBtn" class="popup-close" onclick="closePopup()">X</span>
            <img id="popupImage" src="" alt="Amenity Image" class="popup-image">
        </div>

        <div class="rooms-section">
            <!-- Room 1 -->
            <div class="room">
                <div class="room-images">
                    <div class="large-image">
                        <img id="room1-large" src="Assets/room1pic1.png" alt="Room 1 Large Image">
                    </div>
                    <div class="thumbnail-images">
                        <img src="Assets/room1pic1.png" onclick="changeImage('room1-large', 'Assets/room1pic1.png')" alt="Room 1 Image 1">
                        <img src="Assets/room1pic2.png" onclick="changeImage('room1-large', 'Assets/room1pic2.png')" alt="Room 1 Image 2">
                        <img src="Assets/room1pic3.png" onclick="changeImage('room1-large', 'Assets/room1pic3.png')" alt="Room 1 Image 3">
                        <img src="Assets/room1pic4.png" onclick="changeImage('room1-large', 'Assets/room1pic4.png')" alt="Room 1 Image 4">
                        <img src="Assets/room1pic5.png" onclick="changeImage('room1-large', 'Assets/room1pic5.png')" alt="Room 1 Image 5">
                        <img src="Assets/room1pic6.png" onclick="changeImage('room1-large', 'Assets/room1pic6.png')" alt="Room 1 Image 6">
                        <img src="Assets/room1pic7.png" onclick="changeImage('room1-large', 'Assets/room1pic7.png')" alt="Room 1 Image 7">
                        <img src="Assets/room1pic8.png" onclick="changeImage('room1-large', 'Assets/room1pic8.png')" alt="Room 1 Image 8">
                    </div>
                </div>

                <div class="room-info">
                    <h2>Studio Room 1</h2>
                    <p>STUDIO TYPE ROOM</p>
                    <p>9,500.00 monthly 1 month advance and 2 months deposit.</p>
                    <p>( 6 ) months minimum contract.</p>
                    <p>Maximum of 3 persons only.</p>
                    <p>Semi-furnished unit</p>
                    <p>Exclusive water and electric bill</p>
                    <p>With one double deck, one bed, cabinet, table, chair, ceiling fan & aircon</p>
                    <p>Free wifi internet in each room</p>
                    <p>Good for student, reviewee, working couple with no baby.</p>
                    <!-- <a href="reservation.php"><button class="reserve-button">Reserve Now</button></a> -->
                    <a href="reservation.php"><button type="button" class="reserve-button">Reserve Now</button></a>
                    <button type="button" class="message-button"><a href="messaging_page.php" class="message_btn">Message/Inquire</a></button>
                </div>
            </div>

            <!-- Room 2 -->
            <div class="room">
                <div class="room-images">
                    <div class="large-image">
                        <img id="room2-large" src="Assets/room2pic1.png" alt="Room 2 Large Image">
                    </div>
                    <div class="thumbnail-images">
                        <img src="Assets/room2pic1.png" onclick="changeImage('room2-large', 'Assets/room2pic1.png')" alt="Room 2 Image 1">
                        <img src="Assets/room2pic2.png" onclick="changeImage('room2-large', 'Assets/room2pic2.png')" alt="Room 2 Image 2">
                        <img src="Assets/room2pic3.png" onclick="changeImage('room2-large', 'Assets/room2pic3.png')" alt="Room 2 Image 3">
                        <img src="Assets/room2pic4.png" onclick="changeImage('room2-large', 'Assets/room2pic4.png')" alt="Room 2 Image 4">
                        <img src="Assets/room2pic5.png" onclick="changeImage('room2-large', 'Assets/room2pic5.png')" alt="Room 2 Image 5">
                        <img src="Assets/room2pic6.png" onclick="changeImage('room2-large', 'Assets/room2pic6.png')" alt="Room 2 Image 6">
                        <img src="Assets/room2pic7.png" onclick="changeImage('room2-large', 'Assets/room2pic7.png')" alt="Room 2 Image 7">
                        <img src="Assets/room2pic8.png" onclick="changeImage('room2-large', 'Assets/room2pic8.png')" alt="Room 2 Image 8">
                        <img src="Assets/room2pic9.png" onclick="changeImage('room2-large', 'Assets/room2pic9.png')" alt="Room 2 Image 9">
                    </div>
                </div>

                <div class="room-info">
                    <h2>Studio Room 2</h2>
                    <p>STUDIO TYPE ROOM</p>
                    <p>10,500.00 monthly 1 month advance and 2 months deposit.</p>
                    <p>( 6 ) months minimum contract.</p>
                    <p>Maximum of 4 persons only.</p>
                    <p>Semi-furnished unit</p>
                    <p>Exclusive water and electric bill</p>
                    <p>With two ( 2 ) double deck, one cabinet, table, chair, ceiling fan & aircon</p>
                    <p>Free wifi internet in each room</p>
                    <p>Good for student, reviewee, working couple with no baby.</p>
                    <!-- <a href="reservation.php"><button class="reserve-button">Reserve Now</button></a> -->
                    <a href="reservation.php"><button type="button" class="reserve-button">Reserve Now</button></a>
                    <button type="button" class="message-button"><a href="messaging_page.php" class="message_btn">Message/Inquire</a></button>
                </div>
            </div>

            <!-- Room 3 -->
            <div class="room">
                <div class="room-images">
                    <div class="large-image">
                        <img id="room3-large" src="Assets/room3pic1.png" alt="Room 3 Large Image">
                    </div>
                    <div class="thumbnail-images">
                        <img src="Assets/room3pic1.png" onclick="changeImage('room3-large', 'Assets/room3pic1.png')" alt="Room 3 Image 1">
                        <img src="Assets/room3pic2.png" onclick="changeImage('room3-large', 'Assets/room3pic2.png')" alt="Room 3 Image 2">
                        <img src="Assets/room3pic3.png" onclick="changeImage('room3-large', 'Assets/room3pic3.png')" alt="Room 3 Image 3">
                        <img src="Assets/room3pic4.png" onclick="changeImage('room3-large', 'Assets/room3pic4.png')" alt="Room 3 Image 4">
                        <img src="Assets/room3pic5.png" onclick="changeImage('room3-large', 'Assets/room3pic5.png')" alt="Room 3 Image 5">
                        <img src="Assets/room3pic6.png" onclick="changeImage('room3-large', 'Assets/room3pic6.png')" alt="Room 3 Image 6">
                        <img src="Assets/room3pic7.png" onclick="changeImage('room3-large', 'Assets/room3pic7.png')" alt="Room 3 Image 7">
                        <img src="Assets/room3pic8.png" onclick="changeImage('room3-large', 'Assets/room3pic8.png')" alt="Room 3 Image 8">
                        <img src="Assets/room3pic9.png" onclick="changeImage('room3-large', 'Assets/room3pic9.png')" alt="Room 3 Image 9">

                    </div>
                </div>

                <div class="room-info">
                    <h2>Studio Room 3</h2>
                    <p>STUDIO TYPE ROOM</p>
                    <p>10,500.00 monthly 1 month advance and 2 months deposit.</p>
                    <p>( 6 ) months minimum contract.</p>
                    <p>Maximum of 4 persons only.</p>
                    <p>Semi-furnished unit</p>
                    <p>Exclusive water and electric bill</p>
                    <p>With two ( 2 ) double deck, one cabinet, table, chair, ceiling fan & aircon</p>
                    <p>Free wifi internet in each room</p>
                    <p>Good for student, reviewee, working couple with no baby.</p>
                    <!-- <a href="reservation.php"><button class="reserve-button">Reserve Now</button></a> -->
                    <a href="reservation.php"><button type="button" class="reserve-button">Reserve Now</button></a>
                    <a href="messaging_page.php"><button type="button" class="message-button">Message/Inquire</button></a>
                </div>
            </div>

            <!-- Room 4 -->
            <div class="room">
                <div class="room-images">
                    <div class="large-image">
                        <img id="room4-large" src="Assets/room4pic1.png" alt="Room 4 Large Image">
                    </div>
                    <div class="thumbnail-images">
                        <img src="Assets/room4pic1.png" onclick="changeImage('room4-large', 'Assets/room4pic1.png')" alt="Room 4 Image 1">
                        <img src="Assets/room4pic2.png" onclick="changeImage('room4-large', 'Assets/room4pic2.png')" alt="Room 4 Image 2">
                        <img src="Assets/room4pic3.png" onclick="changeImage('room4-large', 'Assets/room4pic3.png')" alt="Room 4 Image 3">
                        <img src="Assets/room4pic4.png" onclick="changeImage('room4-large', 'Assets/room4pic4.png')" alt="Room 4 Image 4">
                    </div>
                </div>

                <div class="room-info">
                    <h2>Studio Room 4</h2>
                    <p>STUDIO TYPE ROOM</p>
                    <p>15,000.00 monthly 1 month advance and 2 months deposit.</p>
                    <p>( 6 ) months minimum contract.</p>
                    <p>Maximum of 6 persons only.</p>
                    <p>Semi-furnished unit</p>
                    <p>Exclusive water and electric bill</p>
                    <p>With three ( 3 ) double deck, one cabinet, table, chair, ceiling fan & aircon</p>
                    <p>Free wifi internet in each room</p>
                    <p>Good for student, reviewee, working couple with no baby.</p>
                    <!-- <a href="reservation.php"><button class="reserve-button">Reserve Now</button></a> -->
                    <a href="reservation.php"><button type="button" class="reserve-button">Reserve Now</button></a>
                    <a href="messaging_page.php"><button type="button" class="message-button">Message/Inquire</button></a>
                </div>
            </div>

        </div>
        <!-- </form> -->
    </div>

    <script src="javascript/user_homepage.js"></script>
</body>
</html>

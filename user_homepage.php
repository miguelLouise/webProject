<?php
require_once "./includes/login/login_view.php";
include "./middleware/user_middleware.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dormlink - User Homepage</title>
    <link rel="stylesheet" href="css/user_homepage.css">
</head>

<body>
    <div class="user_homepage_container1">
        <!-- header -->
        <?php include('./templates/logged_in_header.php'); ?>
        <!-- header -->

        <!-- page content -->
        <div class="container2">
            <img src="Assets/lavenders1.png">
            <img src="Assets/lavenders2.png">
            <img src="Assets/lavenders3.png">
            <img src="Assets/lavenders4.png">
            <img src="Assets/lavenders5.png">
        </div>
        
        <div class="info-section">
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
                        Solo or Shared room unit type
                    </p>
                </div>

                <!-- Right Section -->
                <div class="info-right">
                    <h2>Amenities</h2>
                    <p class="amenities-text">
                        <span class="amenity-icon">📚</span> Study Area<br>
                        <span class="amenity-icon">💼</span> Reception<br>
                        <span class="amenity-icon">🅿️</span> Parking<br>
                        <span class="amenity-icon">📶</span> Wifi<br>
                        <span class="amenity-icon">🧺</span> Laundromat<br>
                        <span class="amenity-icon">
                        <span class="amenity-icon">🛗</span> Elevator
                    </p>

                    <button class="inquire-button">Inquire Now</button>
                </div>
            </div>
        </div>

        <div class="rooms-section">
            <!-- Studio Room 1 -->
            <div class="room">
                <div class="room-images">
                    <div class="image-card"><img src="Assets/room1pic1.png" alt="Studio Room 1 Image 1"></div>
                    <div class="image-card"><img src="Assets/room1pic2.png" alt="Studio Room 1 Image 2"></div>
                    <div class="image-card"><img src="Assets/room1pic3.png" alt="Studio Room 1 Image 3"></div>
                    <div class="image-card"><img src="Assets/room1pic4.png" alt="Studio Room 1 Image 4"></div>
                    <div class="image-card"><img src="Assets/room1pic5.png" alt="Studio Room 1 Image 5"></div>
                    <div class="image-card"><img src="Assets/room1pic6.png" alt="Studio Room 1 Image 6"></div>
                    <div class="image-card"><img src="Assets/room1pic7.png" alt="Studio Room 1 Image 7"></div>
                    <div class="image-card"><img src="Assets/room1pic8.png" alt="Studio Room 1 Image 8"></div>
                </div>
                <button class="view-all-images" onclick="openFullscreen('studio-room-1')">View All Images</button>
                <div class="room-info">
                    <h2>Studio Room 1</h2>
                    <p>STUDIO TYPE ROOM</p>
                    <p>9,500.00 monthly 1 month advance and 2 months deposit.</p>
                    <p>( 1 ) one year contract.</p>
                    <p>Maximum of 3 persons only.</p>
                    <p>Semi-furnished unit</p>
                    <p>Exclusive water and electric bill</p>
                    <p>With one double deck, one bed, cabinet, table, chair, ceiling fan & aircon</p>
                    <p>Free wifi internet in each room</p>
                    <p>24-hour security service</p>
                    <p>24-hour elevator service</p>
                    <p>CCTV surveillance camera on each floor</p>
                    <p>Good for student, reviewee, working couple with no baby.</p>
                    <button class="inquire-button">Inquire Now</button>
                </div>
            </div>

            <!-- Studio Room 2 -->
            <div class="room">
                <div class="room-images">
                    <div class="image-card"><img src="Assets/room2pic1.png" alt="Studio Room 2 Image 1"></div>
                    <div class="image-card"><img src="Assets/room2pic2.png" alt="Studio Room 2 Image 2"></div>
                    <div class="image-card"><img src="Assets/room2pic3.png" alt="Studio Room 2 Image 3"></div>
                    <div class="image-card"><img src="Assets/room2pic4.png" alt="Studio Room 2 Image 4"></div>
                    <div class="image-card"><img src="Assets/room2pic5.png" alt="Studio Room 2 Image 5"></div>
                    <div class="image-card"><img src="Assets/room2pic6.png" alt="Studio Room 2 Image 6"></div>
                    <div class="image-card"><img src="Assets/room2pic7.png" alt="Studio Room 2 Image 7"></div>
                    <div class="image-card"><img src="Assets/room2pic8.png" alt="Studio Room 2 Image 8"></div>
                    <div class="image-card"><img src="Assets/room2pic9.png" alt="Studio Room 2 Image 9"></div>
                </div>
                <button class="view-all-images" onclick="openFullscreen('studio-room-2')">View All Images</button>
                <div class="room-info">
                    <h2>Studio Room 2</h2>
                    <p>STUDIO TYPE ROOM</p>
                    <p>10,500.00 monthly 1 month advance and 2 months deposit.</p>
                    <p>( 1 ) one year contract.</p>
                    <p>Maximum of 4 persons only.</p>
                    <p>Semi-furnished unit</p>
                    <p>Exclusive water and electric bill</p>
                    <p>With two ( 2 ) double deck, one cabinet, table, chair, ceiling fan & aircon</p>
                    <p>Free wifi internet in each room</p>
                    <p>24-hour security service</p>
                    <p>24-hour elevator service</p>
                    <p>CCTV surveillance camera on each floor</p>
                    <p>Good for student, reviewee, working couple with no baby.</p>
                    <button class="inquire-button">Inquire Now</button>
                </div>
            </div>

            <!-- Studio Room 3 -->
            <div class="room">
                <div class="room-images">
                    <div class="image-card"><img src="Assets/room3pic1.png" alt="Studio Room 3 Image 1"></div>
                    <div class="image-card"><img src="Assets/room3pic2.png" alt="Studio Room 3 Image 2"></div>
                    <div class="image-card"><img src="Assets/room3pic3.png" alt="Studio Room 3 Image 3"></div>
                    <div class="image-card"><img src="Assets/room3pic4.png" alt="Studio Room 3 Image 4"></div>
                    <div class="image-card"><img src="Assets/room3pic5.png" alt="Studio Room 3 Image 5"></div>
                    <div class="image-card"><img src="Assets/room3pic6.png" alt="Studio Room 3 Image 6"></div>
                    <div class="image-card"><img src="Assets/room3pic7.png" alt="Studio Room 3 Image 7"></div>
                    <div class="image-card"><img src="Assets/room3pic8.png" alt="Studio Room 3 Image 8"></div>
                    <div class="image-card"><img src="Assets/room3pic9.png" alt="Studio Room 3 Image 9"></div>
                </div>
                <button class="view-all-images" onclick="openFullscreen('studio-room-3')">View All Images</button>
                <div class="room-info">
                    <h2>Studio Room 3</h2>
                    <p>STUDIO TYPE ROOM</p>
                    <p>10,500.00 monthly 1 month advance and 2 months deposit.</p>
                    <p>( 6 ) month's to ( 1 ) year minimum contract.</p>
                    <p>Maximum of 4 persons only.</p>
                    <p>Semi-furnished unit</p>
                    <p>Exclusive water and electric bill</p>
                    <p>With two ( 2 ) double deck, one cabinet, table, chair, ceiling fan & aircon</p>
                    <p>Free wifi internet in each room</p>
                    <p>24-hour security service</p>
                    <p>24-hour elevator service</p>
                    <p>CCTV surveillance camera on each floor</p>
                    <p>Good for student, reviewee, working couple with no baby.</p>
                    <button class="inquire-button">Inquire Now</button>
                </div>
            </div>

            <!-- Studio Room 4 -->
            <div class="room">
                <div class="room-images">
                    <div class="image-card"><img src="Assets/room4pic1.png" alt="Studio Room 4 Image 1"></div>
                    <div class="image-card"><img src="Assets/room4pic2.png" alt="Studio Room 4 Image 2"></div>
                    <div class="image-card"><img src="Assets/room4pic3.png" alt="Studio Room 4 Image 3"></div>
                    <div class="image-card"><img src="Assets/room4pic4.png" alt="Studio Room 4 Image 4"></div>
                </div>
                <button class="view-all-images" onclick="openFullscreen('studio-room-4')">View All Images</button>
                <div class="room-info">
                    <h2>Studio Room 4</h2>
                    <p>STUDIO TYPE ROOM</p>
                    <p>15,000.00 monthly 1 month advance and 2 months deposit.</p>
                    <p>( 1 ) one year contract.</p>
                    <p>Maximum of 6 persons only.</p>
                    <p>Semi-furnished unit</p>
                    <p>Exclusive water and electric bill</p>
                    <p>With three ( 3 ) double deck, one cabinet, table, chair, ceiling fan & aircon</p>
                    <p>Free wifi internet in each room</p>
                    <p>24-hour security service</p>
                    <p>24-hour elevator service</p>
                    <p>CCTV surveillance camera on each floor</p>
                    <p>Good for student, reviewee, working couple with no baby.</p>
                    <button class="inquire-button">Inquire Now</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Fullscreen view -->
    <div class="fullscreen" id="fullscreen-view">
        <div class="close" onclick="closeFullscreen()">×</div>
        <div id="fullscreen-images"></div>
    </div>
  
    <script src="JavaScript/user_homepage.js"></script>



</body>

</html>

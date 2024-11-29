<?php
require_once './includes/dbh.inc.php';
require_once './includes/room_management/room_management_view.php';

$rmType = $_POST['roomTyp'];



if ($rmType == 1) {
    $roomDesc = showRoomDesc($dbconn, $rmType);
    foreach ($roomDesc as $value) {
    ?>
        <!-- image -->
        <!-- <div class="slider">
            <div class="slides">
                <img src="Assets/room1pic1.png" alt="room1_pic1">
                <img src="Assets/room1pic2.png" alt="room1_pic2">
                <img src="Assets/room1pic3.png" alt="room1_pic3">
                <img src="Assets/room1pic4.png" alt="room1_pic4">
                <img src="Assets/room1pic5.png" alt="room1_pic5">
            </div>
            <button type="button" class="previous" onclick="previous_slide()">&#10094</button>
            <button type="button" class="next" onclick="next_slide()">&#10095</button>
        </div> -->
            <div class="slider-box">
                <div class="slider">
                    <div class="slides" id="slider1">
                        <img class="slide" src="Assets/room1pic1.png" alt="room1_pic1">
                        <img class="slide" src="Assets/room1pic2.png" alt="room1_pic2">
                        <img class="slide" src="Assets/room1pic3.png" alt="room1_pic3">
                        <img class="slide" src="Assets/room1pic4.png" alt="room1_pic4">
                        <img class="slide" src="Assets/room1pic5.png" alt="room1_pic5">
                    </div>
                    <button type="button" class="prev" onclick="moveSlide(-1, 0)">&#10094;</button>
                    <button type="button" class="next" onclick="moveSlide(1, 0)">&#10095;</button>
                </div>
            </div>
        <div class="text_container"><?php echo $value['room_description']; ?></div>
    <?php
    }
} elseif ($rmType == 2) {
    $roomDesc = showRoomDesc($dbconn, $rmType);
    foreach ($roomDesc as $value) {
    ?>
     <!-- image -->
    <?php
    }
} elseif ($rmType == 3) {
    $roomDesc = showRoomDesc($dbconn, $rmType);
    foreach ($roomDesc as $value) {
    ?>

    <?php
    }
} elseif ($rmType == 4) {
    $roomDesc = showRoomDesc($dbconn, $rmType);
    foreach ($roomDesc as $value) {
    ?>

    <?php
    }
}
?>

<style>
    .text_container{
        word-wrap: break-word;
        /* background-color: red; */
        font-family: 'Montserrat', sans-serif;
        /* font-size: 18px; */
        font-weight: 400;
    }
    .text_container p{
        /* background-color: blue; */
        line-height: 1.5;
        font-size: 14px;
    }
    .slider-box{
        position: relative;
        /* background-color: chartreuse; */
        /* height: 475px; */
        width: 300px;
        overflow: hidden;
    }

    .slider-box img{
        width: 100%;
        display: none;
    }

    img.display_slide{
        display: block;
    }
</style>

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

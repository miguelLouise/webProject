<?php
require_once './includes/dbh.inc.php';
require_once './includes/room_management/room_management_view.php';

$rmType = $_POST['roomTyp'];



if ($rmType == 1) {
    $roomDesc = showRoomDesc($dbconn, $rmType);
    foreach ($roomDesc as $value) {
    ?>
        <!-- image -->
        <div class="slider">
            <div class="slides">
                <img src="Assets/room1pic1.png" alt="room1_pic1">
                <img src="Assets/room1pic2.png" alt="room1_pic2">
                <img src="Assets/room1pic3.png" alt="room1_pic3">
                <img src="Assets/room1pic4.png" alt="room1_pic4">
                <img src="Assets/room1pic5.png" alt="room1_pic5">
            </div>
            <button type="button" class="previous" onclick="previous_slide()">&#10094</button>
            <button type="button" class="next" onclick="next_slide()">&#10095</button>
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
        background-color: red;
    }
    .slider{
        position: relative;
        background-color: chartreuse;
        width: 500px;
        overflow: hidden;
    }

    .slider img{
        width: 100%;
    }
</style>

<script>
    const slides = document.querySelectorAll(".slides img");
    let slide_index = 0;
    let interval_id = null;
</script>

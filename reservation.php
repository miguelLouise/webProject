<?php
require_once './includes/login/login_view.php';
include './middleware/user_middleware.php';
require_once './includes/dbh.inc.php';
require_once './includes/room_management/room_management_view.php';
require_once './includes/tenant_management/tenant_management_view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="stylesheet" href="css///reservation.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="javascript/reservation.js"></script>

</head>
<body>
    <!-- header -->
    <?php include('./templates/logged_in_header.php'); ?>
    <!-- header -->

    <!-- page content -->
    <div class="reservation_container1">
       <div class="reservation_container2">
        <form action="./includes/room_management/room_management_reserve.php" method="post" id="reservation" novalidate>

        <div class="reservation_container3" id="reservation_container3"><!-- room type description -->
        <div class="image_container"></div>
        </div>
        <div class="reservation_container4">
            <!-- display for 5 seconds -->
        <div id="reservation_error" style="color: red;"><?php reservation_success_message("reservation_error"); ?></div>
        <div id="reservation_success"><?php reservation_success_message("reservation_success"); ?></div>

            <!-- room type -->
            <div class="input-group">
                <label for="room_typ">ROOM TYPE <span style="color: red;"><?php display_reservation_error("room_type_error") ?></span></label>
                <select name="room_typ" id="room_typ">
                    <option value="<?php display_message("selected_room"); ?>" selected hidden><?php display_message("selected_room");  unset_session_variable("selected_room");?></option>
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

        <button type="submit" id="confirm_reservation_btn">Reserve</button>

        <!-- <div class="reservation_confirmation" id="reservation_confirmation" style="background-color:blue;"> -->
            <!-- room details -->
        </div>
        <div id="room_availability_error" style="color: red;"><?php display_reservation_error("room_availability_error"); ?></div>
        <div id="user_already_reserved_error" style="color: red;"><?php display_reservation_error("user_already_reserved_error"); ?></div>

        </form>
       </div>
    </div>

    <!-- <script src="javascript/reservation.js"></script> -->

</body>
</html>
<?php
require_once './includes/login/login_view.php';
include './middleware/user_middleware.php';
require_once './includes/dbh.inc.php';
require_once './includes/room_management/room_management_view.php';
require_once './includes/tenant_management/tenant_management_view.php';
<<<<<<< HEAD
require_once './includes/room_management/room_management_model.php';
=======
>>>>>>> 08aa88696f7510739278db19c899069ffdc27a13
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="stylesheet" href="css/reservation.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="javascript/reservation.js"></script>

</head>
<body>
    <!-- header -->
    <?php include('./templates/logged_in_header.php'); ?>
    <!-- header -->

    <!-- page content -->
    <div class="reservation_container1">
<<<<<<< HEAD
        <?php
        disappearing_room_management_message("reservation_error");
        disappearing_room_management_message("user_already_reserved_error");
        disappearing_room_management_message("exceed_number_of_tenants");
        disappearing_room_management_message("room_availability_error");
        disappearing_room_management_message("reservation_success");
        ?>
        <form action="./includes/room_management/room_management_reserve.php" method="post" id="reservation" novalidate>
            <?php $get_room_types = getRoomTypes($dbconn);
            foreach ($get_room_types as $data) {
                ?>
                 <div class="reservation_container2">
                    <div class="rooms_img_container">
                        <?php
                        if ($data['room_type'] === 1) {
                            ?>
                            <div class="slider-box">
                                <div class="slider">
                                    <button type="button" class="prev" onclick="moveSlide(1, 0)">&#10094;</button>
                                    <div class="slides" id="slider1">
                                        <img class="slide" src="Assets/room1pic1.png" alt="room1_pic1">
                                        <img class="slide" src="Assets/room1pic2.png" alt="room1_pic2">
                                        <img class="slide" src="Assets/room1pic3.png" alt="room1_pic3">
                                        <img class="slide" src="Assets/room1pic4.png" alt="room1_pic4">
                                        <img class="slide" src="Assets/room1pic5.png" alt="room1_pic5">
                                    </div>
                                    <button type="button" class="next" onclick="moveSlide(1, 0)">&#10095;</button>
                                </div>
                            </div>
                            <?php
                        } else if ($data['room_type'] === 2) {
                            ?>
                            <div class="slider-box">
                                <div class="slider">
                                    <button type="button" class="prev" onclick="moveSlide(1, 0)">&#10094;</button>
                                    <div class="slides" id="slider1">
                                        <img class="slide" src="Assets/room1pic1.png" alt="room1_pic1">
                                        <img class="slide" src="Assets/room1pic2.png" alt="room1_pic2">
                                        <img class="slide" src="Assets/room1pic3.png" alt="room1_pic3">
                                        <img class="slide" src="Assets/room1pic4.png" alt="room1_pic4">
                                        <img class="slide" src="Assets/room1pic5.png" alt="room1_pic5">
                                    </div>
                                    <button type="button" class="next" onclick="moveSlide(1, 0)">&#10095;</button>
                                </div>
                            </div>
                            <?php
                        } else if ($data['room_type'] === 3) {
                            ?>
                            <div class="slider-box">
                                <div class="slider">
                                    <button type="button" class="prev" onclick="moveSlide(1, 0)">&#10094;</button>
                                    <div class="slides" id="slider1">
                                        <img class="slide" src="Assets/room1pic1.png" alt="room1_pic1">
                                        <img class="slide" src="Assets/room1pic2.png" alt="room1_pic2">
                                        <img class="slide" src="Assets/room1pic3.png" alt="room1_pic3">
                                        <img class="slide" src="Assets/room1pic4.png" alt="room1_pic4">
                                        <img class="slide" src="Assets/room1pic5.png" alt="room1_pic5">
                                    </div>
                                    <button type="button" class="next" onclick="moveSlide(1, 0)">&#10095;</button>
                                </div>
                            </div>
                            <?php
                        } else if ($data['room_type'] === 4) {
                            ?>
                            <div class="slider-box">
                                <div class="slider">
                                    <button type="button" class="prev" onclick="moveSlide(1, 0)">&#10094;</button>
                                    <div class="slides" id="slider1">
                                        <img class="slide" src="Assets/room1pic1.png" alt="room1_pic1">
                                        <img class="slide" src="Assets/room1pic2.png" alt="room1_pic2">
                                        <img class="slide" src="Assets/room1pic3.png" alt="room1_pic3">
                                        <img class="slide" src="Assets/room1pic4.png" alt="room1_pic4">
                                        <img class="slide" src="Assets/room1pic5.png" alt="room1_pic5">
                                    </div>
                                    <button type="button" class="next" onclick="moveSlide(1, 0)">&#10095;</button>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>

                    <div class="rooms_description">
                        <?php echo $data['room_description']; ?>
                    </div>
                    <hr>
                    <div class="room_reservation">
                    <input type="hidden" name="roomType" class="roomType" id="roomType" value="<?php echo $data['room_type']; ?>">
                        <!-- floor number -->
                        <div class="input-group">
                        <!-- <input type="hidden" name="roomType" class="roomType" id="roomType" value="<?php echo $data['room_type']; ?>"> -->
                            <label for="flr_num">Floor Number<span style="color: red;"><?php display_reservation_error("floor_number_error") ?></span></label>
                            <select name="room_type_<?php echo $data['room_type']; ?>_flr_num" class="flr_num" id="room_type_<?php echo $data['room_type']; ?>_floors">
                                <option value="" selected hidden></option>
                            </select>
                        </div>

                        <!-- room number -->
                        <div class="input-group">
                            <label for="room_num">Unit Number<span id="room_type_<?php echo $data['room_type']; ?>_error_message" style="color: red;"><?php display_reservation_error("room_number_error") ?></span></label>
                            <select name="room_type_<?php echo $data['room_type']; ?>_room_num" class="room_num" id="room_type_<?php echo $data['room_type']; ?>_room_num">
                                <option value="" selected hidden>Unit Number</option>
                            </select>
                        </div>

                        <div class="input-group">
                            <!-- <input type="hidden" name="roomType" class="roomType" id="roomType" value="<?php echo $data['room_type']; ?>"> -->
                            <label for="room_num">Number of Tenants<span id="room_type_<?php echo $data['room_type']; ?>_error_message" style="color: red;"><?php display_reservation_error("room_number_error") ?></span></label>
                            <button type="button" class="decrement" id="decrement">-</button>
                                <input type="number" name="room_type_<?php echo $data['room_type']; ?>_tenants" class="number_of_tenants" id="room_type_<?php echo $data['room_type']; ?>_tenants" value="1" min="1" max="<?php echo $data['max_capacity']; ?>" readonly>
                            <button type="button" class="increment" id="increment">+</button>
                        </div>

                        <!-- <button type="button" class="submit_btn" id="submit_btn">Submit Reservation</button> -->
                        <button type="submit" name="action" value="<?php echo $data['room_type']; ?>">Confirm</button>
                    </div>
                 </div>
                <?php
            }
            ?>
        </form>
    </div>

    <script>
// jquery
$(document).ready(function(){
    $(".container").show().delay(5000).fadeOut(50);

    $(".increment").click(function() {
        var number_of_tenants = parseInt($(this).closest(".room_reservation").find(".number_of_tenants").val());
        var get_room_type = $(this).closest(".room_reservation").find(".roomType").val();

        var max_capacity = document.getElementById("room_type_" +  get_room_type + "_tenants");
        //
        console.log(max_capacity.max);
        if (number_of_tenants < max_capacity.max) {
            $("#room_type_" +  get_room_type + "_tenants").val(number_of_tenants + 1);
        }
    });

    $(".decrement").click(function() {
        var number_of_tenants = parseInt($(this).closest(".room_reservation").find(".number_of_tenants").val());
        var get_room_type = $(this).closest(".room_reservation").find(".roomType").val();

        var max_capacity = document.getElementById("room_type_" +  get_room_type + "_tenants");
        //
        console.log(max_capacity.min);
        if (number_of_tenants > max_capacity.min) {
            $("#room_type_" +  get_room_type + "_tenants").val(number_of_tenants - 1);
        }
    });


    $(".roomType").each(function() {
        var get_room_type = $(this).val();

        $.ajax({
            type: 'POST',
            url: 'getFloorNumberAjax.php',
            data: {roomTyp:get_room_type},
            success: function(data){
                $('.flr_num').html(data);
            }
        });
    });

    $(document).on("change", ".flr_num", function() {
        var get_floor_number = $(this).val();
        var get_room_type = $(this).closest(".room_reservation").find(".roomType").val();

        console.log("room type: " + get_room_type);
        console.log("floor number: " + get_floor_number)

        $.ajax({
            type: 'POST',
            url: 'getRoomNumberAjax.php',
            data: {room_type:get_room_type, floor_number:get_floor_number},
            success: function(data){
                $("#room_type_" + get_room_type + "_room_num").html(data);
            }
        });

    });
});
    </script>
=======
        <div class="reservation_container2">
            <form action="./includes/room_management/room_management_reserve.php" method="post" id="reservation" novalidate>
                <div class="reservation_container3" id="reservation_container3"><!-- room type description --></div>

                <div class="reservation_container4">
                    <!-- room type -->
                    <div class="input-group">
                        <label for="room_typ">ROOM TYPE <span style="color: red;"><?php display_reservation_error("room_type_error") ?></span></label>
                        <select name="room_typ" id="room_typ">
                            <option value="<?php display_message("selected_room"); ?>" selected hidden><?php display_message("selected_room");  unset_session_variable("selected_room");?></option>
                            <?php
                            $roomTypes = showRoomTypes($dbconn);
                            foreach ($roomTypes as $room_types) {
                                echo '<option value="'.$room_types["room_type"].'">Studio Type Room '.$room_types["room_type"].'</option>';
                            }
                            ?>
                        </select>
                    </div>

                     <!-- floor number -->
                    <div class="input-group">
                        <label for="flr_num">FLOOR NUMBER <span style="color: red;"><?php display_reservation_error("floor_number_error") ?></span></label>
                        <select name="flr_num" id="flr_num">
                            <option value="" selected hidden></option>
                        </select>
                    </div>

                    <!-- room number -->
                    <div class="input-group">
                        <label for="room_num">ROOM NUMBER <span style="color: red;"><?php display_reservation_error("room_number_error") ?></span></label>
                        <select name="room_num" id="room_num">
                            <option value="" selected hidden></option>
                        </select>
                    </div>


                </div>
            </form>
       </div>
    </div>
>>>>>>> 08aa88696f7510739278db19c899069ffdc27a13
</body>
</html>
<?php
require_once './includes/dbh.inc.php';
require_once './includes/room_management/room_management_view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="stylesheet" href="css/reservation.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
</head>
<body>
    <!-- header -->
    <?php include('./templates/logged_in_header.php'); ?>
    <!-- header -->

    <!-- page content -->
    <div class="reservation_container1">
       <div class="reservation_container2">  
        <form action="./includes/room_management/room_management_reserve.php" method="post" id="reservation" novalidate>
        <div class="reservation_container3" id="reservation_container3"></div>
        <div class="reservation_container4">
        <?php reservation_success_message("reservation_error")?>
        <?php reservation_success_message("reservation_success")?>

            <!-- room type -->
            <div class="input-group">
                <label for="room_typ">ROOM TYPE <span style="color: red;"><?php display_reservation_error("room_type_error") ?></span></label>
                <select name="room_typ" id="room_typ">
                    <option value="" selected hidden>Room number</option>
                    <?php 
                    $roomTypes = showRoomTypes($dbconn);
                    foreach ($roomTypes as $room_types) {
                        echo '<option value="'.$room_types['room_type'].'">'.$room_types['room_type'].'</option>';
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

        <button id="reserve_btn" type="submit">Reserve</button>

        <span style="color: red;"><?php display_reservation_error("room_availability_error") ?></span>
        <span style="color: red;"><?php display_reservation_error("user_already_reserved_error") ?></span>
            
        </form>
       </div> 
    </div>

    
    <script type="text/javascript">
        $(document).ready(function(){   
            $(document).on("change", "#room_typ", function() {
                var getRoomType = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: 'getFloorNumberAjax.php',
                    data: {roomTyp:getRoomType},
                    success: function(data){
                        $('#flr_num').html(data);              
                    }  
                }); 
            });

            $(document).on("change", "#room_typ", function() {
                var getRoomType = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: 'getRoomInfoAjax.php',
                    data: {roomTyp:getRoomType},
                    success: function(data){ 
                        $('#reservation_container3').html(data);                       
                    }  
                }); 
            });

            $(document).on("change", "#flr_num", function() {
                var getRoomType = $("#room_typ").val()
                var getFloor = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: 'getRoomNumberAjax.php',
                    data: {room_type:getRoomType,flr_num:getFloor},
                    success: function(data){
                        $('#room_num').html(data);       
                    }
                });
            });

            $(document).on("change", "#room_num", function() {
                var getRoomType = $("#room_typ").val()
                var getFloor = $("#flr_num").val();
                var getRoom = $(this).val();

                console.log(getRoomType);
                console.log(getFloor);
                console.log(getRoom);

                $.ajax({
                    type: 'POST',
                    url: 'getAvailabilityAjax.php',
                    data: {room_type:getRoomType,flr_num:getFloor, room_num:getRoom},
                    success: function(data){
                        $('#reservation_container5').html(data); 
                    }
                });
            });       
        });
    </script>  
</body>
</html>
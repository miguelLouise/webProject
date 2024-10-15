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
    <link rel="stylesheet" href="css//reservation.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
</head>
<body>
    <!-- header -->
    <?php include('./templates/logged_in_header.php'); ?>
    <!-- header -->

    <!-- page content -->
    <div class="reservation_container1">
       <div class="reservation_container2">
        <?php
        echo '<form action="./includes/room_management/room_management_reserve.php" method="POST" novalidate>';
        $roomTypes = showRoomTypes($dbconn);

        echo '<div class="reservation_container3" id="reservation_container3">';
        echo '</div>';
        // room type
        echo '<label for="room_typ">ROOM TYPE</label>';
        echo '<select name="room_typ" id="room_typ">';
        echo '<option value="" selected disabled hidden>Room number</option>';
        foreach ($roomTypes as $room_types) {
           echo '<option value="'.$room_types['room_type'].'">'.$room_types['room_type'].'</option>';   
        }
        echo '</select>';

        // floor number
        echo '<label for="flr_num">FLOOR NUMBER</label>';
        echo '<select name="flr_num" id="flr_num">';
        echo '<option value="" selected disabled hidden>Floor Number</option>';
        echo '</select>';

        echo '<label for="room_num">ROOM NUMBER</label>';
        echo '<select name="room_num" id="room_num">';
        echo '<option value="" selected disabled hidden>Room Number</option>';
        echo '</select>';

        echo '<div class="reservation_container4">';                                                                              
        echo '<button id="reserve_btn" type="submit">Reserve</button>';       
        echo '</div>';
        echo '</form>';
        ?>
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
                var getFloor = $(this).val().split(',');
                console.log(getFloor[1]);
                $.ajax({
                    type: 'POST',
                    url: 'getRoomNumberAjax.php',
                    data: {room_typ:getFloor[0], flr_num:getFloor[1]},
                    success: function(data){
                        $('#room_num').html(data);
                    }
                });
            });
        });
    </script>

  
</body>
</html>
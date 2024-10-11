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
</head>
<body>
    <!-- header -->
    <?php include('./templates/logged_in_header.php'); ?>
    <!-- header -->

    <!-- page content -->
    <div class="reservation_container1">

    <?php 
        $room_data = showRoomTypes($dbconn);
        foreach ($room_data as $rooms) {
            // $room_type[] = $rooms['room_type'];
            echo '<form action="./includes/room_management/room_management_reserve.php" method="post" novalidate>
                  <div class="reservation_container2">
                      <div class="reservation_container3">
                      <ul>
                      <li>'.$rooms['room_type'].'</li>
                      <input type="hidden" name="selected_room[]" value="'.$rooms['room_type'].'">
                      <li>'.$rooms['max_capacity'].'</li>
                      <input type="hidden" name="selected_room[]" value="'.$rooms['max_capacity'].'">
                      <li>'.$rooms['price'].'</li>
                      <input type="hidden" name="selected_room[]" value="'.$rooms['price'].'">
                      </ul>';
                      
                      echo '<label for="floorName">Floor Number:</label>';
                      echo '<select name="floorName" oninput="this.data.submit();">';
                      echo '<option value="22" selected disabled hidden>floor number</option>';
                      echo '<option value="1">1</option>'; 
                      echo '<option value="2">2</option>'; 
                      echo '<option value="3">3</option>'; 
                      echo '<option value="4">4</option>'; 
                      echo  '</select>';


                    //   $output = query02($dbconn, $rooms['room_type'], $floor_num);

                    //   print_r($output);
                    //   $rooms = query01($dbconn, $rooms['room_type']);     
                    //   echo '<label for="selected_room[]">Room Number:</label>';     
                    //   echo '<select name="selected_room[]">';
                    //   foreach ($rooms as $room_input) {
                    //   echo '<option value="'.$room_input['room_number'].'">'.$room_input['room_number'].'</option>';  
                    //   }  
                    //   echo  '</select>';
                      echo '</div>'; 

                      echo '<div class="reservation_container4">                                                                                         
                        <button id="reserve_btn" type="submit">Reserve</button>        
                      </div>
                      </div>
                  </form>';
        };     
        ?>

        
    </div>
</body>
</html>


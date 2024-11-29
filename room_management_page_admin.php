<?php
require_once './includes/login/login_view.php';
include './middleware/admin_middleware.php';
require_once './includes/dbh.inc.php';
require_once './includes/room_management/room_management_view.php';
require_once './includes/room_management/room_management_model.php';
require_once './includes/tenant_management/tenant_management_view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Management</title>
    <link rel="stylesheet" href="css///room_management_admin.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <!-- <script src="javascript/room_management_page_admin.js"></script> -->
</head>
<body>
    <!-- header -->
    <?php include('./templates/logged_in_header_admin.php'); ?>
    <!-- header -->

    <!-- page content -->
    <div class="room_management_container1">
      <div class="room_management_search_container">
      <label for="room_type">Room Type</label>
               <select name="room_type" id="room_type">
               <option value="" selected disabled hidden>Room Type</option>
                <?php  $get_room_types = get_room_types($dbconn);
                foreach($get_room_types as $data){
                  echo '<option value="'.$data['room_type'].'">'.$data['room_type'].'</option>';
                }
                ?>
                </select>

               <label for="floor_number">Floor Number</label>
               <select name="floor_number" id="floor_number">
               <option value="" selected disabled hidden>Floor Number</option>
                <?php  $get_floor_numbers = get_floor_numbers($dbconn);
                foreach($get_floor_numbers as $data){
                  echo '<option value="'.$data['floor_number'].'">'.$data['floor_number'].'</option>';
                }
                ?>
                </select>

                <label for="room_status">Room Status</label>
                <select name="room_status" id="room_status">
                <option  value="<?php display_message("selected_room_status"); ?>" selected hidden><?php display_message("selected_room_status"); unset_session_variable("selected_room_status"); ?></option>
                 <?php  $get_room_status = get_room_status($dbconn);
                 foreach($get_room_status as $data){
                  echo '<option value="'.$data['room_status'].'">'.$data['room_status'].'</option>';
                  }
                 ?>
                </select>
      </div>

      <div class="room_availability_page_container2">
            <div class="room_availability_page_container3">
               <div class="room_availability_page_container4">

               </div>
                <table>
                  <thead>
                    <tr>
                      <th>Room Id</th>
                      <th>Room Type</th>
                      <th>Floor Number</th>
                      <th>Room Number</th>
                      <th>Tenants</th>
                      <th>Capacity</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody id="table_body">
                   <?php $show_dormlink_rooms = getDormlinkRooms($dbconn);
                       foreach ($show_dormlink_rooms as $data) {
                        echo '<tr>';
                        echo '<td id="tbl_room_data">' . $data['room_id'] . '</td>';
                        echo '<td id="tbl_room_data">' . $data['room_type'] . '</td>';
                        echo '<td id="tbl_room_data">' . $data['floor_number'] . '</td>';
                        echo '<td id="tbl_room_data">' . $data['room_number'] . '</td>';
                        echo '<td id="tbl_room_data">' . $data['tenants'] . '</td>';
                        echo '<td id="tbl_room_data">' . $data['max_capacity'] . '</td>';
                        echo '<td id="tbl_room_data">' . $data['room_status'] . '</td>';
                        echo '</tr>';
                       };
                       ?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- <script src="javascript/room_management_page_admin.js"></script> -->
     <script type="text/javascript">
      $(document).ready(function(){
        let getRoomStatus = $("#room_status").val();

        if (getRoomStatus !== "") {
          $.ajax({
          type: 'POST',
          url: 'ajax/filterByRoomStatus.php',
          data: {roomStatus:getRoomStatus},
            success: function(data){
            $('#table_body').html(data);
          }
        });
        }
  // room type
  $(document).on("change", "#room_type", function() {
    var room_type = $(this).val();
    var floor_number = $("#floor_number").val();
    var room_status = $("#room_status").val();

    if (floor_number === null && room_status === "") {
      $.ajax({
          type: 'POST',
          url: 'ajax/filterByRoomType.php',
          data: {roomType:room_type},
          success: function(data){
            $('#table_body').html(data);
          }
      });
    }
    else if (floor_number !== null &&  room_status === "") {
      $.ajax({
        type: 'POST',
          url: 'ajax/filterByRoomTypeAndFloorNumber.php',
          data: {roomType:room_type, floorNumber:floor_number},
          success: function(data){
            $('#table_body').html(data);
          }
      });
    } else if (floor_number === null && room_status !== ""){
      $.ajax({
          type: 'POST',
          url: 'ajax/filterByRoomTypeAndRoomStatus.php',
          data: {roomType:room_type, roomStatus:room_status},
          success: function(data){
            $('#table_body').html(data);
          }
      });
    } else if (floor_number !== null && room_status !== ""){
      $.ajax({
          type: 'POST',
          url: 'ajax/filterByRoomTypeFloorNumberAndRoomStatus.php',
          data: {roomType:room_type, floorNumber:floor_number, roomStatus:room_status},
          success: function(data){
            $('#table_body').html(data);
          }
      });
    }
  });

  // floor number
  $(document).on("change", "#floor_number", function() {
    var room_type = $("#room_type").val();
    var floor_number = $(this).val();
    var room_status = $("#room_status").val();

    if (room_type === null && room_status === "") {
      $.ajax({
        type: 'POST',
        url: 'ajax/filterByFloorNumber.php',
        data: {floorNumber:floor_number},
        success: function(data){
          $('#table_body').html(data);
        }
      });
    } else if(room_type !== null && room_status === ""){
      $.ajax({
          type: 'POST',
          url: 'ajax/filterByRoomTypeAndFloorNumber.php',
          data: {roomType:room_type, floorNumber:floor_number},
          success: function(data){
            $('#table_body').html(data);
          }
      });
    }
    else if(room_type === null && room_status !== ""){
      $.ajax({
          type: 'POST',
          url: 'ajax/filterByFloorNumberAndRoomStatus.php',
          data: {floorNumber:floor_number, roomStatus:room_status},
          success: function(data){
            $('#table_body').html(data);
          }
      });
    } else if (room_type !== null && room_status !== ""){
      $.ajax({
          type: 'POST',
          url: 'ajax/filterByRoomTypeFloorNumberAndRoomStatus.php',
          data: {roomType:room_type, floorNumber:floor_number, roomStatus:room_status},
          success: function(data){
            $('#table_body').html(data);
          }
      });
    }
  });

  // room status
  $(document).on("change", "#room_status", function() {
    var room_type = $("#room_type").val();
    var floor_number = $("#floor_number").val();
    var room_status = $(this).val();

    if (room_type === null && floor_number === null) {
      $.ajax({
        type: 'POST',
        url: 'ajax/filterByRoomStatus.php',
        data: {roomStatus:room_status},
          success: function(data){
          $('#table_body').html(data);
        }
      });
    } else if(room_type !== null && floor_number === null){
      $.ajax({
        type: 'POST',
        url: 'ajax/filterByRoomTypeAndRoomStatus.php',
        data: {roomType:room_type, roomStatus:room_status},
        success: function(data){
          $('#table_body').html(data);
        }
      });
    } else if(room_type === null && floor_number !== null){
      $.ajax({
        type: 'POST',
        url: 'ajax/filterByFloorNumberAndRoomStatus.php',
        data: {floorNumber:floor_number, roomStatus:room_status},
        success: function(data){
          $('#table_body').html(data);
          }
      });
    } else if(room_type !== null && floor_number !== null){
      $.ajax({
          type: 'POST',
          url: 'ajax/filterByRoomTypeFloorNumberAndRoomStatus.php',
          data: {roomType:room_type, floorNumber:floor_number, roomStatus:room_status},
          success: function(data){
            $('#table_body').html(data);
          }
      });
    }
  });
});
     </script>
</body>
</html>
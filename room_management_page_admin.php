<?php
require_once './includes/login/login_view.php';
include './middleware/admin_middleware.php';
require_once './includes/dbh.inc.php';
require_once './includes/room_management/room_management_view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Management</title>
    <link rel="stylesheet" href="css/room_management_admin.css">
</head>
<body>
    <!-- header -->
    <?php include('./templates/logged_in_header_admin.php'); ?>
    <!-- header -->
    
    <!-- page content -->
    <div class="room_availability_page_container1">
        <div class="room_availability_page_container2">
            <div class="room_availability_page_container3">
               <div class="room_availability_page_container4">
                
                <input type="text" placeholder="search bar">
                <button>search</button>
                <button>reset</button>
               </div>
                <table>
                  <thead>
                    <tr>
                      <th>Room Id</th>
                      <th>Room Number</th>
                      <th>Floor Number</th>
                      <th>Room Number</th>
                      <th>Tenants</th>
                      <th>Capacity</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php $show_dormlink_rooms = show_dormlink_rooms($dbconn);
                       foreach ($show_dormlink_rooms as $data) {
                        echo '<tr>';
                        echo '<td id="tbl_room_data">' . $data['room_id'] . '</td>';
                        echo '<td id="tbl_room_data">' . $data['room_type'] . '</td>';
                        echo '<td id="tbl_room_data">' . $data['floor_number'] . '</td>';
                        echo '<td id="tbl_room_data">' . $data['room_number'] . '</td>';
                        echo '<td id="tbl_room_data">' . $data['tenants'] . '</td>';
                        echo '<td id="tbl_room_data">' . $data['max_capacity'] . '</td>';
                        // echo '<td id="tbl_room_data"> 
                        //       <button id="edit_btn"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg>edit</button>
                        //       <button id="dlt_btn"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>delete</button>
                        //       </td>';
                        // echo '</tr>';
                       };
                       ?>  
                  </tbody>
                </table>
            </div>     
        </div>
    </div>
</body>
</html>
<?php
require_once './includes/login/login_view.php';
include './middleware/admin_middleware.php';
require_once './includes/dbh.inc.php';
require_once './includes/room_management/room_management_view.php';
require_once './includes/tenant_management/tenant_management_view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation - Admin</title>
    <link rel="stylesheet" href="css//reservation_management_admin.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
</head>
<body>
    <!-- header -->
    <?php include('./templates/logged_in_header_admin.php'); ?>
    <!-- header -->

    <div class="reservation_management_container1">
    <p style="color:green"><?php display_message("delete_reservation"); unset_session_variable("delete_reservation");?></p>
      <table>
        <thead>
          <tr>
          <th>reservation_id</th>
          <th>user_id</th>
          <th>room_type</th>
          <th>floor_number</th>
          <th>rooom_number</th>
          <th>reservation_date</th>
          <th>Status</th>
          <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $show_reservation_table = show_reservation_table($dbconn);
          foreach ($show_reservation_table as $data) {
            echo '<form action="includes/tenant_management/tenant_add.php" method="post" novalidate>';
            echo '<tr>';
            echo '<td><input type="hidden" id="reservation_id" name="id" value="'.$data['reservation_id'].'">'.$data['reservation_id'].'</td>';
            echo '<td><input type="hidden" name="user_id" value="'.$data['user_id'].'">'.$data['user_id'].'</td>';
            echo '<td><input type="hidden" name="room_type" value="'.$data['room_type'].'">'.$data['room_type'].'</td>';
            echo '<td><input type="hidden" name="floor_number" value="'.$data['floor_number'].'">'.$data['floor_number'].'</td>';
            echo '<td><input type="hidden" name="room_number" value="'.$data['room_number'].'">'.$data['room_number'].'</td>';
            echo '<td><input type="hidden" name="reservation_date" value="'.$data['reservation_date'].'">'.$data['reservation_date'].'</td>';
            echo '<td>
                  <select name="reservation_status" id="reservation_status">
                  <option value="" selected disabled hidden>'.$data['reservation_status'].'</option>
                  <option value="Pending">Pending</option>
                  <option value="Paid/Reserved">Paid/Reserved</option>
                  <option value="Overdue">Overdue</option>    
                  </select>
                  </td>';
            echo '<td>
                  <button type="submit" name="add_tenant">Add as tenant</button>
                  <button type="button" id="myButton">Delete</button>
                  </td>'; 
            echo '</tr>';

           
            echo '<div id="myDiv" style="display: none; background-color:red;">';
            echo '<input type="hidden" name="tenant_id" value="'.$data["reservation_id"].'">';
            echo 'delete reservation?';
            echo '<div class="div1">';
            echo '<button type="submit" name="confirm_delete">Confirm</button>';
            echo '<button type="button" name="cancel" id="myButton1">Cancel</button>';
            echo '</div>';
            echo '</div>';
            echo '</form>';
          }
          ?> 
        </tbody>
      </table>
    
      <script>
        $(document).ready(function(){
          $(document).on("change", "#reservation_status", function() {
                var getReservationId = $("#reservation_id").val();
                var getReservationStatus = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: 'updateReservationStatusAjax.php',
                    data: {reservation_id:getReservationId, reservation_status:getReservationStatus},
                    success: function(data){
                    
                    }  
                }); 
            });
        });   
        
        const button = document.getElementById("myButton");
        const button1 = document.getElementById("myButton1");
        const div = document.getElementById("myDiv");

        button.addEventListener("click",   () => {
            if (div.style.display === "none") {
            div.style.display = "block";
            } else {
            div.style.display = "none";
            }
        });

        button1.addEventListener("click",   () => {
            if (div.style.display === "none") {
            div.style.display = "block";
            } else {
            div.style.display = "none";
            }
        });
      </script>

</body>
</html>
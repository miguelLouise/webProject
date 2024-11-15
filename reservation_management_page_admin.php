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
    <link rel="stylesheet" href="css/reservation_management_admin.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
</head>
<body>
    <!-- header -->
    <?php include('./templates/logged_in_header_admin.php'); ?>
    <!-- header -->

    <div class="reservation_management_container1">
    <p id="delete_reservation" style="color:green"><?php display_message("delete_reservation"); unset_session_variable("delete_reservation");?></p>
      <table>
        <thead>
          <tr>
          <th>Reservation ID</th>
          <th>User ID</th>
          <th>Name</th>
          <th>Room Type</th>
          <th>Floor Number</th>
          <th>Room Number</th>
          <th>Date of Reservation</th>
          <th>Reservation Status</th>
          <th>Action</th>
          <th>Payment Details</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $show_reservation_table = show_reservation_table($dbconn);
          foreach ($show_reservation_table as $data) {

            echo '<form action="includes/tenant_management/tenant_add.php" method="post" novalidate>';
            echo '<tr>';
            echo '<td>'.$data['reservation_id'].'</td>';
            echo '<td><input type="hidden" name="user_id" value="'.$data['user_id'].'">'.$data['user_id'].'</td>';
            echo '<td>'.$data['name'].'</td>';
            echo '<td>'.$data['room_type'].'</td>';
            echo '<td>'.$data['floor_number'].'</td>';
            echo '<td><input type="hidden" name="room_number" value="'.$data['room_number'].'">'.$data['room_number'].'</td>';
            echo '<td>'.$data['reservation_date'].'</td>';
            echo '<td>
                  <select name="reservation_status" id="reservation_status" class="reservation_status">
                  <option value="'.$data['reservation_status'].','.$data['reservation_id'].'" selected hidden>'.$data['reservation_status'].'</option>
                  <option value="Pending,'.$data['reservation_id'].'">Pending</option>
                  <option value="Paid/Reserved,'.$data['reservation_id'].'">Paid/Reserved</option>
                  <option value="Overdue,'.$data['reservation_id'].'">Overdue</option>   
                  </select>
                  <input type="hidden" class="reservation_id" id="reservation_id" name="id" value="'.$data['reservation_id'].'">
                  </td>';
            echo '<td id="reservation_action">';

            echo '<h4 class="no_action" id="'.$data['reservation_id'].'=no_action" style="display: none;">No Action</h4>';
            echo '<button type="submit" name="add_tenant_btn" class="add_tenant_btn" id="'.$data['reservation_id'].'=add_tenant_btn" style="display: none;" value="">Add Tenant</button>';
            echo '<button type="button" class="delete_btn" id="'.$data['reservation_id'].'=delete_btn" style="display: none;" value="'.$data['reservation_id'].'">Delete</button>';
                  // reservation action based on reservation status style="display: none;"
            echo '</td>';
            echo '<td class="dp_detail"><button type="button" class="dp_detail_btn" id="open_dp_details" value="'.$data['reservation_id'].'"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h560v-280h80v280q0 33-23.5 56.5T760-120H200Zm188-212-56-56 372-372H560v-80h280v280h-80v-144L388-332Z"/></svg></button></td>';
            // echo '<div>payment details</div>';
            echo '</tr>';

            // dwownpayment container
            echo '<div id="'.$data['reservation_id'].'=payment_details" class="dp_details" style="display: none;">';
            echo '<div class="dp_details1">';
            echo '<h2>Payment Details</h2>
                  <br>
                  Reservation # '.$data['reservation_id'].'.
                  <button type="button" class="close_btn" id="close_btn" value="'.$data['reservation_id'].'">X</button>';
            echo '<div class="dp_details2"></div>';
            echo '</div>';
            echo '</div>';


            //  Confirmation Box
            echo '<div id="'.$data['reservation_id'].'=confirmation" class="confirm_div" style="display: none;">';
            echo '<div class="confirm_div1">';
            echo '<input type="hidden" name="tenant_id" value="'.$data["reservation_id"].'">';
            echo 'Delete reservation? of '.$data['reservation_id'].'';
            echo '<div class="confirm_div2">';
            echo '<button type="submit" name="confirm_delete_btn">Confirm</button>';
            echo '<button type="button" name="cancel" class="cancel_btn" id="cancel_btn" value="'.$data['reservation_id'].'">Cancel</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</form>';
          }
          ?>
        </tbody>
      </table>

      <!-- <script src="javascript/reservation_management_page_admin.js"></script> -->

      <script>
        $(document).ready(function(){


          $(".reservation_status").each(function() {
            const getReservationDetails = $(this).val().split(",");
            const getReservationStatus = getReservationDetails[0];
            const getReservationId = getReservationDetails[1];

            const no_action = document.getElementById(getReservationId + "=no_action");
            const add_tenant_btn = document.getElementById(getReservationId + "=add_tenant_btn");
            const delete_btn = document.getElementById(getReservationId + "=delete_btn");

            if (getReservationStatus == "Pending") {
              $(no_action).css("display", "block");
              $(add_tenant_btn).css("display", "none");
              $(delete_btn).css("display", "none");
            } else if (getReservationStatus == "Paid/Reserved") {
              $(no_action).css("display", "none");
              $(add_tenant_btn).css("display", "block");
              $(delete_btn).css("display", "none");
            } else if (getReservationStatus == "Overdue") {
              $(no_action).css("display", "none");
              $(add_tenant_btn).css("display", "none");
              $(delete_btn).css("display", "block");
            }
          });

          $("#delete_reservation").show().delay(5000).fadeOut(70);
          var ReservationStatus = $(".reservation_status").val();

          // downpayment details
          $(document).on("click", ".dp_detail_btn", function() {
            const getReservationDetails = $(this).val();
            const dp_details = document.getElementById(getReservationDetails + "=payment_details");

            $(dp_details).toggle();

            $.ajax({
                type: 'POST',
                url: 'ajax/getReservationPaymentInformation.php',
                data: {reservation_Id:getReservationDetails},
                success: function(data){
                  $(".dp_details2").html(data);
                }
            });
          });

          $(document).on("click", ".close_btn", function() {
            const getReservationDetails = $(this).val();
            const dp_details = document.getElementById(getReservationDetails + "=payment_details");

            $(dp_details).toggle();
          });

          // confirmation
          $(document).on("click", ".delete_btn", function() {
            const getReservationDetails = $(this).val();
            const delete_confirmation = document.getElementById(getReservationDetails + "=confirmation");

            $(delete_confirmation).toggle();
          });

          $(document).on("click", ".cancel_btn", function() {
            const getReservationDetails = $(this).val();
            const delete_confirmation = document.getElementById(getReservationDetails + "=confirmation");

            $(delete_confirmation).toggle();

            console.log(getReservationDetails);
          });

          $(document).on("change", ".reservation_status", function() {
              const getReservationDetails = $(this).val().split(",");
              const getReservationStatus = getReservationDetails[0];
              const getReservationId = getReservationDetails[1];

              const no_action = document.getElementById(getReservationId + "=no_action");
              const add_tenant_btn = document.getElementById(getReservationId + "=add_tenant_btn");
              const delete_btn = document.getElementById(getReservationId + "=delete_btn");

              if (getReservationStatus == "Pending") {
                $(no_action).css("display", "block");
                $(add_tenant_btn).css("display", "none");
                $(delete_btn).css("display", "none");
              } else if (getReservationStatus == "Paid/Reserved") {
                $(no_action).css("display", "none");
                $(add_tenant_btn).css("display", "block");
                $(delete_btn).css("display", "none");
              } else if (getReservationStatus == "Overdue") {
                $(no_action).css("display", "none");
                $(add_tenant_btn).css("display", "none");
                $(delete_btn).css("display", "block");
              }

            $.ajax({
                type: 'POST',
                url: 'updateReservationStatusAjax.php',
                data: {reservation_id:getReservationId, reservation_status:getReservationStatus},
                success: function(data){

                }
            });
        });
  });
      </script>

</body>
</html>
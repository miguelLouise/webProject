<?php
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
</head>
<body>
    <!-- header -->
    <?php include('./templates/logged_in_header_admin.php'); ?>
    <!-- header -->

    <div class="reservation_management_container1">
      <div class="reservation_management_container2">
        <p style="color:red"><?php display_message("room_full") ?></p>
        <p style="color:green"><?php display_message("tenant_added") ?></p>
      </div>
    <table>
  <tr>
    <th>id</th>
    <th>user_id</th>
    <th>room_type</th>
    <th>floor_number</th>
    <th>rooom_number</th>
    <th>reservation_date</th>
    <th>Action</th>
  </tr>
  
  <?php 
  $output = show_reservation_table($dbconn);
  foreach ($output as $data) {
    echo '<form action="includes/tenant_management/tenant_add.php" method="get">';
    echo '<tr>';
    echo '<td><input type="hidden" name="id" value="'.$data['reservation_id'].'">'.$data['reservation_id'].'</td>';
    echo '<td><input type="hidden" name="user_id" value="'.$data['user_id'].'">'.$data['user_id'].'</td>';
    echo '<td><input type="hidden" name="room_type" value="'.$data['room_type'].'">'.$data['room_type'].'</td>';
    echo '<td><input type="hidden" name="floor_number" value="'.$data['floor_number'].'">'.$data['floor_number'].'</td>';
    echo '<td><input type="hidden" name="room_number" value="'.$data['room_number'].'">'.$data['room_number'].'</td>';
    echo '<td><input type="hidden" name="reservation_date" value="'.$data['reservation_date'].'">'.$data['reservation_date'].'</td>';
    echo '<td>
          <input type="submit" name="action" value="add">
          <input type="submit" name="action" value="delete">
          </td>'; 
    echo '</tr>';
    echo '</form>';
  }
  ?>
</table>
    </div>

</body>
</html>
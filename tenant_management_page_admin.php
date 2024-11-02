<?php
require_once "./includes/login/login_view.php";
include "./middleware/admin_middleware.php";//
require_once "./includes/tenant_management/tenant_management_model.php";
require_once "./includes/tenant_management/tenant_management_view.php";
require_once './includes/dbh.inc.php';
require_once './includes/room_management/room_management_view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant Management</title>
    <link rel="stylesheet" href="css/tenant_management.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="javascript/tenant_management_page_admin.js"></script>
</head>
<body>
<div class="tenant_management_container1">
        <!-- header -->
        <?php include('./templates/logged_in_header_admin.php'); ?>
        <!-- header -->
    </div>

    <div class="container">
        <h1>New Tenant Registration</h1>
        <form action="./includes/tenant_management/tenant_management_admin.php" method="post">
        <div class="reservation_management_container2">
            <p style="color:green"><?php display_message("room_is_full"); unset_display_message("room_is_full"); ?></p>
            <p style="color:green"><?php display_message("user_is_tenant"); unset_display_message("user_is_tenant"); ?></p>
            <p style="color:green"><?php display_message("tenant_added"); unset_display_message("tenant_added"); ?></p>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="name">Name<span style="color: red;"><?php display_message("name_error"); unset_display_message("name_error");?></span></label>
                <input type="text" id="name" name="name" placeholder="Name" value="<?php display_message("name"); unset_display_message("name");?>">
            </div>
            <div class="form-group">
                <label for="email">Email<span style="color: red;"><?php display_message("email_error"); unset_display_message("email_error");?></span></label>
                <input type="email" id="email" name="email" placeholder="Email" value="<?php display_message("email"); unset_display_message("email");?>">
            </div>
        </div>

            

        <div class="form-row">
            <div class="form-group">
                <label for="dob">DOB<span style="color: red;"><?php display_message("birthday_error"); unset_display_message("birthday_error");?></span></label>
                <input type="date" id="dob" name="birthday" value="<?php display_message("birthday"); unset_display_message("birthday");?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="room_typ">Room Type <span style="color: red;"><?php display_message("room_typ_error"); unset_display_message("room_typ_error");?></span></label>
                <select name="room_typ" id="room_typ"> 
                    <option value="<?php display_message("room_type") ?>" selected hidden> <?php display_message("room_type"); unset_display_message("room_type");?> </option>
                    <?php    
                    $roomTypes = showRoomTypes($dbconn);
                    foreach ($roomTypes as $room_types) {
                        echo '<option value="'.$room_types['room_type'].'">'.$room_types['room_type'].'</option>';
                    }
                    ?>   
                </select>

                <label for="flr_num">Floor Number <span style="color: red;"><?php display_message("flr_num_error"); unset_display_message("flr_num_error");?></span></label>
                <select name="flr_num" id="flr_num" >
                    <option value="<?php display_message("floor_number") ?>" selected hidden> <?php display_message("floor_number"); unset_display_message("floor_number");?> </option>     
                </select>

                <label for="room_num">Room Number <span style="color: red;"><?php display_message("room_num_error"); unset_display_message("room_num_error");?></span></label>
                <select name="room_num" id="room_num">
                    <option value="<?php display_message("room_number") ?>" selected hidden> <?php display_message("room_number"); unset_display_message("room_number");?> </option>     
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="contact">Contact <span style="color: red;"><?php display_message("contact_num_error"); unset_display_message("contact_num_error");?></span></label>
                <input type="tel" id="contact" name="contact_num" placeholder="Contact" value="<?php display_message("contact_number"); unset_display_message("contact_number");?>">
            </div>
        </div>
            <button type="submit" class="submit-btn">add tenant</button>    
        </form>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>DOB</th>
                    <th>Unit No.</th>
                    <th>Contact</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="tenant-list">
                <?php $tenant_info = tenant_info($dbconn);
                foreach($tenant_info as $tenantInfo){
                    echo '<tr>';
                    echo '<td>'.$tenantInfo["name"].'</td>';
                    echo '<td>'.$tenantInfo["email"].'</td>';
                    echo '<td>'.$tenantInfo["birthday"].'</td>';
                    echo '<td>'.$tenantInfo["room_number"].'</td>';
                    echo '<td>'.$tenantInfo["contact_number"].'</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
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
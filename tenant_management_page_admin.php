<?php
require_once "./includes/login/login_view.php";
include "./middleware/admin_middleware.php";//
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
        <div class="form-row">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Name" value="<?php display_message("name")?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" value="<?php display_message("email")?>">
                </div>
            </div>

            

            <div class="form-row">
                <div class="form-group">
                    <label for="dob">DOB</label>
                    <input type="date" id="dob" value="<?php display_message("birthday")?>">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <div class="radio-group">
                        <label><input type="radio" name="gender" value="Male"> Male</label>
                        <label><input type="radio" name="gender" value="Female"> Female</label>
                        <label><input type="radio" name="gender" value="Other"> Other</label>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" placeholder="Address">
                </div>

                <div class="form-group">
                    <label for="room_typ">Room Type<span style="color: red;"><?php display_reservation_error("room_type_error") ?></span></label>
                    <select name="room_typ" id="room_typ">
                        <option value="" selected hidden>Room number</option>
                        <?php 
                        $roomTypes = showRoomTypes($dbconn);
                        foreach ($roomTypes as $room_types) {
                            echo '<option value="'.$room_types['room_type'].'">'.$room_types['room_type'].'</option>';
                        }
                        ?>
                    </select>

                    <label for="flr_num">Floor Number<span style="color: red;"><?php display_reservation_error("floor_number_error") ?></span></label>
                    <select name="flr_num" id="flr_num">
                        <option value="" selected hidden>Floor Number</option>     
                    </select>

                    <label for="room_num">Room Number<span style="color: red;"><?php display_reservation_error("room_number_error") ?></span></label>
                    <select name="room_num" id="room_num">
                        <option value="" selected hidden>Room Number</option>     
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="tel" id="contact" placeholder="Contact" value="<?php display_message("contact_number")?>">
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
                <tr>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="javascript/tenant_management_page_admin.js">
       
    </script>

    
</body>
</html>
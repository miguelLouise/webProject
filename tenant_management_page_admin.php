<?php
// require_once './includes/login/login_view.php';
// include './middleware/admin_middleware.php';
require_once './includes/tenant_management/tenant_management_model.php';
require_once './includes/tenant_management/tenant_management_view.php';
require_once './includes/dbh.inc.php';
require_once './includes/room_management/room_management_view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant Management</title>
    <link rel="stylesheet" href="css//tenant_management.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

</head>
<body>
<div class="tenant_management_container1">
        <!-- header -->
        <?php include('./templates/logged_in_header_admin.php'); ?>
        <!-- header -->
    </div>

    <div class="container">
        <h1>New Tenant Registration</h1>
        <form action="./includes/tenant_management/tenant_management_admin.php" method="post" novalidate>
        <div class="reservation_management_container2">
            <p style="color:red"><?php display_message("room_is_full"); unset_session_variable("room_is_full"); ?></p>
            <p style="color:red"><?php display_message("user_is_tenant"); unset_session_variable("user_is_tenant"); ?></p>
            <p id="" style="color:green"><?php display_message("tenant_added"); unset_session_variable("tenant_added"); ?></p>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="name">Name<span style="color: red;"><?php display_message("name_error"); unset_session_variable("name_error");?></span></label>
                <input type="text" id="name" name="name" placeholder="Name" value="<?php display_message("name"); unset_session_variable("name");?>">
            </div>
            <div class="form-group">
                <label for="email">Email<span style="color: red;"><?php display_message("email_error"); unset_session_variable("email_error");?></span></label>
                <input type="email" id="email" name="email" placeholder="Email" value="<?php display_message("email"); unset_session_variable("email");?>">
            </div>
        </div>



        <div class="form-row">
            <div class="form-group">
                <label for="dob">DOB<span style="color: red;"><?php display_message("birthday_error"); unset_session_variable("birthday_error");?></span></label>
                <input type="date" id="dob" name="birthday" value="<?php display_message("birthday"); unset_session_variable("birthday");?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="room_typ">Room Type <span style="color: red;"><?php display_message("room_typ_error"); unset_session_variable("room_typ_error");?></span></label>
                <select name="room_typ" id="room_typ">
                    <option value="<?php display_message("room_type") ?>" selected hidden> <?php display_message("room_type"); unset_session_variable("room_type");?> </option>
                    <?php
                    $roomTypes = showRoomTypes($dbconn);
                    foreach ($roomTypes as $room_types) {
                        echo '<option value="'.$room_types['room_type'].'">'.$room_types['room_type'].'</option>';
                    }
                    ?>
                </select>

                <label for="flr_num">Floor Number <span style="color: red;"><?php display_message("flr_num_error"); unset_session_variable("flr_num_error");?></span></label>
                <select name="flr_num" id="flr_num" >
                    <option value="<?php display_message("floor_number") ?>" selected hidden> <?php display_message("floor_number"); unset_session_variable("floor_number");?> </option>
                </select>

                <label for="room_num">Room Number <span style="color: red;"><?php display_message("room_num_error"); unset_session_variable("room_num_error");?></span></label>
                <select name="room_num" id="room_num">
                    <option value="<?php display_message("room_number") ?>" selected hidden> <?php display_message("room_number"); unset_session_variable("room_number");?> </option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="contact">Contact <span style="color: red;"><?php display_message("contact_num_error"); unset_session_variable("contact_num_error");?></span></label>
                <input type="tel" id="contact" name="contact_num" placeholder="Contact" value="<?php display_message("contact_number"); unset_session_variable("contact_number");?>">
            </div>
        </div>


        <div class="form-row">
            <div class="form-group">
                <label for="start_of_contract">Contract Start<span style="color: red;"><?php display_message("contract_date_error"); unset_session_variable("contract_date_error");?></span></label>
                <input type="date" id="start_of_contract" name="start_of_contract" value="<?php current_date(); display_message("current_date"); ?>">

            </div>
        </div>

            <button type="submit" class="submit-btn">add tenant</button>
        </form>

        <p id="message" style="color:green"><?php display_message("tenant_record_deleted"); unset_session_variable("tenant_record_deleted"); ?></p>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Birthdate</th>
                    <th>Unit No.</th>
                    <th>Contact</th>
                    <th>Start of contract</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="tenant-list" >
            <?php $tenant_info = tenant_info($dbconn);
                foreach($tenant_info as $tenantInfo){

                    echo '<tr class="tenant_row">';
                    echo '<td>'.$tenantInfo["name"].'</td>';
                    echo '<td>'.$tenantInfo["email"].'</td>';
                    echo '<td>'.$tenantInfo["birthday"].'</td>';
                    echo '<td>'.$tenantInfo["room_number"].'</td>';
                    echo '<td>'.$tenantInfo["contact_number"].'</td>';
                    echo '<td>'.$tenantInfo["start_of_contract"].'</td>';
                    echo '<td>
                          <button type="button" id="delete_btn" class="delete_btn" value="'.$tenantInfo["tenant_id"].'">Delete</button>';
                    echo '</td>';
                    echo '</tr>';

                    echo '<form class="deleteForm" action="includes/tenant_management/tenant_delete.php" method="post" novalidate>';
                    echo '<div id="'.$tenantInfo["tenant_id"].'" class="delete_form" style="display: none;">';
                    echo '<input type="hidden" name="tenant_id" value="'.$tenantInfo["tenant_id"].'">';
                    echo 'Remove '.$tenantInfo["name"].' as a tenant and delete existing data related to the user?';
                    echo '<div class="div1">';
                    echo '<button type="submit" name="action" value="delete">Confirm</button>';
                    echo '<button type="button" id="cancel_btn" class="cancel_btn" value="'.$tenantInfo["tenant_id"].'">cancel</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</form>';

                }
                ?>
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){

             $(document).on('click', '.delete_btn', function() {
                const tenantId = $(this).val();
                const deleteConfirmationForm = document.getElementById(tenantId);

                $(deleteConfirmationForm).toggle();

                function getTenantId() {
                    return tenantId;
                }
            });

            $(document).on('click', '.cancel_btn', function() {
                const tenantId = $(this).val();
                const deleteConfirmationForm = document.getElementById(tenantId);

                $(deleteConfirmationForm).toggle();

                function getTenantId() {
                    return tenantId;
                }
            });

            $("#message").show().delay(3000).fadeOut(70);

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
<?php
require_once './includes/login/login_view.php';
include './middleware/user_middleware.php';
require_once './includes/dbh.inc.php';
require_once './includes/tenant_management/tenant_management_view.php';
require_once './includes/maintenance_management/maintenance_management_view.php';
require_once 'includes/room_management/room_management_view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Request</title>
    <link rel="stylesheet" href="css//maintenance_request.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
</head>

<body>
    <div class="maintenance_req_container1">
        <!-- header -->
        <?php include('./templates/logged_in_header.php'); ?>
        <!-- header -->
    </div>

    <!-- page content -->
    <div class="container1">
        <?php is_user_tenant($dbconn, $_SESSION["user_id"]);?>
        <div class="left-column">
            <h2>Submit</h2>
            <h1>Maintenance Requests</h1>
            <p>Welcome to Lavenders Place Dorm! If you encounter any issues within your apartment, please submit a maintenance request using the form below. Our team is dedicated to ensuring your comfort and promptly addressing your concerns.</p>
            <p><strong>1277 Apartments Admin:</strong> Please allow up to 48 hours for our team to respond to your request. We appreciate your patience as we work to ensure a comfortable living experience at Lavenders Place.</p>
            <p>Lavenders Place</p>
        </div>
        <div class="right-column">
            <form action="./includes/maintenance_management/maintenance_request.php" method="post" novalidate>

                <div class="form-group">
                    <label for="name">Name<span style="color: red;"><?php display_message("name_error"); unset_session_variable("name_error");?></span></label>
                    <input type="text" id="name" name="name" value="<?php display_message("name");?>" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email<span style="color: red;"><?php display_message("email_error"); unset_session_variable("email_error");?></span></label>
                    <input type="email" id="email" name="email" value="<?php display_message("email");?>" readonly>
                </div>


                <div class="form-group">
                    <label for="unit-number">Unit Number<span style="color: red;"><?php display_message("unit_number_error"); unset_session_variable("unit_number_error");?></span></label>
                    <input type="text" id="room_number" name="room_number" value="<?php display_message("room_number");?>" readonly>
                </div>
                <div class="form-group">
                    <label for="category">Issue Category<span style="color: red;"><?php display_message("category_error"); unset_session_variable("category_error");?></span></label>
                    <select id="category" name="category">
                    <option value="" selected disabled hidden>Choose Category</option>
                        <option value="Electrical">Electrical</option>
                        <option value="Plumbing">Plumbing</option>
                        <option value="HVAC">HVAC</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Issue Urgency<span style="color: red;"><?php display_message("urgency_error"); unset_session_variable("urgency_error");?></span></label>
                    <div class="urgency-options">
                        <div>
                            <input type="radio" id="low" name="urgency" value="Low">
                            <label for="Low">Low</label>
                        </div>
                        <div>
                            <input type="radio" id="medium" name="urgency" value="Medium">
                            <label for="Medium">Medium</label>
                        </div>
                        <div>
                            <input type="radio" id="high" name="urgency" value="High">
                            <label for="High">High</label>
                        </div>
                        <div>
                            <input type="radio" id="emergency" name="urgency" value="Emergency">
                            <label for="Emergency">Emergency</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Describe The Issue<span style="color: red;"><?php display_message("description_error"); unset_session_variable("description_error");?></span></label>
                    <textarea id="description" name="description" rows="5"></textarea>
                </div>
                <button type="submit" class="submit-button">Submit</button>
            </form>
            <?php disappearing_success_message("maintenance_request_submitted"); ?>
        </div>
    </div>

    <div id="maintenance_table" class="maintenance_table">

        </div>
        <!-- tenant ID -->
        <input type="hidden" name="hidden_field_name" id="tenantID" value="<?php echo getUserTenantId($dbconn, $_SESSION["user_id"]); ?>">
    <!--  radio buttons function -->
    <script>
        $(document).ready(function(){
            const tenantID = $("#tenantID").val();
            console.log(tenantID);

            $.ajax({
                type: 'POST',
                url: 'ajax/getUserMaintenanceRequest.php',
                data: {tenant_ID:tenantID},
                success: function(data){
                $('#maintenance_table').html(data);
                }
            });
        })

        document.querySelectorAll('input[type="radio"]').forEach((radio) => {
            radio.addEventListener('click', () => {
                console.log(`${radio.id} selected`);
            });
        });

        // combo box selection
        document.querySelector('#category').addEventListener('change', (e) => {
            console.log(`${e.target.value} selected`);
        });
    </script>

</body>
</html>

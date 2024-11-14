<?php
require_once './includes/login/login_view.php';
include './middleware/user_middleware.php';
require_once './includes/dbh.inc.php';
require_once './includes/tenant_management/tenant_management_view.php';
require_once './includes/maintenance_management/maintenance_management_view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Request</title>
    <link rel="stylesheet" href="css//maintenance_request.css">
</head>

<body>
    <div class="maintenance_req_container1">
        <!-- header -->
        <?php include('./templates/logged_in_header.php'); ?>
        <!-- header -->
    </div>

    <!-- page content -->
    <div class="container1">
        <div class="left-column">
            <h2>Submit</h2>
            <h1>Maintenance Requests</h1>
            <p>Welcome to Lavenders Place Dorm! If you encounter any issues within your apartment, please submit a maintenance request using the form below. Our team is dedicated to ensuring your comfort and promptly addressing your concerns.</p>
            <p><strong>1277 Apartments Admin:</strong> Please allow up to 48 hours for our team to respond to your request. We appreciate your patience as we work to ensure a comfortable living experience at Lavenders Place.</p>
            <p>Lavenders Place</p>
        </div>
        <div class="right-column">
            <form action="./includes/maintenance_management/maintenance_request.php" method="post" novalidate>
            <?php is_user_tenant($dbconn, $_SESSION["user_id"]);?>
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
                            <input type="radio" id="low" name="urgency" value="low">
                            <label for="Low">Low</label>
                        </div>
                        <div>
                            <input type="radio" id="medium" name="urgency" value="medium">
                            <label for="Medium">Medium</label>
                        </div>
                        <div>
                            <input type="radio" id="high" name="urgency" value="high">
                            <label for="High">High</label>
                        </div>
                        <div>
                            <input type="radio" id="emergency" name="urgency" value="emergency">
                            <label for="Emergency">Emergency</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Describe The Issue<span style="color: red;"><?php display_message("description_error"); unset_session_variable("description_error");?></span></label>
                    <textarea id="description" name="description" rows="5"></textarea>
                </div>
                <button type="submit" class="submit-button">Submit</button>
                <p style="color:green"><?php display_message("maintenance_request_submitted"); unset_session_variable("maintenance_request_submitted");?></p>
                <div class="display_msg_container">
                    <p><?php display_message("user_not_tenant");?></p>
                </div>

            </form>
        </div>
    </div>

    <!--  radio buttons function -->
    <script>
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

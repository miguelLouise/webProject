<?php
require_once './includes/login/login_view.php';
include './middleware/user_middleware.php';
require_once './includes/dbh.inc.php';
require_once 'includes/dp_management/downpayment_management_view.php';
require_once 'includes/tenant_management/tenant_management_view.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="css//payment.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
</head>
<body>
    <div class="payment_page_container1">
        <!-- header -->
        <?php include('./templates/logged_in_header.php'); ?>
        <!-- header -->
    </div>

    <div class="down-payment-container">
        <?php
        disappearing_downpayment_management_message("payment_submitted_successfully");
        disappearing_downpayment_management_message("file_invalid");
        ?>
        <div class="payment-card">
            <!-- QR Code Section -->
            <div class="left-section">
                <h2>Reservation Down Payment</h2>
                <p class="note">*Note strictly No Cancellation</p>
                <!-- <p class="note">*Your Downpayment will be valid for 5 to 7 working days</p> -->
                <img src="./Assets/sampqr.png" alt="QR Code" class="qr-code">
            </div>


            <!-- Form  -->
            <div class="right-section">
                <form action="includes/dp_management/downpayment_management.php" method="post" enctype="multipart/form-data" novalidate>
                <?php does_user_have_a_reservation($dbconn, $_SESSION["user_id"]);?>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter your name" value="<?php display_message("reservation_name");?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="mobile">Mobile Number</label>
                        <input type="text" id="mobile" name="mobile" placeholder="Enter your mobile number" value="<?php display_message("reservation_contact_number");?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="reference">Payment Reference Number<span style="color: red; font-size: 12px;"><?php display_session_variable("reference_number_error") ?></span></label>
                        <textarea id="reference" name="reference" placeholder="Enter payment reference number"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="screenshot">Upload Payment Screenshot<span style="color: red; font-size: 12px;"><?php display_session_variable("file_name_error") ?></span></label>
                        <!-- <input type="file" id="screenshot" name="screenshot" accept="image/*" required> -->
                        <!-- accept=".jpg, .jpeg, .png" -->
                        <input type="file" id="screenshot" name="screenshot">
                    </div>
                    <input type="hidden" name="reservation_Id" value="<?php display_message("reservation_id") ?>">
                    <button type="submit">Submit Payment</button>
                </form>
            </div>
        </div>
    </div>


    <!-- Popup Modal -->
    <div id="popupModal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <p>Payment Submitted Successfully!</p>
        </div>
    </div>
    <script src="javascript//payment_page.js"></script>

</body>
</html>